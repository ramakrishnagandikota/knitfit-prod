			@if($measurements->count() > 0)
			
			<div class="row users-card">
			@foreach($measurements as $ms)
				

                <div class="col-lg-6 col-xl-2 col-md-6 measurementbox id_{{$ms->id}}" id="id_{{base64_encode($ms->id)}}">
                    <div class="card rounded-card custom-card overlay-card">
                        <img class="img-fluid" style="height: 200px;width: 150px;" src="{{ $ms->user_meas_image ? asset($ms->user_meas_image) : asset('https://via.placeholder.com/150X200') }}" alt="round-img">
                    
                        <div class="user-content text-left">
                            <h4 class="m-l-10 text-center"> <a href="{{url('knitter/measurements/edit/'.base64_encode($ms->id))}}">{{ $ms->m_title ? ucwords($ms->m_title) : 'No Name' }}</a></h4>
                            
                            <!-- <p class="m-b-0 text-muted">The Boyfriend Sweater is a true classic,it is extremely comfortable and not at all fussy!</p> -->
                            <div class="editable-items">
	                            <a href="{{url('knitter/measurements/edit/'.base64_encode($ms->id))}}" ><i class="fa fa-pencil"></i></a>
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
                    		<a href="{{url('knitter/measurements')}}" style="text-transform: none;" class="btn waves-effect m-t-10 m-r-20 pull-right waves-light btn-primary theme-outline-btn" ><i class="icofont icofont-plus"></i>Create a measurement profile</a>
                    	</a>
                    </div>
                </div>
                    <div class="user-content card-bg m-l-40 m-r-40 m-b-40">
                            <img src="{{asset('resources/assets/files/assets/images/arrow.png') }}" id="arrow-img"> 
                        <h3 class="m-t-40 text-muted">Let's create your first measurement profile!</h3>
                        <h4 class="text-muted m-t-10 m-b-30">We'll take your measurements and get you ready to generate a custom pattern!</h4>
                  	</div>
                
            </div>
        </div>				

			<!-- Round card end -->
		</div>

		@endif