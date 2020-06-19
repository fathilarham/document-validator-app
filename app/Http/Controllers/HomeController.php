<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showContactUs()
    {
        return view('contact');
    }

    public function showCheckDocument($code)
    {
        $folder = Group::where('code', $code)->first();

        // TODO: Validate Group Code Exists
        if ($folder->count() == 0) {
            return abort(404);
        }

        return view('check-document', compact('folder'));
    }

    public function checkDocument($code)
    {
        // TODO: Validate Group Code Exists
        $folder = Group::where('code', $code)->first();

        if ($folder->count() == 0) {
            return abort(404);
        }

        $request = request();

        // TODO: Validate File exist, type, extension, size
        $request->validate([
            'document' => 'required|file|max:5000|mimes:pdf'
        ]);

        $checkHash = hash_file('md5', $request->file('document'));
        $doc = $folder->documents()->where('hash_value', $checkHash)->get();

        if ($doc->count() == 0) {
            return redirect()->back()->withErrors('Dokumen tidak terdaftar / telah dimodifikasi.');
        }

        return redirect()->back()->with('msg', 'Dokumen ini resmi terdaftar di ' . $folder->title);
    }
}
