<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    //
    public function parentConcepts()
    {
        return $this->belongsToMany('App\Models\Concept','concept_concept','parent_concept_id','child_concept_id');
    }
    public function childConcepts()
    {
        return $this->belongsToMany('App\Models\Concept','concept_concept','child_concept_id','parent_concept_id');
    }
    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }
}
