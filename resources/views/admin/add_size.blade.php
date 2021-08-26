@extends('admin.layouts.mainadmin')
@section('title', 'Home Page')

@section('content')
<div class="container-fluid ">
   <h1 class="mb10" > Add size</h1>
   <a href="catagory">
       <button type="button" class="btn btn-success">back</button>
    </a>

   
   
 <div class="col-lg-12">   
  <div class="card  ">
    
    <div class="card-body">
        <form action="{{route('createsize')}}" method="post" >
            @csrf
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">size</label>
                <input id="cc-pament" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
           
            

            <div class="form-group">
                <label>Status</label>
                <select name="status" id="" class="form-control">
                    <option value="1" >Active</option>
                    <option value="0">Inactive</option>
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