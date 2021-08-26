@extends('admin.layouts.mainadmin')
@section('title', 'size')
@section('size_select','active')

    

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="main-content">
            <div>
                <h1><b>size</b></h1>
                
            </div>
            <a class="au-btn au-btn-icon au-btn--green au-btn--small m-t-5" href="{{route('addsize')}}" >
                add size</a>
                @if(Session::has('message'))
          <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif
            
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40 m-t-5">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>size</th>
                                            <th>status</th>
                                            <th>created at</th>
                                            <th>authority section  for edit and delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sizes as $s)
                                            
                                       
                                        <tr>
                                            <td>{{$s->size}}</td>
                                            <td>
                                                @if($s->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                {{date('d-M-Y h:i:s', strtotime($s->created_at))}}
                                            </td>
                                            <td>
                                            <a class="au-btn au-btn-icon au-btn--green au-btn--small " href="{{route('editsize', $s->id)}}" >
                                                edit</a>
                                            </td>
                                            <td>
                                            <!--<a class="au-btn au-btn-icon au-btn--green au-btn--small " href="#" >
                                                delete</a>-->
                                                <form action="{{route('deletesize')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="delete" value="{{$s->id}}">
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