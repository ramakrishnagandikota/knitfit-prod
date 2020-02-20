<?php

namespace App\Http\Controllers\Knitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Project;
use DB;

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

		$generatedpatterns = DB::table('projects')
		->join('products', 'projects.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('projects.id as pid','projects.token_key','projects.created_at','projects.updated_at','products.product_name', 'product_images.image_medium')
		->where('projects.status', 1)
		->where('projects.is_archive', 0)
		->where('projects.user_id', Auth::user()->id)
		->get();

		$workinprogress = DB::table('projects')
		->join('products', 'projects.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('projects.id as pid','projects.token_key','projects.created_at','projects.updated_at','products.product_name', 'product_images.image_medium')
		->where('projects.status', 2)
		->where('projects.is_archive', 0)
		->where('projects.user_id', Auth::user()->id)
		->get();

		$completed = DB::table('projects')
		->join('products', 'projects.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('projects.id as pid','projects.token_key','projects.created_at','projects.updated_at','products.product_name', 'product_images.image_medium')
		->where('projects.status', 3)
		->where('projects.is_archive', 0)
		->where('projects.user_id', Auth::user()->id)
		->get();

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

		$generatedpatterns = DB::table('projects')
		->join('products', 'projects.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('projects.id as pid','projects.token_key','projects.created_at','projects.updated_at','products.product_name', 'product_images.image_medium')
		->where('projects.status', 1)
		->where('projects.is_archive', 1)
		->where('projects.user_id', Auth::user()->id)
		->get();

		$workinprogress = DB::table('projects')
		->join('products', 'projects.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('projects.id as pid','projects.token_key','projects.created_at','projects.updated_at','products.product_name', 'product_images.image_medium')
		->where('projects.status', 2)
		->where('projects.is_archive', 1)
		->where('projects.user_id', Auth::user()->id)
		->get();

		$completed = DB::table('projects')
		->join('products', 'projects.product_id', '=', 'products.id')
		->join('product_images', 'products.id', '=', 'product_images.product_id')
		->select('projects.id as pid','projects.token_key','projects.created_at','projects.updated_at','products.product_name', 'product_images.image_medium')
		->where('projects.status', 3)
		->where('projects.is_archive', 1)
		->where('projects.user_id', Auth::user()->id)
		->get();

    	return view('knitter.projects.archive',compact('orders','generatedpatterns','workinprogress','completed'));
    }

    function create_project(Request $request){
    	return view('knitter.projects.create-project');
    }
}
