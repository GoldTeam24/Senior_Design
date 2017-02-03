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
}