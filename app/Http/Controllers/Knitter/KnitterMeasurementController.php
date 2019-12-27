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

    function get_my_measurements(){
        $meas = User::find(Auth::user()->id)->measurements;
        return view('knitter.measurements.measurements',compact('meas'));
    }

    function edit_measurements(Request $request){
    	$id = base64_decode($request->id);
    	try {
        	$me = UserMeasurements::find($id);
    		return view('knitter.measurements.edit-measurements',compact('me'));
	    } catch (Exception $e) {
	        return $e->getMessage();
	    }
    	
    }

    function create_measurements(Request $request){
        
        if(isset($request->image)){
            $imagepath = $request->image;
        }elseif(isset($request->image1)){
            $imagepath = $request->image1;
        }else{
            $imagepath = "";
        }
        //print_r($request->all());
        //exit;
        
        $array = array('user_id' => Auth::user()->id,'m_title' => $request->measurement_name,'m_description' => $request->description,'user_meas_image' => $imagepath);
        $data = DB::table('user_measurements')->insertGetId($array);

        if($data){
            return response()->json(['status' => 'success', 'id' => base64_encode($data)]);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    function update_measurements(Request $request){
        $data = Input::all();
            $array = array('m_title' => $data['m_title'],'m_description'=>$data['m_description'],'difficulty_level'=>$data['difficulty_level'],'tools_needed'=>$data['tools_needed'],'hips'=>$data['hips'],'waist' => $data['waist'],'bust' => $data['bust'],'neck_edge_to_shoulder' => $data['neck_edge_to_shoulder'],'wrist_circumference' => $data['wrist_circumference'],'forearm_circumference' => $data['forearm_circumference'],'upper_arm_circumference' => $data['upper_arm_circumference'],'waist_to_underarm' => $data['waist_to_underarm'],'length_to_under_arm' => $data['length_to_under_arm'],'length_wrist_to_elbow' => $data['length_wrist_to_elbow'],'armhole_depth' => $data['armhole_depth'],'waist_front' => $data['waist_front'],'bust_front' => $data['bust_front'],'bust_back' => $data['bust_back'],'waist_back' => $data['waist_back'],'arm_length_to_shoulder'=>$data['arm_length_to_shoulder'],'shoulder_to_shoulder'=>$data['shoulder_to_shoulder'],'neck_depth'=>$data['neck_depth'],'lenght_elbow_to_under_arm'=>$data['lenght_elbow_to_under_arm'],'shoulder_circumference'=>$data['shoulder_circumference'],'neck_width'=>$data['neck_width'],'updated_at' => date('Y-m-d H:i:s'));
            $ins = DB::table('user_measurements')->where('id',$request->id)->update($array);
        
        
        if($ins){
            Session::flash('message','Measurement profile saved successfully');
            return redirect('knitter/measurements');
        }else{
            Session::flash('message','Problem in saving.Try again after some time.');
            return redirect()->back();
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

    function delete_measurements(Request $request){
    	$id = base64_decode($request->id);
        $me = UserMeasurements::find($id);
        $del = $me->delete();
        if($del){
            Session::flash('message','Measurement profile deleted successfully');
            return redirect()->back();
        }else{
            Session::flash('message','Problem in deletion.Try again after some time.');
            return redirect()->back();
        }
    }
}
