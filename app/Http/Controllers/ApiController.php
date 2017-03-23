<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\ProcessStep;
use Illuminate\Http\Request;
use App\Models\Concept;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concepts = Concept::all();
        $processes = Process::all();
        $processStep = ProcessStep::all();
        return response()->json([$concepts, $processes, $processStep]);
    }

    public function indexConcept()
    {
        $concepts = Concept::all();
        return response()->json($concepts);
    }

    public function indexProcess()
    {
        $process = Process::all();
        return response()->json($process);
    }

    public function indexProcessStep()
    {
        $processSteps = ProcessStep::all();
        return response()->json($processSteps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_numeric($id)) {
            $concepts = DB::table('concepts')->where('id', $id)->first();
        }
        else $concepts = Concept::where('name', 'LIKE', '%' . $id . '%')->get();
        return response()->json($concepts);
    }

    public function showConcepts($id)
    {
        if(is_numeric($id)) {
            $concepts = DB::table('concepts')->where('id', $id)->first();
        }
        else $concepts = Concept::where('name', 'LIKE', '%' . $id . '%')->get();
        return response()->json($concepts);
    }

    public function showProcesses($id)
    {
        if(is_numeric($id)) {
            $processes = DB::table('processes')->where('id', $id)->first();
        }
        else $processes = Process::where('name', 'LIKE', '%' . $id . '%')->get();
        return response()->json($processes);
    }

    public function showProcessSteps($id)
    {
        if(is_numeric($id)) {
            $processSteps = DB::table('process_steps')->where('id', $id)->first();
        }
        else $processSteps = Process::where('name', 'LIKE', '%' . $id . '%')->get();
        return response()->json($processSteps);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
