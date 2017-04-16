<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Models\ProcessStep;
use App\Models\Process;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProcessStepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        
        return redirect()->route('process.show', ['id' => $request['process_id']]);
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

        return redirect()->route('process.show', ['id' => $request['process_id']]);
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
        $process = Process::findorFail($processStep->process_id);
        $processStep->delete();

        $processSteps = $process->processSteps()->orderBy('step')->get();
        for($i=0;$i<sizeof($processSteps);$i++){
            $processSteps[$i]->step = $i+1;
            $processSteps[$i]->save();
        }
       
        return redirect()->back()->with('status', 'Process Step Successfully Deleted');
    }

    public function uploadFile(Request $request)
    {
        $processStepId = $request->input('id');

        if(!$request->hasFile('file')) {
            return response('No file sent', 400);
        }

        if(!$request->file('file')->isValid()) {
            return response('FIle is not valid', 400);
        }

        $validator = Validator::make($request->all(), [
            'id'=> 'required|integer',
            'file' => 'required|max:6000'
        ]);

        if ($validator->fails()) {
            return response('There are errors in the form', 400);
        }
        $originalFileName = $request->file('file')->getClientOriginalName();
        $splitName = explode('.',$originalFileName);
        $mimeType = $request->file('file')->getClientMimeType();
        $fileSize = $request->file('file')->getClientSIze();
        $fileName = $splitName[0] . '.' . $request->file('file')->guessClientExtension();

        $s3 = Storage::disk('s3');
        if ($s3->put($fileName, file_get_contents($request->file('file')), 'public')) {
            $file = File::create([
                'file_name' => $fileName,
                'mime_type' => $mimeType,
                'file_size' => $fileSize,
                'file_path' => env('S3_URL') . $fileName,
                'type' => 's3',
            ]);

            DB::table('process_step_file')->insert([
                'process_step_id' => $processStepId,
                'file_id' => $file->id,

            ]);

            $fileImg = File::find($file->id);
            $fileImg->status = 1;
            $fileImg->save();
        }
        return response($file, 201);
    }
}
