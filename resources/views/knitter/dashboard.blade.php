@extends('layouts.knitterapp')
@section('title','Knitter Dashboard')
@section('content')


<div class="pcoded-wrapper" id="dashboard">

<div class="pcoded-content">

<div class="pcoded-inner-content">
<div class="main-body">
	<div class="page-wrapper">
		<!-- Page-body start -->
		<div class="page-body">
			<div class="row">
				<div class="col-xl-12">                                       
					<h4>Hi, {{Auth::user()->first_name}} {{Auth::user()->last_name}} </h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-sm-12 m-l-40 m-r-20 m-t-20">                                     
					<ul id="menu-container">
						<li>
							<figure>
								<a href="#"><img class="dashboard-icons" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Projects.png')}}" ></a>
								<figcaption class="text-muted">Project Library</figcaption>
							</figure>

						</li>
						<li>
							<figure>
								<a href="#"> <img class="dashboard-icons" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Shop-Design.png')}}" /></a>
								<figcaption class="text-muted">Shop</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<a href="#"> <img class="dashboard-icons" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Timeline.png')}}" /></a>
								<figcaption class="text-muted">Connect</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<a href="#"> <img class="dashboard-icons" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Measurement.png')}}" /></a>
								<figcaption class="text-muted">Measurement</figcaption>
							</figure>
						</li>

						<li>
							<figure>
								<a href="#"> <img class="dashboard-icons" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Friends.png')}}" /></a>
								<figcaption class="text-muted">Friends</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<a href="#"> <img class="dashboard-icons" src="{{ asset('resources/assets/files/assets/icon/custom-icon/My-Profile.png')}}" /></a>
								<figcaption class="text-muted">My Profile</figcaption>
							</figure>
						</li>

						<li>
							<figure>
								<a href="#"> <img class="dashboard-icons" src="{{ asset('resources/assets/files/assets/icon/custom-icon/To-do.png')}}" /></a>
								<figcaption class="text-muted">To-Do</figcaption>
							</figure>
						</li>




					</ul>
				</div>

			</div>

			<div class="row">
				<div class="col-xl-12">                                       
					<h4 class="m-b-30 m-t-30">Measurements </h4>
				</div>
			</div>

			@if($measurements->count() > 0)
			
			<div class="row users-card">
			@foreach($measurements as $ms)
				

                <div class="col-lg-6 col-xl-2 col-md-6 measurementbox" id="id_{{base64_encode($ms->id)}}">
                    <div class="card rounded-card custom-card overlay-card">
                        <img class="img-fluid" style="height: 200px;width: 150px;" src="{{ $ms->user_meas_image ? asset($ms->user_meas_image) : asset('https://via.placeholder.com/150X200') }}" alt="round-img">
                    
                        <div class="user-content text-left">
                            <h4 class="m-l-10 text-center"> <a href="{{url('measurements/edit/'.base64_encode($ms->id))}}">{{ $ms->m_title ? ucwords($ms->m_title) : 'No Name' }}</a></h4>
                            
                            <!-- <p class="m-b-0 text-muted">The Boyfriend Sweater is a true classic,it is extremely comfortable and not at all fussy!</p> -->
                            <div class="editable-items">
	                            <i class="fa fa-pencil"></i>
	                            <i class="fa fa-trash getId" data-id="{{base64_encode($ms->id)}}" data-toggle="modal" data-dismiss="modal" data-target="#child-Modal"></i>
                        	</div>
                        </div>
                      
                    </div>
                </div>		
			@endforeach

		</div>
@else
			<div class="row">
			<!-- round card start -->

		<div class="col-lg-12 col-xl-12 col-md-9">
            <div class="card custom-card skew-card">
                <div class="row">
                    <div class="col-lg-6">
                    	<h3 class="m-l-20 m-t-10 text-muted"></h3>
                    </div>
                    <div class="col-lg-6">
                    	<a href="#" >  
                    		<button class="btn waves-effect m-t-10 m-r-20 pull-right waves-light btn-primary theme-outline-btn" ><i class="icofont icofont-plus"></i>Create Measurement</button>
                    	</a>
                    </div>
                </div>
                    <div class="user-content card-bg m-l-40 m-r-40 m-b-40">
                            <img src="{{asset('resources/assets/files/assets/images/arrow.png') }}" id="arrow-img"> 
                        <h3 class="m-t-40 text-muted">Let's Make Your First Measurement !</h3>
                        <h4 class="text-muted m-t-10 m-b-30">A better way to manage your Measurement<br>
                        awaits you right here....</h4>
                  	</div>
                
            </div>
        </div>				

			<!-- Round card end -->
		</div>

		@endif
	</div>
	<!-- Page-body end -->
</div>
</div>
</div>
</div>
<!-- Main-body end -->


                <!--Modal will load after pressing delete -->

        <div class="modal fade" id="child-Modal" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p></p>
                           <p class="text-center"> <img class="img-fluid" src="{{asset('resources/assets/files/assets/images/delete.png') }}" alt="Theme-Logo" /></p>
                           <h6 class="text-center">Do You really want to Delete selected Profile ?</h6>
                           <p></p>
                    </div>
                    <div class="modal-footer">
                            <button class="btn waves-effect waves-light btn-primary theme-outline-btn" data-dismiss="modal">Cancel</button>
                            <button type="button" data-id="0" class="btn btn-danger delete-card" data-dismiss="modal">Delete</button>
                    </div>
                  </div>
                </div>
              </div>

        <!--Child Modal Ends here-->
</div>

@endsection

@section('footerscript')

<script type="text/javascript">
	$(function(){



		$(document).on('click','.getId',function(){

			var id = $(this).attr('data-id');
			$(".delete-card").attr('data-id',id);
		});

		$(document).on('click','.delete-card',function(){
			var id = $(this).attr('data-id');
			
			if(id != 0){
				$.get( "measurements/delete/"+id, function( data ) {
					if(data == 0){
						$("#id_"+id).remove();
						Swal.fire(
		                  'Great!',
		                  'Measurement set removed successfully.',
		                  'success'
		                )
					}else{

					}
				  
				});
			}else{
				Swal.fire(
                  'Oops!',
                  'Unable to delete.Please refresh the page and try again',
                  'fail'
                )
			}
			
		});
	});
</script>
@endsection