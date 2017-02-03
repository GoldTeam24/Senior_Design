<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    //
    public function processSteps()
    {
        return $this->hasMany('App\Models\ProcessStep');
    }
}