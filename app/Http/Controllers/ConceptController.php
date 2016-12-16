<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concept;

class ConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($conceptId)
    {
        //
        $concept = Concept::find($conceptId);
        $childConcepts = $concept->childConcepts()->orderBy('name')->get();
        $parentConcepts = $concept->parentConcepts()->orderBy('name')->get();

        return view('concept', compact('concept', 'childConcepts', 'parentConcepts'));
    }
}
