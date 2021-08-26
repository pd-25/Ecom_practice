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
        <form action="{{route('updateCatagory', $catagories->id)}}" method="post" >
            @csrf
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Name Catagory</label>
                <input id="cc-pament" name="catagory_name" type="text" class="form-control" value="{{$catagories->catagory_name}}" aria-required="true" aria-invalid="false" >
            </div>
           
            <div class="form-group">
                <label for="cc-number" class="control-label mb-1">Catagory Slug</label>
                <input id="cc-number" name="catagory_slug" type="tel" class="form-control cc-number identified visa" value="{{$catagories->catagory_slug}}" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
            </div>

            <div class="form-group">
                <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="1" @if($catagories->status == 1) selected @endif>Active</option>
                        <option value="0" @if($catagories->status == 0) selected @endif>Inactive</option>
                    </select>
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