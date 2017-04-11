<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use Illuminate\Http\Request;
use Log;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $concepts = [ ];

        $searchString = 'Search for a concept';

        $isSearched = false;

        $filterOptions = array( 'science' => 'Science',
            'technology' => "Technology",
            'engineering' => 'Engineering',
            'mathematics' => 'Mathematics',
            'primary' => 'Primary');
        
        return view('search', compact('concepts', 'searchString', 'isSearched', 'filterOptions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchString = $request->input('searchString');
        $query = Concept::select();
        $filter = $request->input('filters');

        if($filter != null) {
            if ($filter != 'primary') {
                $query->where('stem', '=', $filter);
            } elseif ($filter == 'primary') {
                $query->where('status', '=', $filter);
            }
            
            $query->where('name', 'LIKE', '%' . $searchString . '%');
            $concepts = $query->get();
        }
        else {
            $concepts = Concept::where('name', 'LIKE', '%' . $searchString . '%')->get();
        }

        $isSearched = true;

        $filterOptions = array( 'science' => 'Science',
            'technology' => "Technology",
            'engineering' => 'Engineering',
            'mathematics' => 'Mathematics',
            'primary' => 'Primary');

        return view('search', compact( 'concepts', 'searchString', 'isSearched', 'filterOptions'));
    }

    public function openConcept(Request $request) {
        $concept = Concept::find($request::input('conceptId'));

        return redirect()->route('concept.show', array('id' => $concept->id));
    }
}