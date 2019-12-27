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
			
			<div class="row users-card">
			@foreach($measurements as $ms)
				

                <div class="col-lg-6 col-xl-3 col-md-6" id="card1">
                    <div class="card rounded-card user-card">
                        <div class="card-block">
                            <div class="img-hover">
                                <img class="img-fluid img-radius fixed-width-img" src="{{asset('resources/assets/files/assets/images/user-card/Off-the-Shoulder Ruffle Top.jpg') }}" alt="round-img">
                            </div>
                            <div class="user-content">
                                <h4 class="">{{$ms->m_title ?? 'No Name'}}</h4>
                                <!-- <p class="m-b-0 text-muted">This "cold-shoulder" tee is the perfect flirty summer tee for all ages.</p> -->
                                <div class="editable-items">
                                <a href="{{url('knitter/measurements/edit/'.base64_encode($ms->id))}}" ><i class="fa fa-pencil" title="Edit"></i></a>
                                <a href="{{url('knitter/measurements/delete/'.base64_encode($ms->id))}}" onclick="return confirm('Are you sure want to delete ?') " ><i class="fa fa-trash" title="Delete"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>			
			@endforeach

		</div>

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
	</div>
	<!-- Page-body end -->
</div>
</div>
</div>
</div>
<!-- Main-body end -->

</div>

@endsection

@section('footerscript')

@endsection