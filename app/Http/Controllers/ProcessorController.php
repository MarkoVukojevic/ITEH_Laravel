<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProcessorCollection;
use App\Http\Resources\ProcessorResource;
use App\Models\Processor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProcessorController extends Controller
{
    //GET
    //localhost:8000/api/processors
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ProcessorResource::collection(Processor::all());
        return new ProcessorCollection(Processor::all());
    }


    //POST
    //localhost:8000/api/processors
    //BODY = Processor Model

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $processor = Processor::create($input);
        return response()->json([
            "success" => true,
            "message" => "Body Type created successfully.",
            "data" => $processor
        ]);
    }

    //GET
    //localhost:8000/api/processors/{processorID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Processor  $processor
     * @return \Illuminate\Http\Response
     */
    public function show($processorID)
    {
        $processor = Processor::find($processorID);
        return is_null($processor) ? response()->json('Data not found', 404) : new ProcessorResource($processor);
    }


    //DELETE
    //localhost:8000/api/processors/{processorID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $processorID
     * @return \Illuminate\Http\Response
     */
    public function destroy($processorID)
    {
        $processor = Processor::where('id', $processorID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Body Type deleted successfully.",
            "data" => $processor
        ]);
    }
}
