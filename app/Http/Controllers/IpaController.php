<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DataFilesIpa;
use Illuminate\Support\Facades\DB;

class IpaController extends Controller
{
    public function index()
    {
        $data = DataFilesIpa::orderBy('id')->get();
        return view('backend.materi.ipa', compact('data'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'nama_file' => 'required',
            'jenis_file' => 'required',
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $path = $file->store('public/files');

        $data = new DataFilesIpa();
        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');
        $data->file_path = $path;
        $data->save();

        return redirect()->route('ipa.index');
    }

    public function edit($id)
    {
        $data = DataFilesIpa::findOrFail($id);

        return view('backend.materi.ipaedit', [
            'editId' => $id,
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_file' => 'required',
            'jenis_file' => 'required',
            'file' => 'file',
        ]);

        $data = DataFilesIpa::findOrFail($id);

        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');

        if ($request->hasFile('file')) {
            Storage::delete($data->file_path);

            $file = $request->file('file');
            $path = $file->store('public/files');
            $data->file_path = $path;
        }

        $data->save();

        return redirect()->route('ipa.index');
    }

    public function destroy($id)
    {
        $data = DataFilesIpa::findOrFail($id);

        $data->delete();

        // Mengambil ID minimum dari data yang tersisa
        $minId = DataFilesIpa::min('id');

        // Mengatur ulang nomor ID secara berurutan
        DB::statement("ALTER TABLE DataFilesIpa AUTO_INCREMENT = $minId");

        return redirect()->route('ipa.index');
    }

    public function uploadForm()
    {
        return view('backend.materi.uploadtugasipa');
    }
}
