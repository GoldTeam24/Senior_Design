<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = ['mime_type', 'file_size', 'file_name', 'file_path', 'type', 'status'];

}
