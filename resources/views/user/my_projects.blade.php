@extends('user.layout.app')
@section('title')
    <title>My Projects</title>
@stop
@section('name_page')
    My Projects
@stop
@section('page padding')
   <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <input class="form-control mb-4 col-lg-3 col-md-5 col-sm-6" id="tableSearch" type="text" placeholder="Search">

        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th class="text-center" >
                        #
                    </th>
                    <th class="text-center" >
                        Project Name
                    </th>
                    <th class="text-center" >
                        Team Members
                    </th>
                    <th  class="text-center">
                        Status
                    </th>
                    <th class="text-center" >
                        More
                    </th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                $count =1;
                ?>
                @foreach($projects as $project)
                <tr>
                    <td >
                       {{$count++}}
                    </td>
                    <td>

                           {{$project->name}}

                        <br/>
                        <small>
                            Created {{$project->created_at}}
                        </small>
                    </td>
                    <td >
                        <ul class="list-inline">
                            @foreach($project->profile_project as $profile_project)
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{$profile_project->profile->image_profile}}">
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="project-state">
                        @if($project->status == 'Success')
                             <span class="badge badge-success">{{$project->status}}</span>
                        @else
                           <span class="badge badge-danger">{{$project->status}}</span>
                        @endif
                    </td>
                    <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="{{route('view_edit_my_project',['id'=>$project->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{route('delete_my_project',['id'=>$project->id])}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>

                @endforeach
                </tbody >
            </table>
            @if($projects->isEmpty())
                <div class="row justify-content-center p-3">

                    <h6  style="text-align: center"> <b>The Table Contains No Data</b></h6>

                </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@stop
