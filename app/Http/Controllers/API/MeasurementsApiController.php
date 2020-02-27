<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\MeasurementRequest;
use App\Http\Resources\MeasurementResource;
use Symfony\Component\HttpFoundation\Response;
use App\UserMeasurements;
use Auth;
use App\User;

class MeasurementsApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function index(){
    	return MeasurementResource::collection(Auth::user()->measurements()->latest()->get());
    }

    public function store(MeasurementRequest $request){
    	$measurement = Auth::user()->measurements()->create($request->all());
   //return response(new MeasurementResource($measurement), Response::HTTP_CREATED);
    	return response()->json(['created' => true],Response::HTTP_CREATED);
    }

    public function show(UserMeasurements $measurement){
    	return new MeasurementResource($measurement);
    }

    public function update(Request $request, UserMeasurements $measurement){
    	$measurement->update($request->all());
        return response()->json(['updated' => true], Response::HTTP_ACCEPTED);
    }

    public function destroy(UserMeasurements $measurement){
    	$measurement->delete();
        return response()->json(['deleted' => true]);
    }
}
