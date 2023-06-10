<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DataFile;

class MatematikaController extends Controller
{
    public function index()
    {
        $data = DataFile::all();

        return view('backend.materi.matematika', compact('data'));
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

        $data = new DataFile();
        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');
        $data->file_path = $path;
        $data->save();

        return redirect()->route('matematika.index');
    }

    public function edit($id)
    {
        $data = DataFile::findOrFail($id);

        return view('backend.materi.matematikaedit', [
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

        $data = DataFile::findOrFail($id);

        $data->nama_file = $request->input('nama_file');
        $data->jenis_file = $request->input('jenis_file');

        if ($request->hasFile('file')) {
            Storage::delete($data->file_path);

            $file = $request->file('file');
            $path = $file->store('public/files');
            $data->file_path = $path;
        }

        $data->save();

        return redirect()->route('matematika.index');
    }

    public function destroy($id)
    {
        $data = DataFile::findOrFail($id);

        Storage::delete($data->file_path);

        $data->delete();

        return redirect()->route('matematika.index');
    }

    public function uploadForm()
    {
        return view('backend.materi.uploadtugasmtk');
    }
}
