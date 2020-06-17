<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use setasign\Fpdi\Fpdi;
use SimpleSoftwareIO\QrCode\Generator;
use ZipStream\Option\Archive;
use ZipStream\ZipStream;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function multiplefile()
    {
        $docs = request()->file('filenames');
        foreach ($docs as $doc) {
            $extension = $doc->getClientOriginalExtension();
            $check = $extension == 'png';
        }

        if (!$check) {
            dd("False extension");
        } else {
            foreach ($docs as $doc) {
                $filename = $doc->store('documents');
                Document::create([
                    'path' => $filename
                ]);
            }
            dd("success");
        }
    }

    public function fpdi()
    {
        $fpdi = new Fpdi();

        $fpdi->AddPage();
        $fpdi->setSourceFile(storage_path('app\documents\1.pdf'));
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        // dd($size);
        $fpdi->useTemplate($template, null, null, $size['width'], $size['height'], true);
        $this->generate('sertifikat_fiktacia');
        $fpdi->Image(storage_path('app\qrcode\qrcode.png'), 0, $fpdi->GetPageHeight()-30, 30, 30);
        $fpdi->Output('doc.pdf', "F");
    }

    public function generateQrcode($code)
    {
        $qr = new Generator;
        return $qr->size(300)
            ->format('png')
            ->margin(2)
            ->generate($code, storage_path('app\qrcode\qrcode.png'));
    }

    public function zip()
    {
        $option = new Archive();
        $option->setSendHttpHeaders(true);

        $zip = new ZipStream('test.zip', $option);

        $zip->addFileFromPath('a.pdf', storage_path('app\documents\1.pdf'));
        $zip->addFileFromPath('b.pdf', storage_path('app\documents\2.pdf'));

        $zip->finish();
    }
}
