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
    public function index()
    {
        //
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
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
    public function show($conceptId)
    {
        $concept = Concept::find($conceptId);
        $childConcepts = $concept->childConcepts()->orderBy('name')->get();
        $parentConcepts = $concept->parentConcepts()->orderBy('name')->get();
        $processes = $concept->processes()->orderBy('name')->get();

        return view('concept', compact('concept', 'childConcepts', 'parentConcepts', 'processes'));
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
    public function update(Request $request, int $id)
    {
        $concept = Concept::find($id);
        $concept->name = $request['name'];
        $concept->description = $request['description'];
        $concept->body = $request['body'];
        $concept->youtube = $request['youtube'];

        $concept->save();

        return redirect()->route('concept.show', ['id' => $request['id']]);
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

    public function createChildLink($parentConceptId)
    {
        $concepts = Concept::orderBy('name')->pluck('name', 'id');
        return view('conceptChildCreate', compact('parentConceptId', 'concepts'));
    }

    public function createParentLink($childConceptId)
    {
        $concepts = Concept::orderBy('name')->pluck('name', 'id');
        return view('conceptParentCreate', compact('childConceptId', 'concepts'));
    }

    public function storeChildLink(Request $request)
    {
        //get the parent concept id
        $concept = Concept::find($request->input('parentConceptId'));
        //attach the child concept
        $concept->childConcepts()->attach($request->input('childConceptId'));

        $concept->save();

        return redirect()->route('concept.show', ['id' => $request['parentConceptId']])->with('status', 'Child Concept Successfully Linked');
    }

    public function storeParentLink(Request $request)
    {
        //get the child concept id
        $concept = Concept::find($request->input('childConceptId'));
        //attach the parent concept
        $concept->parentConcepts()->attach($request->input('parentConceptId'));

        $concept->save();

        return redirect()->route('concept.show', ['id' => $request['childConceptId']])->with('status', 'Parent Concept Successfully Linked');
    }

    public function destroyParentLink(Request $request)
    {
        $parentConcept = Concept::find($request->input('parentConceptId'));
        $conceptId = $request->input('conceptId');
        $parentConcept->childConcepts()->detach($conceptId);

        $parentConcept->save();

        return redirect()->route('concept.show', ['id' => $conceptId])->with('status', 'Parent Concept Successfully Unlinked');
    }

    public function destroyChildLink(Request $request)
    {
        $childConcept = Concept::find($request->input('childConceptId'));
        $conceptId = $request->input('conceptId');
        $childConcept->parentConcepts()->detach($conceptId);

        $childConcept->save();

        return redirect()->route('concept.show', ['id' => $conceptId])->with('status', 'Child Concept Successfully Unlinked');
    }
}