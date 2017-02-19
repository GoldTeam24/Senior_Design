<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProcessStep;

class ProcessStepController extends Controller
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
    public function create($processId, $processName, $step)
    {
        //
        return view('processStepCreate', compact('processId', 'processName','step'));
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
        $processStep = new ProcessStep();
        
        $processStep->name = $request['name'];
        $processStep->description = $request['description'];
        $processStep->process_id = $request['process_id'];
        $processStep->step = $request['step'];

        $processStep->save();
        
        return redirect()->route('process', ['id' => $request['process_id']]);
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
    public function edit($id, $processName)
    {
        $processStep = ProcessStep::find($id);
        return view('processStepEdit', compact('processStep', 'processName'));
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
        $processStep = ProcessStep::find($request['id']);
        $processStep->name = $request['name'];
        $processStep->description = $request['description'];
        $processStep->process_id = $request['process_id'];

        $processStep->save();

        return redirect()->route('process', ['id' => $request['process_id']]);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $processStep = ProcessStep::findOrFail($id);
        $processStep->delete();

        return redirect()->back()->with('status', 'Process Step Successfully Deleted');
    }
}
