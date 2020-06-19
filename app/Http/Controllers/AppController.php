<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Generator;
use ZipStream\Option\Archive;
use Illuminate\Http\Request;
use ZipStream\ZipStream;
use setasign\Fpdi\Fpdi;
use Carbon\Carbon;
use App\Document;
use App\Group;
use App\User;
use Auth;
use PhpParser\Comment\Doc;
use Storage;

class AppController extends Controller
{
    public function showDashboard()
    {
        $user = User::find(Auth::user()->id);
        $stat['groups_count'] = $user->groups()->count();

        $stat['documents_count'] = 0;
        foreach ($user->groups as $group) {
            $stat['documents_count'] += $group->documents->count();
        }

        // $stat['groups_count'] = $user->groups_count;
        // $stat['documents_count'] = $user->documents_count;
        // echo $stat['groups_count'] . '|' . $stat['documents_count'];
        // dd($user->groups->count());
        return view('app.dashboard', compact('stat'));
    }

    public function showRegisterDocument()
    {
        return view('app.register-document');
    }

    public function registerDocuments()
    {
        $request = request();

        // Input Validation
        $request->validate([
            'title' => 'required|min:4|max:255',
            'institution' => 'required|min:2|max:255',
            'valid_till' => 'nullable|date|max:20'
        ]);

        // TODO: Valdiate Empty File
        if (!$request->hasFile('documents')) {
            return redirect('/app/register-document')->withErrors('File PDF harus diisi');
        }

        $docs = $request->file('documents');

        // TODO: Validate File Size
        foreach (range(0, $docs) as $index) {
            $rules['documents.' . $index] = 'max:4000';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/app/register-document')->withErrors('Ukuran setiap file tidak boleh melebihi 4 MB !');
        }

        // TODO: Validate File Extension
        foreach ($docs as $doc) {
            $extension = $doc->getClientOriginalExtension();
            $check = $extension == 'pdf';
        }

        if (!$check) {
            return redirect('/app/register-document')->withErrors('Seluruh file harus ber-ekstensi PDF !');
        } else {
            // TODO: Start Proccessing

            // TODO: Create Group
            $group = new Group();
            $group->user_id = Auth::user()->id;
            $group->code = Auth::user()->id . $this->randomCode(5);
            $group->title = $request->title;
            $group->institution = $request->institution;

            if ($request->valid_till != null) {
                $group->valid_till = Carbon::create($request->valid_till);
            }

            // TODO: After Success Creating Group
            if ($group->save()) {
                // TODO: Create QRCode
                $this->generateQrcode(url('/check-document') .'/'. $group->code);
                // TODO: Create Documents
                // TODO: Place QRCode to Every Documents
                foreach ($docs as $doc) {
                    // TODO: Place QRCode
                    $fpdi = new Fpdi();
                    $fpdi->AddPage();

                    // TODO: Store Temp ORIGINAL PDF
                    $doc->storeAs('doc_temp', 'original_file.pdf');

                    $fpdi->setSourceFile(storage_path('app\doc_temp\original_file.pdf'));
                    $template = $fpdi->importPage(1);
                    $size = $fpdi->getTemplateSize($template);
                    $fpdi->useTemplate($template, null, null, $size['width'], $size['height'], true);

                    // TODO: Embed Barcode to ORIGINAL PDF
                    $fpdi->Image(storage_path('app\qrcode\qrcode.png'), 0, $fpdi->GetPageHeight()-30, 30, 30);

                    // TODO: Final Processed PDF Store
                    $store_filename = Auth::user()->id . $group->id . $this->randomCode(15). ".pdf";
                    $fpdi->Output(storage_path('app\documents' .'\\'. $store_filename), "F");

                    $original_filename = $doc->getClientOriginalName();

                    Document::create([
                        'group_id' => $group->id,
                        'original_name' => $original_filename,
                        'stored_name' => $store_filename,
                        'hash_value' => hash_file('md5', $doc),
                    ]);
                }
                return redirect('/app/register-document')->with('msg', 'Berhasil meregistrasikan dokumen');
            } else {
                return redirect('/app/register-document')->withErrors('Terjadi kesalahan.');
            }
        }
    }

    public function showFolder()
    {
        $folders = Group::paginate(5);
        return view('app.folder', compact('folders'));
    }

    public function showAllDocuments()
    {
        $documents = Document::paginate(5);
        $showFolder = true;
        return view('app.documents', compact(['documents', 'showFolder']));
    }

    public function showFolderDocuments($folderId)
    {
        $folder = Group::findOrFail($folderId);
        $documents = $folder->documents()->paginate(5);
        // dd($documents);
        $showFolder = false;
        return view('app.documents', compact(['documents', 'showFolder']));
    }

    public function downloadDocument($id)
    {
        $document = Document::findOrFail($id);
        $originalFileName = $document->original_name;
        $storedFileName = $document->stored_name;
        return response()->download(storage_path() . '\app\documents\\'.$storedFileName, $originalFileName);
    }

    public function deleteFolder($id)
    {
        $folder = Group::findOrFail($id);
        $folder->delete();
        return redirect()->back()->with('msg', 'success');
    }

    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        return redirect()->back()->with('msg', 'success');
    }

    public function downloadFolder($id)
    {
        $folder = Group::findOrFail($id);
        $option = new Archive();
        $option->setSendHttpHeaders(true);

        $zip = new ZipStream($folder->title.'.zip', $option);

        foreach ($folder->documents as $document) {
            $zip->addFileFromPath($document->original_name, storage_path('app\documents\\'.$document->stored_name));
        }

        return $zip->finish();
    }

    public function generateQrcode($code)
    {
        $qr = new Generator;
        return $qr->size(300)
            ->format('png')
            ->margin(2)
            ->generate($code, storage_path('app\qrcode\qrcode.png'));
    }

    public function randomCode($len)
    {
        return substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", $len)), 0, $len);
    }
}
