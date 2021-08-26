@extends('admin.layouts.mainadmin')
@section('title', 'Home Page')

@section('content')
<div class="container-fluid ">
   <h1 class="mb10" > Edit Catagory</h1>
   <a href="catagory">
       <button type="button" class="btn btn-success">back</button>
    </a>

   
   
 <div class="col-lg-12">   
  <div class="card  ">
    
    <div class="card-body">
        <form action="{{route('updatecoupon', $coupons->id)}}" method="post" >
            @csrf
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">coupon name</label>
                <input id="cc-pament" name="coupon_name" type="text" class="form-control" value="{{$coupons->coupon_name}}" aria-required="true" aria-invalid="false" >
            </div>
           
            <div class="form-group">
                <label for="cc-number" class="control-label mb-1">coupon code</label>
                <input id="cc-number" name="coupon_code" type="tel" class="form-control cc-number identified visa" value="{{$coupons->coupon_code}}" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
            </div>

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">value</label>
                <input id="cc-pament" name="value" type="text" class="form-control" value="{{$coupons->value}}" aria-required="true" aria-invalid="false" >
            </div>
            
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block ">
                    <!--<i class="fa fa-lock fa-lg"></i>&nbsp;-->
                    <span id="payment-button-amount">save</span>
                    
                </button>
            </div>
        </form>
    </div>
   </div>
</div>
</div>
@endsection