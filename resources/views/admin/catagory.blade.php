@extends('admin.layouts.mainadmin')
@section('title', 'catagory')
@section('catagory_select','active')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="main-content">
            <div>
                <h1><b>Catagory</b></h1>
                
            </div>
            <a class="au-btn au-btn-icon au-btn--green au-btn--small m-t-5" href="{{route('addCatagory')}}" >
                add catagory</a>
                @if(Session::has('message'))
          <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif
            
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40 m-t-5">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>catagory name</th>
                                            <th>catagory clug</th>
                                            <th>status</th>
                                            <th>created at</th>
                                            <th>authority section  for edit and delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($catagories as $cat)
                                            
                                       
                                        <tr>
                                            <td>{{$cat->catagory_name}}</td>
                                            <td>{{$cat->catagory_slug}}</td>
                                            <td>
                                                @if($cat->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                {{date('d-M-Y h:i:s', strtotime($cat->created_at))}}
                                            </td>
                                            <td>
                                            <a class="au-btn au-btn-icon au-btn--green au-btn--small " href="{{route('editCatagory', $cat->id)}}" >
                                                edit</a>
                                            </td>
                                            <td>
                                            <!--<a class="au-btn au-btn-icon au-btn--green au-btn--small " href="#" >
                                                delete</a>-->
                                                <form action="{{route('deleteCatagory')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="delete" value="{{$cat->id}}">
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