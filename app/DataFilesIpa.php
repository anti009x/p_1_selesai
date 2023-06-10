<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFilesIpa extends Model
{
    protected $table = 'DataFilesIpa';

    protected $fillable = ['nama_file', 'jenis_file', 'file_path'];
}
