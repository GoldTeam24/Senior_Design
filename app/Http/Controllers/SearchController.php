<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use Request;

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
        
        return view('search', compact('concepts', 'searchString'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $searchString = Request::input('searchString');

        $concepts = Concept::where('name', 'LIKE', '%' . $searchString . '%')->get();

        return view('search', compact('concepts','searchString'));
    }
}
