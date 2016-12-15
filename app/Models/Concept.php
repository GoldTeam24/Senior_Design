<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    //
    public function parentConcepts()
    {
        return $this->belongsToMany('App\Concepts','concept_concept','parentConcept_id','childConcept_id');
    }
    public function childConcepts()
    {
        return $this->belongsToMany('App\Concepts','concept_concept','childConcept_id','parentConcept_id');
    }
}
