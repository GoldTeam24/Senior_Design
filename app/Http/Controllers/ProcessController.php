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
        return view('process', compact('process', 'processSteps'));
    }
}
