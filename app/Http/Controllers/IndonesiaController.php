<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DataFilesIndonesia;
use Illuminate\Support\Facades\DB;

class IndonesiaController extends Controller
{
    public function index()
    {
        $data = DataFilesIndonesia::all();

        return view('backend.materi.indonesia', compact('data'));
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

        $data = new DataFilesIndonesia();
        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');
        $data->file_path = $path;
        $data->save();

        return redirect()->route('indonesia.index');
    }

    public function edit($id)
    {
        $data = DataFilesIndonesia::findOrFail($id);

        return view('backend.materi.indonesiaedit', [
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

        $data = DataFilesIndonesia::findOrFail($id);

        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');

        if ($request->hasFile('file')) {
            Storage::delete($data->file_path);

            $file = $request->file('file');
            $path = $file->store('public/files');
            $data->file_path = $path;
        }

        $data->save();

        return redirect()->route('indonesia.index');
    }

    public function destroy($id)
    {
        $data = DataFilesIndonesia::findOrFail($id);

        Storage::delete($data->file_path);

        $data->delete();

        return redirect()->route('indonesia.index');
    }

    public function uploadForm()
    {
        return view('backend.materi.uploadtugasindonesia');
    }
}
