<?php

namespace App\Http\Controllers\Knitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Project;
use DB;
use App\UserMeasurements;
use Carbon\Carbon;
use Image;
use File;
use App\Projectimages;
use App\Projectneedle;
use App\Projectyarn;
use App\NeedleSizes;
use App\GaugeConversion;


class ProjectController extends Controller
{
	function __construct(){
		$this->middleware('auth');
	}

    function home(){
    	$orders = DB::table('booking_process')
		->join('products', 'booking_process.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('booking_process.created_at','products.product_name', 'product_images.image_medium')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->get();


		$generatedpatterns = Auth::user()->projects()->where('status',1)->where('is_archive',0)->where('is_deleted',0)->select('id as pid','name','created_at','updated_at')->get();

		$workinprogress = Auth::user()->projects()->where('status',2)->where('is_archive',0)->where('is_deleted',0)->select('id as pid','name','created_at','updated_at')->get();

		$completed = Auth::user()->projects()->where('status',3)->where('is_archive',0)->where('is_deleted',0)->select('id as pid','name','created_at','updated_at')->get();

    	return view('knitter.projects.index',compact('orders','generatedpatterns','workinprogress','completed'));
    }

    function archive(){
    	$orders = DB::table('booking_process')
		->join('products', 'booking_process.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('booking_process.created_at','products.product_name', 'product_images.image_medium')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->get();

		$generatedpatterns = Auth::user()->projects()->where('status',1)->where('is_archive',1)->where('is_deleted',0)->select('id as pid','name','created_at','updated_at')->get();

		$workinprogress = Auth::user()->projects()->where('status',2)->where('is_archive',1)->where('is_deleted',0)->select('id as pid','name','created_at','updated_at')->get();

		$completed = Auth::user()->projects()->where('status',3)->where('is_archive',1)->where('is_deleted',0)->select('id as pid','name','created_at','updated_at')->get();

    	return view('knitter.projects.archive',compact('orders','generatedpatterns','workinprogress','completed'));
    }

    function project_to_archive(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->is_archive = 1;
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_to_library(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->is_archive = 0;
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_change_status(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->status = $request->status;
    	$project->updated_at = Carbon::now();
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function create_project(Request $request){
    	$measurements = Auth::user()->measurements->count();
    	$needlesizes = NeedleSizes::all();
    	return view('knitter.projects.create-project',compact('measurements','needlesizes'));
    }

    function delete_project(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->is_deleted = 1;
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_images(Request $request){
    	$image = $request->file('file');
    	for ($i=0; $i < count($image); $i++) { 
            $filename = time().'-'.$image[$i]->getClientOriginalName();
            $ext = $image[$i]->getClientOriginalExtension();

         $s3 = \Storage::disk('s3');
        //exit;
        $filepath = 'knitfit/'.$filename;

        if($ext == 'pdf'){
        	$pu = $s3->put('/'.$filepath, file_get_contents($image[$i]),'public');
        }else{

        $img = Image::make($image[$i]);
        $height = Image::make($image[$i])->height();
        $width = Image::make($image[$i])->width();
        $img->orientate();
        $img->resize($width, $height, function ($constraint) {
            //$constraint->aspectRatio();
        });
        $img->encode('jpg');
        $pu = $s3->put('/'.$filepath, $img->__toString(), 'public');
    	}

       if($pu){
         return response()->json(['path1' => $filepath, 'path' => 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath]);
     }else{
        echo 'error';
     }
        }
    }

    function remove_project_image(Request $request){
    	//print_r($request->all());
    	//exit;
    }

    function project_external(Request $request){
    	$needlesizes = NeedleSizes::all();
    	$gaugeconversion = GaugeConversion::all();
    	$measurements = Auth::user()->measurements;
    	return view('knitter.projects.external',compact('needlesizes','gaugeconversion','measurements'));
    }

    function upload_project(Request $request){
    	//echo '<pre>';
    	//print_r($request->all());
    	//echo '</pre>';
    	//exit;

    	$projectsCount = Project::count();
    	$token = $projectsCount + 1;

    	$project = new Project;
    	$project->token_key = md5($token);
    	$project->user_id = Auth::user()->id;
    	$project->product_id = 0;
    	$project->name = $request->project_name;
    	$project->description = $request->description;
    	$project->pattern_type = $request->pattern_type;
    	$project->uom = $request->uom;
    	if($request->uom == 'cm'){
    		$project->stitch_gauge = $request->stitch_gauge_cm;
    		$project->row_gauge = $request->row_gauge_cm;
    	}else{
    		$project->stitch_gauge = $request->stitch_gauge_in;
    		$project->row_gauge = $request->row_gauge_in;
    	}
    	$project->measurement_profile = $request->measurement_profile;
    	if($request->uom == 'cm'){
    		$project->ease = $request->ease_cm;
    	}else{
    		$project->ease = $request->ease_in;
    	}
    	$project->user_verify = $request->user_verify;
    	$project->status = 1;
    	$project->created_at = Carbon::now();
    	$project->updated_at = Carbon::now();
    	$save = $project->save();

    		

    	if($save){

    	for ($i=0; $i < count($request->image); $i++) { 
    			$pi = new Projectimages;
    			$pi->user_id = Auth::user()->id;
    			$pi->project_id = $project->id;
    			$pi->image_path = $request->image[$i];
    			$pi->created_at = Carbon::now();
    			$pi->ipaddress = $_SERVER['REMOTE_ADDR'];	
    			$pi->save();
    		}

    		for ($j=0; $j < count($request->yarn_used); $j++) { 
    			$py = new Projectyarn;
    			$py->user_id = Auth::user()->id;
    			$py->project_id = $project->id;
    			$py->yarn_used = $request->yarn_used[$j];
    			$py->fiber_type = $request->fiber_type[$j];
    			$py->yarn_weight = $request->yarn_weight[$j];
    			$py->colourway = $request->colourway[$j];
    			$py->dye_lot = $request->dye_lot[$j];
    			$py->skeins = $request->skeins[$j];
    			$py->created_at = Carbon::now();
    			$py->ipaddress = $_SERVER['REMOTE_ADDR'];
    			$py->save();
    		}

    		for ($k=0; $k < count($request->needle_size); $k++) { 
    			$pn = new Projectneedle;
    			$pn->user_id = Auth::user()->id;
    			$pn->project_id = $project->id;
    			$pn->needle_size = $request->needle_size[$k];
    			$pn->created_at = Carbon::now();
    			$pn->ipaddress = $_SERVER['REMOTE_ADDR'];
    			$pn->save();
    		}

    		return response()->json(['status' => 'success']);
    	}else{
			return response()->json(['status' => 'fail']);
		}
    }
}
