<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;
use App\File;
use App\Models\ProcessStep;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
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
        
        return redirect()->route('concept.show', ['id' => $request['concept_id']]);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($processId)
    {
        $process = Process::find($processId);
        $processSteps = $process->processSteps()->orderBy('step')->get();
        $nextStepNumber = sizeof($processSteps) + 1;
        for($i=0;$i<sizeof($processSteps);$i++){
            $processSteps[$i]->files = $processSteps[$i]->files()->get();
        }
        return view('process', compact('process', 'processSteps', 'nextStepNumber'));
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

        return redirect()->route('process.show', ['id' => $request['id']]);
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

    public function downloadFile(Request $request)
    {
        $fileEntry = File::find($request->input('fileId'));
        $file = Storage::disk('s3')->get($fileEntry->file_name);
        $response = response($file, 200, [
            'Content-Type' => $fileEntry->mime_type,
            'Content-Length' => $fileEntry->file_size,
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename={$fileEntry->file_name}",
            'Content-Transfer-Encoding' => 'binary',
        ]);

        ob_end_clean(); // <- this is important, i have forgotten why.

        return $response;
    }

    public function deleteFile(Request $request)
    {
        $fileEntry = File::find($request->input('fileId'));

        Storage::disk('s3')->delete($fileEntry->file_name);
        $fileEntry->delete();

        return redirect()->back()->with('status', 'File Successfully Deleted');
    }
}
