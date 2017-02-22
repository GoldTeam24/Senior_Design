<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($processId)
    {
        //
        $process = Process::find($processId);
        $processSteps = $process->processSteps()->orderBy('step')->get();
        $nextStepNumber = sizeof($processSteps) + 1;
        return view('process', compact('process', 'processSteps', 'nextStepNumber'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($conceptId, $conceptName)
    {
        //
        return view('processCreate', compact('conceptId', 'conceptName'));
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
        $process = new Process();
        
        $process->name = $request['name'];
        $process->description = $request['description'];
        $process->concept_id = $request['concept_id'];
        $process->youtube = $request['youtube'];

        $process->save();
        
        return redirect()->route('concept', ['id' => $request['concept_id']]);
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
        $process = Process::find($id);
        return view('processEdit', compact('process'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        $process = Process::find($request['id']);
        $process->name = $request['name'];
        $process->description = $request['description'];
        $process->concept_id = $request['concept_id'];
        $process->youtube = $request['youtube'];

        $process->save();

        return redirect()->route('process', ['id' => $request['id']]);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $process = Process::findOrFail($id);
        $conceptID = $process->concept_id;
        $process->delete();

        return redirect()->route('concept.show', $conceptID)->with('status', 'Process Successfully Deleted');
    }
}
