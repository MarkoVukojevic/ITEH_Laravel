<?php

namespace App\Http\Controllers;

use App\Http\Resources\SmartphoneCollection;
use App\Models\Smartphone;
use Illuminate\Http\Request;

class ProcessorSmartphoneController extends Controller
{
    public function index($processorID)
    {
        $smartphones = Smartphone::get()->where('processor_id', $processorID);
        if(is_null($smartphones)) {
            return response()->json('Data not found', 404);
        }
        return new SmartphoneCollection($smartphones);
    }
}
