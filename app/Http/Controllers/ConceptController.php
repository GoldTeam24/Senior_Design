<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concept;
use App\Http\Controllers\Redirect;

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
        $processes = $concept->processes()->orderBy('name')->get();
        $youtube = $concept->youtube()->get();

        return view('concept', compact('concept', 'childConcepts', 'parentConcepts', 'processes', 'youtube'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('conceptCreate');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
        $concept = new Concept();
        
        $concept->name = $request['name'];
        $concept->description = $request['description'];
        $concept->body = $request['body'];
        $concept->youtube = $request['youtube'];
        
        $concept->save();
        
        return redirect('search');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $concept = Concept::find($id);
        return view('conceptEdit', compact('concept'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        $concept = Concept::find($request['id']);
        $concept->name = $request['name'];
        $concept->description = $request['description'];
        $concept->body = $request['body'];
        $concept->youtube = $request['youtube'];

        $concept->save();

        return redirect()->route('concept', ['id' => $request['id']]);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $concept = Concept::findOrFail($id);
        $concept->delete();

        return redirect('/')->with('status', 'Concept Successfully Deleted');
    }
}