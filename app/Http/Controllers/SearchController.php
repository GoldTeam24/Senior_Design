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

        $isSearched = false;
        
        return view('search', compact('concepts', 'searchString', 'isSearched'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchString = Request::input('searchString');

        $concepts = Concept::where('name', 'LIKE', '%' . $searchString . '%')->get();

        $isSearched = true;

        return view('search', compact('concepts', 'searchString', 'isSearched'));
    }
}