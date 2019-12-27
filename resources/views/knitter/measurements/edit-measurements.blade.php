@extends('layouts.knitterapp')
@section('title','Knitter Dashboard')
@section('content')



<div class="pcoded-wrapper">

<div class="pcoded-content">

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<!-- Page-body start -->

<div class="page-body">
<div class="row">
<div class=" card col-lg-12">
<p></p>
<!-- personal card start -->
@if(session('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif
<!--First Accordion Starts here-->
<div class="row theme-row m-b-10">
<div class="card-header accordion col-lg-11" data-toggle="collapse" data-target="#section1">
<h5 class="card-header-text">Description</h5>
</div>



<form action="{{url('knitter/update-measurements')}}" method="post">
@csrf	
<input type="hidden" name="id" id="id" value="{{$me->id}}"> 
<input type="hidden" id="url" value="{{url('/')}}">		
<div class="col-lg-1 m-t-15">
<i class="fa fa-minus pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="card-block collapse show" id="section1">
<div class="row">
<label class="col-sm-2 col-lg-2 col-form-label m-b-10">Enter Name</label>
<div class="col-sm-4 col-xl-4 m-b-10">
<input type="text" placeholder="Enter Title" name="m_title" value="{{$me->m_title}}" class="form-control">
</div>
<label
class="col-sm-2 col-lg-2 col-form-label m-t-10">Skill
Level</label>
<div class="col-sm-12 col-lg-3 m-t-10">
<select class="form-control" name="difficulty_level" id="sel1">
<option value="Basic" <?php if($me->difficulty_level == 'Basic'){ echo 'selected'; } ?>>Basic</option>
<option value="Easy" <?php if($me->difficulty_level == 'Easy'){ echo 'selected'; } ?>>Easy</option>
<option value="Intermediate" <?php if($me->difficulty_level == 'Intermediate'){ echo 'selected'; } ?>>Intermediate</option>
<option value="Complex" <?php if($me->difficulty_level == 'Complex'){ echo 'selected'; } ?>>Complex</option>
</select>
</div>
<label class="col-sm-2 col-lg-2 col-form-label m-b-10">Description</label>
<div class="col-sm-4 col-xl-4 m-b-20">
<textarea class="form-control max-textarea" placeholder="Enter description" name="m_description" maxlength="255" rows="2">{{$me->m_description}}</textarea>
</div>

<label class="col-sm-2 col-lg-2 col-form-label m-b-10">Upload Image</label>
<div class="col-sm-4 col-xl-4 m-b-10">
<input type="file"  name="user_meas_image" style="display: block;" >

<span class="mytooltip tooltip-effect-2" style="right: 114px !important;">
<span class="tooltip-item">?</span>
<span class="tooltip-content clearfix">
  <img src="{{ $me->user_meas_image ?? 'https://via.placeholder.com/150'}}" alt="Ecluid.png">
</span>
</span>

</div>

</div>
<div class="row form-group">

<label class="col-sm-2 col-form-label">Tools
        Needed</label>
<div class="col-sm-9">
<input type="text" name="tools_needed" class="form-control"
placeholder="Enter Tool Name by Comma separated" value="{{$me->tools_needed}}">
</div>

</div>

</div>
<!--First Accordion Ends here-->

<!--Second Accordion Ends here-->

<!--Third Accordion-->
<div class="row theme-row m-b-10">
<div class="card-header accordion col-lg-11" data-toggle="collapse" data-target="#section3">
<h5 class="card-header-text">Body Size</h5>
</div>
<div class="col-lg-1 m-t-15">
<i class="fa fa-minus pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="card-block collapse show" id="section3">
<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="int1">Hips 
<span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
<span class="tooltip-content clearfix">
  <img src="{{ asset('resources/assets/newtooltip/Euclid.png')}}" alt="Ecluid.png">
  <span class="tooltip-text">Also known as Euclid of andria, was a Greek mathematician, often referred.</span>
</span>
</span>
</label>
<div class="row">
<div class="col-md-6">
<!--<input type="text" class="form-control" id="" name="hips" value=""> -->
<select id="hips" data-id="hips" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
<option value=""></option>
<?php for($d=0;$d<=100;$d++){ 
	 if(isset($me->hips))
	 {
		  
			$hips = $me->hips;
			$hipsint = floor($hips);      // 1
			$hipsfraction = $hips - $hipsint;
	  }
?>
	<option <?php  if(isset($me->hips)){if($hipsint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
<?php } ?>
</select>
</div>
<div class="col-md-6">
<!--<input type="text" class="form-control" id="lower_edge_circumference" name="lower_edge_circumference" value=""> -->
<select  class="form-control measurment" id="fra_hips" data-id="hips" >

	<option value="0.00">.0</option>									
	<option <?php  if(isset($me->hips)){if($hipsfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
	<option <?php  if(isset($me->hips)){if($hipsfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
	<option  <?php  if(isset($me->hips)){if($hipsfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>				
</select>
</div>
<input type="hidden" name="hips" id="dis_hips" value="@if(isset($me->hips)){{$me->hips}}@endif">
</div>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="int1">Waist 
<span class="mytooltip tooltip-effect-2">
	<span class="tooltip-item">?</span>
	<span class="tooltip-content clearfix">
	  <img src="{{asset('resources/assets/measurements/waist.jpg') }}" alt="Ecluid.png">
	  <span class="tooltip-text">Measure around the torso at its smallest point between the rib cage and the hips.</span>
  </span>
</span>
<input type="hidden" name="waist" id="dis_waist" value="@if(isset($me->waist)){{$me->waist}}@endif">
</label>
<div class="row">
<div class="col-md-6">

<select id="waist" data-id="waist" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
<option value=""></option>
<?php for($d=0;$d<=100;$d++){ 
	 if(isset($me->waist))
	 {
		  
			$waist = $me->waist;
			$waistint = floor($waist);      // 1
			$waistfraction = $waist - $waistint;
	  }
?>
	<option <?php  if(isset($me->waist)){if($waistint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
<?php } ?>
</select>
</div>
<div class="col-md-6">
<select  class="form-control measurment" id="fra_waist" data-id="waist" >

	<option value="0.00">.0</option>									
	<option <?php  if(isset($me->waist)){if($waistfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
	<option <?php  if(isset($me->waist)){if($waistfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
	<option  <?php  if(isset($me->waist)){if($waistfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>				
</select>
</div>
</div>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="int1">Waist Front 
<span class="mytooltip tooltip-effect-2">
		<span class="tooltip-item">?</span>
		<span class="tooltip-content clearfix">
		  <img src="{{asset('resources/assets/measurements/no-image-available.jpg') }}" alt="Ecluid.png">
		  <span class="tooltip-text">No Description Available.</span>
	  </span>
</span>
</label>
<div class="row">
<div class="col-md-6">
<select id="waist_front" data-id="waist_front" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
<option value=""></option>
<?php for($d=0;$d<=100;$d++){ 
	 if(isset($me->waist_front))
	 {
		  
			$waist_front = $me->waist_front;
			$waistfint = floor($waist_front);      // 1
			$waistffraction = $waist_front - $waistfint;
	  }
?>
	<option <?php  if(isset($me->waist_front)){if($waistfint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
<?php } ?>
</select> 
<input type="hidden" name="waist_front" id="dis_waist_front" value="@if(isset($me->waist_front)){{$me->waist_front}}@endif">
</div>
<div class="col-md-6">
<select  class="form-control measurment" id="fra_waist_front" data-id="waist_front" >

	<option value="0.00">.0</option>									
	<option <?php  if(isset($me->waist_front)){if($waistffraction == "0.25"){ echo 'selected'; }} ?> value="0.25">.25</option>
	<option <?php  if(isset($me->waist_front)){if($waistffraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
	<option <?php  if(isset($me->waist_front)){if($waistffraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>				
</select>
</div>
</div>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="int1">Waist Back 
<span class="mytooltip tooltip-effect-2">
		<span class="tooltip-item">?</span>
		<span class="tooltip-content clearfix">
		  <img src="{{asset('resources/assets/measurements/no-image-available.jpg') }}" alt="Ecluid.png">
		  <span class="tooltip-text">No Description Available.</span>
	  </span>
</span>
</label>
<div class="row">
<div class="col-md-6">
<select id="waist_back" data-id="waist_back" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
	<option value=""></option>
		<?php for($d=0;$d<=100;$d++){ 
			 if(isset($me->waist_back))
			 {
				  
					$waist_back = $me->waist_back;
					$waistbint = floor($waist_back); 
					$waistbfraction = $waist_back - $waistbint;
			  }
		?>
			<option <?php  if(isset($me->waist_back)){if($waistbint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
		<?php } ?>
	</select>
<input type="hidden" name="waist_back" id="dis_waist_back" value="@if(isset($me->waist_back)){{$me->waist_back}}@endif">
</div>
<div class="col-md-6">
<select  class="form-control measurment" id="fra_waist_back" data-id="waist_back" >

	<option value="0.00">.0</option>									
	<option <?php if($me->measurement_preference=='inches'){ if(isset($me->waist_back)){if($waistbfraction == "0.25"){ echo 'selected'; }} } ?> value="0.25">.25</option>
	<option <?php if($me->measurement_preference=='inches'){ if(isset($me->waist_back)){if($waistbfraction == "0.5"){ echo 'selected'; }} } ?> value="0.5">.5</option>					
	<option <?php if($me->measurement_preference=='inches'){ if(isset($me->waist_back)){if($waistbfraction == "0.75"){ echo 'selected'; }} } ?> value="0.75">.75</option>				
</select>	
</div>
</div>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="int1">Bust / Chest
	<span class="mytooltip tooltip-effect-2">
			<span class="tooltip-item">?</span>
			<span class="tooltip-content clearfix">
			  <img src="{{asset('resources/assets/measurements/bust.jpg') }}" alt="Ecluid.png">
			  <span class="tooltip-text">Measure around the chest at the widest point.</span>
		  </span>
	</span>
</label>
<div class="row">
	<div class="col-md-6">
	<select id="bust" data-id="bust" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
		<option value=""></option>
			<?php for($d=0;$d<=100;$d++){ 
				 if(isset($me->bust))
				 {
					  
						$bust = $me->bust;
						$bustint = floor($bust); 
						$bustfraction = $bust - $bustint;
				  }
			?>
				<option <?php  if(isset($me->bust)){if($bustint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
			<?php } ?>
		</select>
	</div>
	<div class="col-md-6">
	<select  class="form-control measurment" id="fra_bust" data-id="bust" >

		<option value="0.00">.0</option>									
		<option <?php  if(isset($me->bust)){if($bustfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
		<option <?php  if(isset($me->bust)){if($bustfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
		<option <?php  if(isset($me->bust)){if($bustfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>					
	</select>
</div>
</div>
</div>
<input type="hidden" name="bust" id="dis_bust" value="@if(isset($me->bust)){{$me->bust}}@endif">
</div>	
<div class="col-md-3">
<div class="form-group">
<label for="int1">Bust Front 
		<span class="mytooltip tooltip-effect-2">
				<span class="tooltip-item">?</span>
				<span class="tooltip-content clearfix">
				  <img src="{{asset('resources/assets/measurements/no-image-available.jpg') }}" alt="Ecluid.png">
				  <span class="tooltip-text">No Description Available.</span>
			  </span>
		</span>
</label>
<div class="row">
		<div class="col-md-6">
		<select id="bust_front" data-id="bust_front" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
		<option value=""></option>
			<?php for($d=0;$d<=100;$d++){ 
				 if(isset($me->bust_front))
				 {
					  
						$bust_front = $me->bust_front;
						$bustfint = floor($bust_front); 
						$bustffraction = $bust_front - $bustfint;
				  }
			?>
				<option <?php  if(isset($me->bust_front)){if($bustfint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
			<?php } ?>
		</select>
		</div>
		<div class="col-md-6">
		<select  class="form-control measurment" id="fra_bust_front" data-id="bust_front" >

		<option value="0.00">.0</option>									
		<option <?php if(isset($me->bust_front)){if($bustffraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
		<option <?php  if(isset($me->bust_front)){if($bustffraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
		<option <?php  if(isset($me->bust_front)){if($bustffraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>				
	</select> 
		</div>
	</div>
	<input type="hidden" name="bust_front" id="dis_bust_front" value="@if(isset($me->bust_front)){{$me->bust_front}}@endif">
</div>
</div>  
<div class="col-md-3">
<div class="form-group">
	<label for="int1">Bust Back 
			<span class="mytooltip tooltip-effect-2">
					<span class="tooltip-item">?</span>
					<span class="tooltip-content clearfix">
					  <img src="{{asset('resources/assets/measurements/no-image-available.jpg') }}" alt="Ecluid.png">
					  <span class="tooltip-text">No Description Available.</span>
				  </span>
			</span>
	</label>
	<div class="row">
			<div class="col-md-6">
			<select id="bust_back" data-id="bust_back" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
				<option value=""></option>
					<?php for($d=0;$d<=100;$d++){ 
						 if(isset($me->bust_back))
						 {
							  
								$bust_back = $me->bust_back;
								$bustbint = floor($bust_back); 
								$bustbfraction = $bust_back - $bustbint;
						  }
					?>
						<option <?php  if(isset($me->bust_back)){if($bustbint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-6">
			<select  class="form-control measurment" id="fra_bust_back" data-id="bust_back" >
				<option value="0.00">.0</option>									
				<option <?php  if(isset($me->bust_back)){if($bustbfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
				<option <?php  if(isset($me->bust_back)){if($bustbfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
				<option <?php  if(isset($me->bust_back)){if($bustbfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>	
			</select>
			</div>
		</div>
</div>
</div> 
<input type="hidden" name="bust_back" id="dis_bust_back" value="@if(isset($me->bust_back)){{$me->bust_back}}@endif">	
</div>                                        
</div>
<!--Third Accordion Ends here-->

<!--Forth Accordion-->
<div class="row theme-row m-b-10">
<div class="card-header accordion col-lg-11" data-toggle="collapse" data-target="#section4">
<h5 class="card-header-text">Body Length</h5>
</div>
<div class="col-lg-1 m-t-15">
<i class="fa fa-minus pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="card-block collapse show" id="section4">
<div class="row">
<div class="col-md-3">
	<div class="form-group">
		<label for="int1">Waist to Underarm 
				<span class="mytooltip tooltip-effect-2">
						<span class="tooltip-item">?</span>
						<span class="tooltip-content clearfix">
						  <img src="{{asset('resources/assets/measurements/lower_edge_to_under_arm.jpg') }}" alt="Ecluid.png">
						  <span class="tooltip-text">With your arm down against your side, raise the arm slightly, and measure from the lower edge of the sweater to the underarm.</span>
					  </span>
				</span>
		</label>
		<div class="row">
				<div class="col-md-6">
				<select id="waist_to_underarm" data-id="waist_to_underarm" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
				<option value=""></option>
					<?php for($d=0;$d<=50;$d++){ 
						 if(isset($me->waist_to_underarm))
						 {
							  
								$waist_to_underarm = $me->waist_to_underarm;
								$waistunderint = floor($waist_to_underarm); 
								$wunderfraction = $waist_to_underarm - $waistunderint;
						  }
					?>
						<option <?php  if(isset($me->waist_to_underarm)){if($waistunderint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
					<?php } ?>
				</select> 
				</div>
				<div class="col-md-6">
				<select  class="form-control measurment" id="fra_waist_to_underarm" data-id="waist_to_underarm" >

				<option value="0.00">.0</option>									
				<option <?php  if(isset($me->waist_to_underarm)){if($wunderfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
				<option <?php  if(isset($me->waist_to_underarm)){if($wunderfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
				<option <?php  if(isset($me->waist_to_underarm)){if($wunderfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>				
			</select>	 
				</div>
			</div>
			<input type="hidden" name="waist_to_underarm" id="dis_waist_to_underarm" value="@if(isset($me->waist_to_underarm)){{$me->waist_to_underarm}}@endif">
	</div>
</div> 
<div class="col-md-3">
		<div class="form-group">
			<label for="int1">Armhole Depth
					<span class="mytooltip tooltip-effect-2">
							<span class="tooltip-item">?</span>
							<span class="tooltip-content clearfix">
							  <img src="{{asset('resources/assets/measurements/armhole_depth.jpg') }}" alt="Ecluid.png">
							  <span class="tooltip-text">Measure from the top of the shoulder, following the curve, and then straight down to the underarm. Do not follow the curve under the arm.</span>
						  </span>
					</span>
			</label>
			<div class="row">
					<div class="col-md-6">
					<select id="armhole_depth" data-id="armhole_depth" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
					<option value=""></option>
						<?php for($d=0;$d<=50;$d++){ 
							 if(isset($me->armhole_depth))
							 {
								  
									$armhole_depth = $me->armhole_depth;
									$armholeint = floor($armhole_depth); 
									$armholefraction = $armhole_depth - $armholeint;
							  }
						?>
							<option <?php  if(isset($me->armhole_depth)){if($armholeint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
						<?php } ?>
					</select>
					</div>
					<div class="col-md-6">
					<select  class="form-control measurment" id="fra_armhole_depth" data-id="armhole_depth" >

						<option value="0.00">.0</option>									
						<option <?php  if(isset($me->armhole_depth)){if($armholefraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
						<option <?php  if(isset($me->armhole_depth)){if($armholefraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
						<option <?php  if(isset($me->armhole_depth)){if($armholefraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>					
					</select>
					</div>
				</div>
				<input type="hidden" name="armhole_depth" id="dis_armhole_depth" value="@if(isset($me->armhole_depth)){{$me->armhole_depth}}@endif">
		</div>
	</div> 
</div>

</div>
<!--Forth Accordion Ends here-->


<!--Fifth Accordion-->
<div class="row theme-row m-b-10">
<div class="card-header accordion col-lg-11" data-toggle="collapse" data-target="#section5">
<h5 class="card-header-text">Arm Size</h5>
</div>
<div class="col-lg-1 m-t-15">
<i class="fa fa-minus pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="card-block collapse show" id="section5">
<div class="row">
<div class="col-md-3">
	<div class="form-group">
		<label for="int1">Wrist Circumference 
				<span class="mytooltip tooltip-effect-2">
						<span class="tooltip-item">?</span>
						<span class="tooltip-content clearfix">
						  <img src="{{asset('resources/assets/measurements/wrist_circumference.jpg') }}" alt="Ecluid.png">
						  <span class="tooltip-text">Find the break in the wrist by bending the hand up and down. Measure around the wrist just above the break of the wrist.</span>
					  </span>
				</span>
		</label>
		<div class="row">
				<div class="col-md-6">
				<select id="wrist_circumference" data-id="wrist_circumference" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
				<option value=""></option>
					<?php for($d=0;$d<=50;$d++){ 
						 if(isset($me->wrist_circumference))
						 {
							  
								$wrist_circumference = $me->wrist_circumference;
								$wristcint = floor($wrist_circumference); 
								$wristcfraction = $wrist_circumference - $wristcint;
						  }
					?>
						<option <?php  if(isset($me->wrist_circumference)){if($wristcint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
					<?php } ?>
				</select>
				</div>
				<div class="col-md-6">
				<select  class="form-control measurment" id="fra_wrist_circumference" data-id="wrist_circumference" >

					<option value="0.00">.0</option>									
					<option <?php  if(isset($me->wrist_circumference)){if($wristcfraction == "0.25"){ echo 'selected'; }} ?> value="0.25">.25</option>
					<option <?php if(isset($me->wrist_circumference)){if($wristcfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
					<option <?php  if(isset($me->wrist_circumference)){if($wristcfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>				
				</select>	
				</div>
			</div>
			<input type="hidden" name="wrist_circumference" id="dis_wrist_circumference" value="@if(isset($me->wrist_circumference)){{$me->wrist_circumference}}@endif">
	</div>
</div> 
<div class="col-md-3">
		<div class="form-group">
			<label for="int1">Forearm Circumference
					<span class="mytooltip tooltip-effect-2">
							<span class="tooltip-item">?</span>
							<span class="tooltip-content clearfix">
							  <img src="{{asset('resources/assets/measurements/forearm_circumference.jpg') }}" alt="Ecluid.png">
							  <span class="tooltip-text">Measure around the forearm at its widest point.</span>
						  </span>
					</span>
			</label>
			<div class="row">
					<div class="col-md-6">
					<select id="forearm_circumference" data-id="forearm_circumference" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
					<option value=""></option>
						<?php for($d=0;$d<=50;$d++){ 
							 if(isset($me->forearm_circumference))
							 {
								  
									$forearm_circumference = $me->forearm_circumference;
									$forearmint = floor($forearm_circumference); 
									$forearmfraction = $forearm_circumference - $forearmint;
							  }
						?>
							<option <?php  if(isset($me->forearm_circumference)){if($forearmint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
						<?php } ?>
					</select>
					</div>
					<div class="col-md-6">
					<select  class="form-control measurment" id="fra_forearm_circumference" data-id="forearm_circumference" >

						<option value="0.00">.0</option>									
						<option <?php  if(isset($me->forearm_circumference)){if($forearmfraction == "0.25"){ echo 'selected'; }} ?> value="0.25">.25</option>
						<option <?php  if(isset($me->forearm_circumference)){if($forearmfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
						<option <?php  if(isset($me->forearm_circumference)){if($forearmfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
					</select>
					</div>
				</div>
				<input type="hidden" name="forearm_circumference" id="dis_forearm_circumference" value="@if(isset($me->forearm_circumference)){{$me->forearm_circumference}}@endif">
		</div>
	</div> 
	<div class="col-md-3">
			<div class="form-group">
				<label for="int1">Upperarm Circumference 
						<span class="mytooltip tooltip-effect-2">
								<span class="tooltip-item">?</span>
								<span class="tooltip-content clearfix">
								  <img src="{{asset('resources/assets/measurements/upper_arm_circumference.jpg') }}" alt="Ecluid.png">
								  <span class="tooltip-text">Measure around the upper arm at its widest point.</span>
							  </span>
						</span>
				</label>
				<div class="row">
						<div class="col-md-6">
						<select id="upper_arm_circumference" data-id="upper_arm_circumference" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
						<option value=""></option>
							<?php for($d=0;$d<=50;$d++){ 
								 if(isset($me->upper_arm_circumference))
								 {
									  
										$upper_arm_circumference = $me->upper_arm_circumference;
										$upperint = floor($upper_arm_circumference); 
										$upperfraction = $upper_arm_circumference - $upperint;
								  }
							?>
								<option <?php  if(isset($me->upper_arm_circumference)){if($upperint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
							<?php } ?>
						</select> 
						</div>
						<div class="col-md-6">
						<select  class="form-control measurment" id="fra_upper_arm_circumference" data-id="upper_arm_circumference" >

							<option value="0.00">.0</option>									
							<option <?php  if(isset($me->upper_arm_circumference)){if($upperfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
							<option <?php  if(isset($me->upper_arm_circumference)){if($upperfraction == "0.5"){ echo 'selected'; }} ?> value="0.5">.5</option>					
							<option <?php  if(isset($me->upper_arm_circumference)){if($upperfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
						</select>	 
						</div>
					</div>
					<input type="hidden" name="upper_arm_circumference" id="dis_upper_arm_circumference" value="@if(isset($me->upper_arm_circumference)){{$me->upper_arm_circumference}}@endif">
			</div>
		</div> 
		<div class="col-md-3">
				<div class="form-group">
					<label for="int1">Shoulder Circumference
							<span class="mytooltip tooltip-effect-2">
									<span class="tooltip-item">?</span>
									<span class="tooltip-content clearfix">
									  <img src="{{asset('resources/assets/measurements/no-image-available.jpg') }}" alt="Ecluid.png">
									  <span class="tooltip-text">No Description Available.</span>
								  </span>
							</span>
					</label>
					<div class="row">
							<div class="col-md-6">
							
							<select id="shoulder_circumference" name="shoulder_circumference" data-id="shoulder_circumference" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
						<option value=""></option>
							<?php for($d=0;$d<=50;$d++){ 
								 if(isset($me->shoulder_circumference))
								 {
									  
										$shoulder_circumference = $me->shoulder_circumference;
										$shoupperint = floor($shoulder_circumference); 
										$shoulupperfraction = $shoulder_circumference - $shoupperint;
								  }
							?>
								<option <?php  if(isset($me->shoulder_circumference)){if($shoupperint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
							<?php } ?>
						</select>  
							</div>
							<div class="col-md-6">
							<select  class="form-control measurment" id="fra_shoulder_circumference" data-id="shoulder_circumference" >

							<option value="0.00">.0</option>									
							<option <?php  if(isset($me->shoulder_circumference)){if($shoulupperfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
							<option <?php  if(isset($me->shoulder_circumference)){if($shoulupperfraction == "0.5"){ echo 'selected'; }} ?> value="0.5">.5</option>					
							<option <?php  if(isset($me->shoulder_circumference)){if($shoulupperfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
						</select> 
							</div>
						</div>
				</div>
			</div> 
			
			
</div>

</div>
<!--Fifth Accordion Ends here-->

<!--Sixth Accordion-->
<div class="row theme-row m-b-10">
<div class="card-header accordion col-lg-11" data-toggle="collapse" data-target="#section6">
<h5 class="card-header-text">Arm Length</h5>
</div>
<div class="col-lg-1 m-t-15">
<i class="fa fa-minus pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="card-block collapse show" id="section6">
<div class="row">
<div class="col-md-3">
	<div class="form-group">
		<label for="int1">Length to Underarm 
				<span class="mytooltip tooltip-effect-2">
						<span class="tooltip-item">?</span>
						<span class="tooltip-content clearfix">
						  <img src="{{asset('resources/assets/measurements/length_to_under_arm.jpg') }}" alt="Ecluid.png">
						  <span class="tooltip-text">Find the break in the wrist by bending the hand up and down. Measure the underside of the arm from the break of the wrist to the underarm.</span>
					  </span>
				</span>
		</label>
		<div class="row">
				<div class="col-md-6">
				<select id="length_to_under_arm" data-id="length_to_under_arm" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
				<option value=""></option>
					<?php for($d=0;$d<=50;$d++){ 
						 if(isset($me->length_to_under_arm))
						 {
							  
								$length_to_under_arm = $me->length_to_under_arm;
								$lowerunderint = floor($length_to_under_arm); 
								$lowerunderfraction = $length_to_under_arm - $lowerunderint;
						  }
					?>
						<option <?php  if(isset($me->length_to_under_arm)){if($lowerunderint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
					<?php } ?>
				</select> 
				</div>
			
				<div class="col-md-6">
				<select  class="form-control measurment" id="fra_length_to_under_arm" data-id="length_to_under_arm" >
				
					<option value="0.00">.0</option>									
					<option <?php  if(isset($me->length_to_under_arm)){if($lowerunderfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
					<option <?php  if(isset($me->length_to_under_arm)){if($lowerunderfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
					<option <?php  if(isset($me->length_to_under_arm)){if($lowerunderfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
				</select>
				</div>
			
			<input type="hidden" name="length_to_under_arm" id="dis_length_to_under_arm" value="@if(isset($me->length_to_under_arm)){{$me->length_to_under_arm}}@endif">
	</div>
</div> 
</div> 
<div class="col-md-3">
		<div class="form-group">
			<label for="int1">Length Wrist to Elbow
					<span class="mytooltip tooltip-effect-2">
							<span class="tooltip-item">?</span>
							<span class="tooltip-content clearfix">
							  <img src="{{asset('resources/assets/measurements/length_wrist_to_elbow.JPG') }}" alt="Ecluid.png">
							  <span class="tooltip-text">Find the break in the wrist by bending the hand up and down. Measure the inside of the arm from the wrist to the bend of the elbow.</span>
						  </span>
					</span>
			</label>
			<div class="row">
					<div class="col-md-6">
					<select id="length_wrist_to_elbow" data-id="length_wrist_to_elbow" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
					<option value=""></option>
						<?php for($d=0;$d<=50;$d++){ 
							 if(isset($me->length_wrist_to_elbow))
							 {
								  
									$length_wrist_to_elbow = $me->length_wrist_to_elbow;
									$lenwristelbowint = floor($length_wrist_to_elbow); 
									$lenwristfraction = $length_wrist_to_elbow - $lenwristelbowint;
							  }
						?>
							<option <?php  if(isset($me->length_wrist_to_elbow)){if($lenwristelbowint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
						<?php } ?>
					</select>
					</div>
					<div class="col-md-6">
					<select  class="form-control measurment" id="fra_length_wrist_to_elbow" data-id="length_wrist_to_elbow" >

						<option value="0.00">.0</option>									
						<option <?php  if(isset($me->length_wrist_to_elbow)){if($lenwristfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
						<option <?php  if(isset($me->length_wrist_to_elbow)){if($lenwristfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
						<option <?php  if(isset($me->length_wrist_to_elbow)){if($lenwristfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>					
					</select>
					</div>
				</div>
				<input type="hidden" name="length_wrist_to_elbow" id="dis_length_wrist_to_elbow" value="@if(isset($me->length_wrist_to_elbow)){{$me->length_wrist_to_elbow}}@endif">
		</div>
	</div> 
	<div class="col-md-3">
			<div class="form-group">
				<label for="int1">Length Elbow to Underarm 
						<span class="mytooltip tooltip-effect-2">
								<span class="tooltip-item">?</span>
								<span class="tooltip-content clearfix">
								  <img src="{{asset('resources/assets/measurements/lenght_elbow_to_under_arm.JPG') }}" alt="Ecluid.png">
								  <span class="tooltip-text">Find the break in the wrist by bending the hand up and down. Measure the inside of the arm from the wrist to the bend of the elbow.</span>
							  </span>
						</span>
				</label>
				<div class="row">
						<div class="col-md-6">
						<select id="lenght_elbow_to_under_arm" data-id="lenght_elbow_to_under_arm" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
						<option value=""></option>
							<?php for($d=0;$d<=50;$d++){ 
								 if(isset($me->lenght_elbow_to_under_arm))
								 {
									  
										$lenght_elbow_to_under_arm = $me->lenght_elbow_to_under_arm;
										$lengtelobint = floor($lenght_elbow_to_under_arm); 
										$lenelowfraction = $lenght_elbow_to_under_arm - $lengtelobint;
								  }
							?>
								<option <?php  if(isset($me->lenght_elbow_to_under_arm)){if($lengtelobint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
							<?php } ?>
						</select>
						</div>
						<div class="col-md-6">
						<select  class="form-control measurment" id="fra_lenght_elbow_to_under_arm" data-id="lenght_elbow_to_under_arm" >

							<option value="0.00">.0</option>									
							<option <?php  if(isset($me->lenght_elbow_to_under_arm)){if($lenelowfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
							<option <?php  if(isset($me->lenght_elbow_to_under_arm)){if($lenelowfraction == "0.5"){ echo 'selected'; }} ?> value="0.5">.5</option>					
							<option <?php  if(isset($me->lenght_elbow_to_under_arm)){if($lenelowfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
						</select>
						</div>
					</div>
					<input type="hidden" name="lenght_elbow_to_under_arm" id="dis_lenght_elbow_to_under_arm" value="@if(isset($me->lenght_elbow_to_under_arm)){{$me->lenght_elbow_to_under_arm}}@endif">
			</div>
		</div> 
		<div class="col-md-3">
				<div class="form-group">
					<label for="int1">Arm Length to Top of Shoulder
							<span class="mytooltip tooltip-effect-2">
									<span class="tooltip-item">?</span>
									<span class="tooltip-content clearfix">
									  <img src="{{asset('resources/assets/measurements/arm_length_to_shoulder.JPG') }}" alt="Ecluid.png">
									  <span class="tooltip-text">Find the break in the wrist by bending the hand up and down. Measure the inside of the arm from the wrist to the bend of the elbow.</span>
								  </span>
							</span>
					</label>
					<div class="row">
							<div class="col-md-6">
							<select id="arm_length_to_shoulder" data-id="arm_length_to_shoulder" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
							<option value=""></option>
								<?php for($d=0;$d<=50;$d++){ 
									 if(isset($me->arm_length_to_shoulder))
									 {
										  
											$arm_length_to_shoulder = $me->arm_length_to_shoulder;
											$armlenbowint = floor($arm_length_to_shoulder); 
											$armlengfraction = $arm_length_to_shoulder - $armlenbowint;
									  }
								?>
									<option <?php  if(isset($me->arm_length_to_shoulder)){if($armlenbowint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
								<?php } ?>
							</select> 
							</div>
							<div class="col-md-6">
				<select  class="form-control measurment" id="fra_arm_length_to_shoulder" data-id="arm_length_to_shoulder" >
								
									<option value="0.00">.0</option>									
									<option <?php  if(isset($me->arm_length_to_shoulder)){if($armlengfraction == "0.25"){ echo 'selected'; }} ?> value="0.25">.25</option>
									<option <?php  if(isset($me->arm_length_to_shoulder)){if($armlengfraction == "0.5"){ echo 'selected'; }} ?> value="0.5">.5</option>					
									<option <?php  if(isset($me->arm_length_to_shoulder)){if($armlengfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
								</select>
							</div>
						</div>
						<input type="hidden" name="arm_length_to_shoulder" id="dis_arm_length_to_shoulder" value="@if(isset($me->arm_length_to_shoulder)){{$me->arm_length_to_shoulder}}@endif">
				</div>
			</div> 
</div>

</div>
<!--Sixth Accordion Ends here-->

<!--Seventh Accordion-->
<div class="row theme-row m-b-10">
<div class="card-header accordion col-lg-11" data-toggle="collapse" data-target="#section7">
<h5 class="card-header-text">Neck and Shoulders</h5>
</div>
<div class="col-lg-1 m-t-15">
<i class="fa fa-minus pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="card-block collapse show" id="section7">
<div class="row">
<div class="col-md-3">
	<div class="form-group">
		<label for="int1">Depth of Neck (base at shoulder<br> to sternum) 
				<span class="mytooltip tooltip-effect-2">
						<span class="tooltip-item">?</span>
						<span class="tooltip-content clearfix">
						  <img src="{{asset('resources/assets/measurements/neck_depth.JPG') }}" alt="Ecluid.png">
						  <span class="tooltip-text">Find the break in the wrist by bending the hand up and down. Measure the inside of the arm from the wrist to the bend of the elbow.</span>
					  </span>
				</span>
		</label>
		<div class="row">
				<div class="col-md-6">
				<select id="neck_depth" data-id="neck_depth" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
				<option value=""></option>
					<?php for($d=0;$d<=50;$d++){ 
						 if(isset($me->neck_depth))
						 {
							  
								$neck_depth = $me->neck_depth;
								$nectint = floor($neck_depth); 
								$neckfraction = $neck_depth - $nectint;
						  }
					?>
						<option <?php  if(isset($me->neck_depth)){if($nectint == $d){ echo 'selected'; }} ?> value="{{$d}}">{{$d}}</option>
					<?php } ?>
				</select>
				</div>
				<div class="col-md-6">
					<select  class="form-control measurment" id="fra_neck_depth" data-id="neck_depth" >

					<option value="0.00">.0</option>									
					<option <?php  if(isset($me->neck_depth)){if($neckfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
					<option <?php  if(isset($me->neck_depth)){if($neckfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
					<option <?php  if(isset($me->neck_depth)){if($neckfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
				</select>
				</div>
			</div>
			<input type="hidden" name="neck_depth" id="dis_neck_depth" value="@if(isset($me->neck_depth)){{$me->neck_depth}}@endif">
	</div>
</div> 
<div class="col-md-3">
		<div class="form-group">
			<label for="int1">Neck Width
					<span class="mytooltip tooltip-effect-2">
							<span class="tooltip-item">?</span>
							<span class="tooltip-content clearfix">
							  <img src="../files/assets/images/tooltip/Euclid.png" alt="Ecluid.png">
							  <span class="tooltip-text">Also known as Euclid of andria, was a Greek mathematician, often referred.</span>
						  </span>
					</span>
			</label>
			<div class="row">
					<div class="col-md-6">
					<select id="neck_width" name="neck_width" data-id="neck_width" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
							<option value=""></option>
								<?php for($d=0;$d<=50;$d++){ 
									 if(isset($me->neck_width))
									 {
										  
											$neck_width = $me->neck_width;
											$shoulint = floor($neck_width); 
											$widthfraction = $neck_width - $shoulint;
									  }
								?>
									<option <?php  if(isset($me->neck_width)){if($shoulint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
								<?php } ?>
							</select> 
					</div>
					<div class="col-md-6">
						<select  class="form-control measurment" id="fra_neck_width" data-id="neck_width" >

					<option value="0.00">.0</option>									
					<option <?php  if(isset($me->neck_width)){if($widthfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
					<option <?php  if(isset($me->neck_width)){if($widthfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
					<option <?php  if(isset($me->neck_width)){if($widthfraction == "0.75"){ echo 'selected'; }} ?> value="0.75">.75</option>					
				</select>	 
					</div>
				</div>
		</div>
	</div> 
	
		<div class="col-md-3">
				<div class="form-group">
					<label for="int1">Neck to Shoulder
							<span class="mytooltip tooltip-effect-2">
									<span class="tooltip-item">?</span>
									<span class="tooltip-content clearfix">
									  <img src="{{asset('resources/assets/measurements/neck_edge_to_shoulder.jpg') }}" alt="Ecluid.png">
									  <span class="tooltip-text">Measure from the peak of the shoulder where it meets the neck to the top of the shoulder (where it pivots when you raise your arm).</span>
								  </span>
							</span>
					</label>
					<div class="row">
							<div class="col-md-6">
							<select id="neck_edge_to_shoulder" data-id="neck_edge_to_shoulder" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
							<option value=""></option>
								<?php for($d=0;$d<=50;$d++){ 
									 if(isset($me->neck_edge_to_shoulder))
									 {
										  
											$neck_edge_to_shoulder = $me->neck_edge_to_shoulder;
											$shoulint = floor($neck_edge_to_shoulder); 
											$shoulfraction = $neck_edge_to_shoulder - $shoulint;
									  }
								?>
									<option <?php  if(isset($me->neck_edge_to_shoulder)){if($shoulint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
								<?php } ?>
							</select>
							</div>
							<div class="col-md-6">
							<select  class="form-control measurment" id="fra_neck_edge_to_shoulder" data-id="neck_edge_to_shoulder" >

								<option value="0.00">.0</option>									
								<option <?php  if(isset($me->neck_edge_to_shoulder)){if($shoulfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
								<option <?php  if(isset($me->neck_edge_to_shoulder)){if($shoulfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
								<option <?php  if(isset($me->neck_edge_to_shoulder)){if($shoulfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>					
							</select> 
							</div>
						</div>
						<input type="hidden" name="neck_edge_to_shoulder" id="dis_neck_edge_to_shoulder" value="@if(isset($me->neck_edge_to_shoulder)){{$me->neck_edge_to_shoulder}}@endif">
				</div>
			</div> 
			<div class="col-md-3">
					<div class="form-group">
						<label for="int1">Shoulder to Shoulder
								<span class="mytooltip tooltip-effect-2">
										<span class="tooltip-item">?</span>
										<span class="tooltip-content clearfix">
										  <img src="{{asset('resources/assets/measurements/shoulder_to_shoulder.JPG') }}" alt="Ecluid.png">
										  <span class="tooltip-text">Find the break in the wrist by bending the hand up and down. Measure the inside of the arm from the wrist to the bend of the elbow.</span>
									  </span>
								</span>
						</label>
						<div class="row">
								<div class="col-md-6">
								<select id="shoulder_to_shoulder" data-id="shoulder_to_shoulder" onkeypress="selectvalue.apply(this, arguments)" class="select2 form-control measurment">
								<option value=""></option>
									<?php for($d=0;$d<=50;$d++){ 
										 if(isset($me->shoulder_to_shoulder))
										 {
											  
												$shoulder_to_shoulder = $me->shoulder_to_shoulder;
												$shint = floor($shoulder_to_shoulder); 
												$shfraction = $shoulder_to_shoulder - $shint;
										  }
									?>
										<option <?php  if(isset($me->shoulder_to_shoulder)){if($shint == $d){ echo 'selected'; }}  ?> value="{{$d}}">{{$d}}</option>
									<?php } ?>
								</select>
								</div>
								<div class="col-md-6">
								<select  class="form-control measurment" id="fra_shoulder_to_shoulder" data-id="shoulder_to_shoulder" >

									<option value="0.00">.0</option>									
									<option <?php  if(isset($me->shoulder_to_shoulder)){if($shfraction == "0.25"){ echo 'selected'; }}  ?> value="0.25">.25</option>
									<option <?php  if(isset($me->shoulder_to_shoulder)){if($shfraction == "0.5"){ echo 'selected'; }}  ?> value="0.5">.5</option>					
									<option <?php  if(isset($me->shoulder_to_shoulder)){if($shfraction == "0.75"){ echo 'selected'; }}  ?> value="0.75">.75</option>					
								</select> 
								</div>
							</div>
							<input type="hidden" name="shoulder_to_shoulder" id="dis_shoulder_to_shoulder" value="@if(isset($me->shoulder_to_shoulder)){{$me->shoulder_to_shoulder}}@endif">
					</div>
				</div> 
</div>

</div>
<!--Seventh Accordion Ends here-->

<div class="text-center m-b-10">
<a href="#!" id="edit-cancel" class="btn btn-default waves-effect m-r-10">Cancel</a>
<!--<a href="#!" class="btn theme-btn btn-primary waves-effect waves-light">Submit</a>-->
<button type="submit" class=" submit btn theme-btn btn-primary waves-effect waves-light">Submit</button>
</div>
<!-- end of card-block -->
</form>

</div>

</div>
</div>
<!-- Page-body end -->

</div>
</div>
</div>
</div>
</div>
@endsection

@section('footerscript')
<style>
	.measurment{
		padding: 0.55rem .75rem !important;
	}
.select2-selection--single{
	height:37px !important;
	border: 1px solid rgba(0,0,0,.15) !important;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 6px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding-top: 5px;
	background-color: #fff;
}

</style>
<link rel="stylesheet" href="{{ asset('resources/assets/files/bower_components/select2/css/select2.min.css')}}" />


<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/select2/js/select2.full.min.js')}}"></script>

<script type="text/javascript">
	$(function(){
		setTimeout(function(){ $('.alert-danger').hide() },2000);
		$('[data-toggle="tooltip"]').tooltip();

		 $('[data-toggle="popover"]').popover({
            html: true,
            content: function() {
                return $('#primary-popover-content').html();
            }
        });

	$('.select2').select2();

	$('#waist_front').on('select2:select', function (e) { 
		var data = e.params.data;
		var wf = data.text;
		var w = $("#waist").val();
		var total = parseInt(w) - parseInt(wf);
		$('#waist_back').val(total).trigger('change');
			
	});
	
	$('#waist_back').on('select2:select', function (e) {
		var data = e.params.data;
		var wb = data.text;
		var w = $("#waist").val();
		var total = parseInt(w) - parseInt(wb);
		$('#waist_front').val(total).trigger('change');
			
	});
	
	
	$('#bust_back').on('select2:select', function (e) {
		var data = e.params.data;
		var bb = data.text;
		var bust = $("#bust").val();
		var btotal = parseInt(bust) - parseInt(bb);
		$('#bust_front').val(btotal).trigger('change');
			
	});
	
	$('#bust_front').on('select2:select', function (e) {
		var data = e.params.data;
		var bb = data.text;
		var bust = $("#bust").val();
		var btotal = parseInt(bust) - parseInt(bb);
		$('#bust_back').val(btotal).trigger('change');
			
	});
	
	$('#waist_to_underarm').on('select2:select', function (e) {
		var data = e.params.data;
		var bb = data.text;
		var lowerun = $("#lower_edge_to_under_arm").val();
		var btotal = parseInt(lowerun) - parseInt(bb);
		$('#lower_edge_circumference').val(btotal).trigger('change');
			
	});
	$('#length_wrist_to_elbow').on('select2:select', function (e) {
		var data = e.params.data;
		var bb = data.text;
		var lenrun = $("#length_to_under_arm").val();
		var lenbtotal = parseInt(lenrun) - parseInt(bb);
		$('#lenght_elbow_to_under_arm').val(lenbtotal).trigger('change');
			
	});
	
	$(document).on('change keyup','.measurment',function(e){
	
	var attr_id = $(this).attr('data-id');
	var normalid = $("#"+attr_id).val();
	var fractionid = $("#fra_"+attr_id).val();
	//alert(normalid)
	var totl = Number(normalid)+Number(fractionid);
	 $("#dis_"+attr_id).val(totl);
	 //alert(totl)
	//sam1(normalid,fractionid,attr_id);
}); 
	});
</script>
@endsection