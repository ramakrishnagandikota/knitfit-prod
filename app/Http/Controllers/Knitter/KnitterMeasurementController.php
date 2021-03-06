<?php

namespace App\Http\Controllers\Knitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserMeasurements;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Redirect;
use Validator;
use File;
use Image;
use DB;
use DateTime;

class KnitterMeasurementController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function load_measurements(){
        $measurements = User::find(Auth::user()->id)->measurements->take(4);
        return view('knitter.measurements.load-measurements',compact('measurements'));
    }

    function add_measurements(Request $request){
        //$request->session()->forget('measurement_id');
        $mid = $request->session()->get('measurement_id');

        if($mid){
            return redirect('knitter/measurements/edit/'.base64_encode($mid));
        }
        return view('knitter.measurements.add-measurement');
    }

    function get_my_measurements(){
        $meas = User::find(Auth::user()->id)->measurements;
        return view('knitter.measurements.measurements',compact('meas'));
    }

    function edit_measurements(Request $request){
    	$id = base64_decode($request->id);
    	try {
        	$me = UserMeasurements::find($id);
    		return view('knitter.measurements.edit-measurements',compact('me','id'));
	    } catch (Exception $e) {
	        return $e->getMessage();
	    }
    	
    }

    function create_measurements(Request $request){
        
        if(isset($request->user_meas_image)){
            $imagepath = $request->user_meas_image;
        }else{
            $imagepath = "https://via.placeholder.com/200X250";
        }

        $mp = $request->measurement_preference;
        
        $array = array('user_id' => Auth::user()->id,'m_title' => $request->m_title,'m_date' => date('Y-m-d',strtotime($request->m_date)),'measurement_preference' => $request->measurement_preference,'user_meas_image' => $imagepath);
        $data = DB::table('user_measurements')->insertGetId($array);

        if($data){
$body_size = DB::table('measurement_variables')->where('variable_type','body_size')->get();
$body_length = DB::table('measurement_variables')->where('variable_type','body_length')->get();
$arm_size = DB::table('measurement_variables')->where('variable_type','arm_size')->get();
$arm_length = DB::table('measurement_variables')->where('variable_type','arm_length')->get();
$neck_and_shoulders = DB::table('measurement_variables')->where('variable_type','neck_and_shoulders')->get();
$request->session()->put('measurement_id', $data);
            return view('knitter.measurements.getmeasurements',compact('data','mp','body_size','body_length','arm_size','arm_length','neck_and_shoulders'));
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    function update_variables(Request $request){
        //print_r($request->all());
        //exit;
       $id = base64_decode($request->id);

       $array = array('hips' => $request->hips,'waist' => $request->waist,'waist_front' => $request->waist_front,'bust' => $request->bust,'bust_front' => $request->bust_front,'bust_back' => $request->bust_back,'waist_to_underarm' => $request->waist_to_underarm,'armhole_depth' => $request->armhole_depth,'wrist_circumference' => $request->wrist_circumference,'forearm_circumference' => $request->forearm_circumference,'upperarm_circumference' => $request->upperarm_circumference,'shoulder_circumference' => $request->shoulder_circumference,'length_to_underarm' => $request->length_to_underarm,'length_wrist_to_elbow' => $request->length_wrist_to_elbow,'length_elbow_to_underarm' => $request->length_elbow_to_underarm,'arm_length_to_top_of_shoulder' => $request->arm_length_to_top_of_shoulder,'depth_of_neck' => $request->depth_of_neck,'neck_width' => $request->neck_width,'neck_circumference' => $request->neck_circumference,'neck_to_shoulder' => $request->neck_to_shoulder,'shoulder_to_shoulder' => $request->shoulder_to_shoulder);

      $ins = DB::table('user_measurements')->where('id',$id)->update($array);
        
        
        if($ins){
            $request->session()->forget('measurement_id');
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    function upload_measurement_picture(Request $request){
        
        $image = $request->file('file');
        //print_r($image);
        //exit;
         $filename = time().$image->getClientOriginalName();

         $s3 = \Storage::disk('s3');
        //exit;
        $filepath = '/knitfit/'.$filename;

        $img = Image::make($request->file('file'));
        $img->orientate();
        $img->resize(200, 200, function ($constraint) {
            //$constraint->aspectRatio();
        });
        $img->encode('jpg');
        $pu = $s3->put($filepath, $img->__toString(), 'public');

       if($pu){
         return response()->json(['path' => 'https://s3.us-east-2.amazonaws.com/'.env('AWS_BUCKET').$filepath]);
     }else{
        echo 'error';
     }
    }


    function measurement_confirmation(Request $request){
        $id = base64_decode($request->id);
$us = DB::table('user_measurements')->where('id',$id)->first();
$mp = $us->measurement_preference;
$body_size = DB::table('measurement_variables')->where('variable_type','body_size')->get();
$body_length = DB::table('measurement_variables')->where('variable_type','body_length')->get();
$arm_size = DB::table('measurement_variables')->where('variable_type','arm_size')->get();
$arm_length = DB::table('measurement_variables')->where('variable_type','arm_length')->get();
$neck_and_shoulders = DB::table('measurement_variables')->where('variable_type','neck_and_shoulders')->get();
return view('knitter.measurements.measurements-add-confirm',compact('us','mp','body_size','body_length','arm_size','arm_length','neck_and_shoulders'));
    }


    function get_measurement_variables(Request $request){
        $id = base64_decode($request->id);
$us = DB::table('user_measurements')->where('id',$id)->first();
if($request->mp =='inches'){
    $mp = 'inches';
}else{
    $mp = 'centimeters';
}

$body_size = DB::table('measurement_variables')->where('variable_type','body_size')->get();
$body_length = DB::table('measurement_variables')->where('variable_type','body_length')->get();
$arm_size = DB::table('measurement_variables')->where('variable_type','arm_size')->get();
$arm_length = DB::table('measurement_variables')->where('variable_type','arm_length')->get();
$neck_and_shoulders = DB::table('measurement_variables')->where('variable_type','neck_and_shoulders')->get();
return view('knitter.measurements.edit-measurement-variables',compact('us','mp','body_size','body_length','arm_size','arm_length','neck_and_shoulders'));
    }

    function delete_measurements(Request $request){
    	$id = base64_decode($request->id);
        $me = UserMeasurements::find($id);
        $del = $me->delete();
        if($del){
            return 0;
        }else{
            return 1;
        }
    }
}
