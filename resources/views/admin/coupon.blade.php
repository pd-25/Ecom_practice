@extends('admin.layouts.mainadmin')
@section('title', 'coupon')
@section('coupon_select','active')
    

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="main-content">
            <div>
                <h1><b>Coupon</b></h1>
                
            </div>
            <a class="au-btn au-btn-icon au-btn--green au-btn--small m-t-5" href="{{route('addcoupon')}}" >
                add catagory</a>
                @if(Session::has('message'))
          <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif
            
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40 m-t-5">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>coupon name</th>
                                            <th>coupon code</th>
                                            <th>value</th>
                                            <th>authority section  for edit and delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $c)
                                            
                                       
                                        <tr>
                                            <td>{{$c->coupon_name}}</td>
                                            <td>{{$c->coupon_code}}</td>
                                            <td>
                                                {{$c->value}}
                                            </td>
                                            <td>
                                            <a class="au-btn au-btn-icon au-btn--green au-btn--small " href="{{route('editcoupon', $c->id)}}" >
                                                edit</a>
                                            </td>
                                            <td>
                                            <!--<a class="au-btn au-btn-icon au-btn--green au-btn--small " href="#" >
                                                delete</a>-->
                                                <form action="{{route('deleteCoupon')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="delete" value="{{$c->id}}">
                                                    <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">delete</button>
                                                  </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE-->
        </div>                    
    </div>  
</div>          
@endsection