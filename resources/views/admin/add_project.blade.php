@extends('user.layout.app')
@section('title')
    <title>Add Project </title>
@stop
@section('name_page')
    Add Project
@stop
@section('page padding')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="card card-primary card-outline col-md-12 " style="margin: auto">
                    <div class=" card-body box-profile">
                <div class="container py-2">
                    <div class="row my-2">
                        <!-- edit form column -->
                        <div class="col-lg-4">
                            <h2 class=" font-weight-light">Add Project </h2>
                        </div>
                        <div class="col-lg-8">

                        </div>


                    </div>
                    <form role="form" method="POST"  enctype="multipart/form-data" action="{{route('add_project')}}">
                        <div class="row">
                            <div class="col-lg-8 order-lg-1 personal-info">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> Project Name</label>
                                    <div class="col-lg-9" >
                                        <input class="form-control"  type="text" placeholder="web Market" name="name" value="{{old('name')}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Url</label>
                                    <div class="col-lg-9" >
                                        <input class="form-control" type="url"  name="url" value="{{old('url')}}"  />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> Status</label>
                                    <div class="col-lg-9" >
                                       <select class="form-control" name="status" >
                                           <option value="Success" @if(old('status')=='Success') selected @endif >Success</option>
                                           <option value="On hold " @if(old('status')=='On hold') selected @endif >On hold</option>

                                       </select>
                                    </div>

                                </div>
                                <div class="input-group row">
                                        <label class="col-lg-3">Choose Images</label>
                                        <div class="custom-file col-lg-9" style="margin-left: 10px">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                   aria-describedby="inputGroupFileAddon01" multiple name="images_project[]">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose Images Project</label>
                                        </div>
                                    </div>
                                 <br />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-11">
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
                                                <th  style="text-align: center" >More</th>
                                            </tr>
                                            </thead>
                                            <tbody  id="myTable">
                                            @foreach($users as $ids)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="ids[]" value="{{$ids->profile->id}}" multiple >
                                                        <span class="checkmark"></span>
                                                    </td>
                                                    <td>
                                                        <img src="{{$ids->profile->image_profile}}" alt="Product1" class="img-circle img-size-32 mr-2">
                                                        {{$ids->profile->name}}
                                                    </td>
                                                    <td style="text-align: center">{{$ids->email}}</td>
                                                    <td style="text-align: center">{{$ids->profile->career}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn" href="{{route('view_user',['id'=>$ids->profile->id])}}"> <i class="nav-icon fa fa-street-view"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @if($users->isEmpty())
                                            <div class="row justify-content-center p-3">

                                                <h6  style="text-align: center"> <b>The Project Contains No Images</b></h6>

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-1">
                                <div class="col-lg-10 ml-auto text-right">

                                    <input type="submit" class="btn btn-primary" value="Save" />
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>


                    </div>
                </div>
            </div>
        </div>
            </div>
    </section>

@stop
