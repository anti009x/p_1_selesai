<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataFileController extends Controller

{
    public function index()
    {
        $data = DataFile::all();
        return view('data.index', compact('data'));
    }
}
