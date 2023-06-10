<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DataFilesIps;
use Illuminate\Support\Facades\DB;
class IpsController extends Controller
{
    public function index()
    {
        $data = DataFilesIps::orderBy('id')->get();
        return view('backend.materi.ips', compact('data'));
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

        $data = new DataFilesIps();
        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');
        $data->file_path = $path;
        $data->save();

        return redirect()->route('ips.index');
    }

    public function edit($id)
    {
        $data = DataFilesIps::findOrFail($id);

        return view('backend.materi.ipsedit', [
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

        $data = DataFilesIps::findOrFail($id);

        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');

        if ($request->hasFile('file')) {
            Storage::delete($data->file_path);

            $file = $request->file('file');
            $path = $file->store('public/files');
            $data->file_path = $path;
        }

        $data->save();

        return redirect()->route('ips.index');
    }

    public function destroy($id)
    {
        $data = DataFilesIps::findOrFail($id);

        $data->delete();

        // Mengambil ID minimum dari data yang tersisa
        $minId = DataFilesIps::min('id');

        // Mengatur ulang nomor ID secara berurutan
        DB::statement("ALTER TABLE DataFilesIps AUTO_INCREMENT = $minId");

        return redirect()->route('ips.index');
    }

    public function uploadForm()
    {
        return view('backend.materi.uploadtugasips');
    }
}
