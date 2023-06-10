<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFilesIps extends Model
{
    protected $table = 'DataFilesIps';

    protected $fillable = ['nama_file', 'jenis_file', 'file_path'];
}
