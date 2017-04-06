<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessStep extends Model
{
    //
    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }
    public function files()
    {
         return $this->belongsToMany('App\File','process_step_file','process_step_id','file_id');
    }
}