<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
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
        $concepts = Concept::all();

        return view('search', compact('concepts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $query = Request::input('searchInput');

        $concepts = Concept::where('name', 'LIKE', '%' . $query . '%')->get();

        return view('search', compact('concepts'));
    }
}
