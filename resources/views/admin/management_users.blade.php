@extends('user.layout.app')
@section('title')
    <title>Management Users</title>
@stop
@section('name_page')
    Management  Users
@stop
@section('page padding')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row ">

                <div class="card col-md-12">
                    <div class="card-header border-0 justify-content-end">

                        <input class="form-control mb-4 col-lg-3 col-md-5 col-sm-6" id="tableSearch" type="text" placeholder="Search">

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th  style="text-align: center">#</th>
                                <th  style="text-align: center">Full Name</th>
                                <th  style="text-align: center">Email</th>
                                <th  style="text-align: center">Career</th>
                                <th  style="text-align: center">Status	</th>
                                <th  style="text-align: center" >More</th>
                            </tr>
                            </thead>
                            <tbody  id="myTable">
                            <?php
                                $count =1;
                            ?>
                            @foreach($users as $ids)
                                <tr>
                                <td>{{$count++}}</td>
                                <td>
                                    <img src="{{$ids->profile->image_profile}}" alt="Product1" class="img-circle img-size-32 mr-2">
                                    {{$ids->profile->name}}
                                </td>
                                   <td style="text-align: center"> <a href="mailto:{{$ids->email}}"> {{$ids->email}}</a></td>
                                <td style="text-align: center">{{$ids->profile->career}}</td>
                                <td style="text-align: center">
                                    @if($ids->status =='Inactive')
                                          <span class="float-right badge bg-danger">{{$ids->status}}</span>
                                    @else
                                          <span class="float-right badge bg-success">{{$ids->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="{{route('view_user',['id'=>$ids->profile->id])}}"> <i class="nav-icon fa fa-street-view"></i></a>
                                        <a class="btn" href="{{route('view_edit_user',['id'=>$ids->profile->id])}}"> <i class="nav-icon fa fa-user-edit"></i></a>
                                        <a class="btn" href="{{route('delete_user',['id'=>$ids->id])}}"  > <i class="nav-icon fa fa-trash-alt"></i></a>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($users->isEmpty())
                            <div class="p-3">
                                <p  style="text-align: center"> <b>The Table Contains No Data</b></p>

                            </div>
                        @endif
                    </div>
                </div>
        </div>
            </div>
    </section>

@stop
