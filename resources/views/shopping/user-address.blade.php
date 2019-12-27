@if(count($address) > 0)
@foreach($address as $add)
<div class="col-sm-4">
    <div class="box">
        <div class="box-title">
            <h3>{{ucfirst($add->first_name)}} {{ucfirst($add->last_name)}}</h3>
            <a href="javascript:;" class="pull-right addaddress" data-id="{{$add->id}}">Select</a>
        </div>
        <div class="box-content">
            <h6>{{$add->address}} {{$add->address2}},{{$add->city}},{{$add->state}},{{$add->zipcode}}</h6>
            <h6>{{$add->email}}</h6>
           </div>
    </div>
</div>
@endforeach
@else
<p class="text-center">NO ADDRESS FOUND. PLEASE ADD NEW ADDRESS</p>
@endif