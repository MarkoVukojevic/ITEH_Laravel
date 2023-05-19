<?php

namespace App\Http\Controllers;

use App\Http\Resources\SmartphoneCollection;
use App\Http\Resources\SmartphoneResource;
use App\Models\Smartphone;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SmartphoneController extends Controller
{
    //GET
    //localhost:8000/api/smartphones
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return SmartphoneResource::collection(Smartphone::all());
        return new SmartphoneCollection(Smartphone::all());
    }

    //GET
    //localhost:8000/api/smartphones/{smartphoneID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $smartphoneID
     * @return \Illuminate\Http\Response
     */
    public function show($smartphoneID)
    {
        $smartphone = Smartphone::find($smartphoneID);
        return is_null($smartphone) ? response()->json('Data not found', 404) : new SmartphoneResource($smartphone);
    }


    //DELETE
    //localhost:8000/api/smartphones/{smartphoneID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $smartphoneID
     * @return \Illuminate\Http\Response
     */
    public function destroy($smartphoneID)
    {
        $smartphone = Smartphone::where('id', $smartphoneID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Smartphone deleted successfully.",
            "data" => $smartphone
        ]);
    }
}
