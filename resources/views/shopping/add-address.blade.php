@if($ua)
<div class="checkout-title">
    <h3>Billing Details</h3>
</div>
<div class="row check-out">
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">First Name</div>
        <input type="text" name="first_name" value="{{$ua->first_name}}" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Last Name</div>
        <input type="text" name="last_name" value="{{$ua->last_name}}" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Phone</div>
        <input type="text" name="phone" value="{{$ua->phone}}" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Email Address</div>
        <input type="text" name="email" value="{{$ua->email}}" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12">
        <div class="field-label">Country</div>
        <input type="text" name="country" value="{{$ua->country}}" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Address</div>
        <input type="text" name="address" value="{{$ua->address}}" placeholder="Street address">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Address 2</div>
        <input type="text" name="address2" value="{{$ua->address2}}" placeholder="Street address">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12x">
        <div class="field-label">Town/City</div>
        <input type="text" name="city" value="{{$ua->city}}" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">State</div>
        <input type="text" name="state" value="{{$ua->state}}" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Postal Code</div>
        <input type="text" name="zipcode" value="{{$ua->zipcode}}" placeholder="">
    </div>
    
</div>
@else
<div class="checkout-title">
    <h3>Billing Details</h3>
</div>
<div class="row check-out">
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">First Name</div>
        <input type="text" name="first_name" value="" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Last Name</div>
        <input type="text" name="last_name" value="" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Phone</div>
        <input type="text" name="phone" value="" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Email Address</div>
        <input type="text" name="email" value="" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12">
        <div class="field-label">Country</div>
        <input type="text" name="country" value="" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Address</div>
        <input type="text" name="address" value="" placeholder="Street address">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Address 2</div>
        <input type="text" name="address2" value="" placeholder="Street address">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12x">
        <div class="field-label">Town/City</div>
        <input type="text" name="city" value="" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">State</div>
        <input type="text" name="state" value="" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <div class="field-label">Postal Code</div>
        <input type="text" name="zipcode" value="" placeholder="">
    </div>
    
</div>
<input type="checkbox" name="save_address" value="1" > Save this address for future checkout
@endif