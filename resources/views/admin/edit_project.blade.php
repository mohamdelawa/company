@extends('user.layout.app')
@section('title')
    <title>Edit Project </title>
@stop
@section('css')
    <style type="text/css">
        .isotope_fillter {
            margin-bottom: 50px; }
        .isotope_fillter .gallery_filter {
            text-align: center; }
        .isotope_fillter .gallery_filter li {
            display: inline-block;
            margin-right: 45px; }
        .isotope_fillter .gallery_filter li:last-child {
            margin-right: 0px; }
        .isotope_fillter .gallery_filter li a {
            font-size: 12px;
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            color: #222222;
            transition: all 300ms linear 0s;
            text-transform: uppercase; }
        .isotope_fillter .gallery_filter li:hover a, .isotope_fillter .gallery_filter li.active a {
            color: #766dff; }

        .gallery_f_inner {
            margin-bottom: -45px; }

        .h_gallery_item {
            display: inline-block;
            margin-bottom: 45px; }
        .h_gallery_item .g_img_item {
            position: relative;
            text-align: center;
            overflow: hidden;
            border-radius: 5px; }
        .h_gallery_item .g_img_item:before {
            content: "";
            width: 100%;
            height: 100%;
            left: 0px;
            top: 0px;
            background-image: -moz-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
            background-image: -webkit-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
            background-image: -ms-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
            position: absolute;
            opacity: 0;
            transition: all 300ms ease; }
        .h_gallery_item .g_img_item .light {
            position: absolute;
            left: 0px;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            text-align: center;
            opacity: 0; }
        .h_gallery_item .g_item_text {
            text-align: center; }
        .h_gallery_item .g_item_text h4 {
            color: #222222;
            font-size: 21px;
            margin-top: 22px;
            transition: all 300ms linear 0s; }
        .h_gallery_item .g_item_text p {
            margin-bottom: 0px; }
        .h_gallery_item:hover .g_img_item:before {
            opacity: .85; }
        .h_gallery_item:hover .g_img_item .light {
            opacity: 1; }
        .h_gallery_item:hover .g_item_text h4:hover {
            color: #766dff; }

        .more_btn {
            text-align: center;
            margin-top: 80px; }

    </style>
    @stop
@section('name_page')
    Edit Project
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
                            <h2 class=" font-weight-light">Edit Project </h2>
                        </div>
                        <div class="col-lg-8">

                        </div>


                    </div>
                    <form role="form" method="POST"  enctype="multipart/form-data" action="{{route('edit_project',['id'=>$project->id])}}">
                        <div class="row">
                            <div class="col-lg-8 order-lg-1 personal-info">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> Project Name</label>
                                    <div class="col-lg-9" >
                                        <input class="form-control"  type="text" placeholder="web Market" name="name" value="{{$project->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Url</label>
                                    <div class="col-lg-9" >
                                        <input class="form-control" type="url"  name="url" value="{{$project->url}}"  />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> Status</label>
                                    <div class="col-lg-9" >
                                       <select class="form-control" name="status" >
                                           <option value="Success" @if($project->status=='Success') selected @endif >Success</option>
                                           <option value="On hold " @if($project->status=='On hold') selected @endif >On hold</option>

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
                        <div class="row"  >
                            <h3 style="margin:auto"><b>Images The Project</b></h3>
                        </div>
                        <div class="row"  >
                            <div class="gallery_f_inner row imageGallery1 mr-1" style="margin-top: 20px" id="mySlides">
                                @foreach($project->profile_project as $profile_project)
                                    @foreach($profile_project->image_project as $image)
                                <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print" >
                                    <div class="h_gallery_item">
                                        <div class="g_img_item" >

                                            <img style="width:520px;  height:270px ; " class="img-fluid"  src="{{$image->url}}" alt="photo mohammed">
                                            <a class="light" href="{{$image->url}}"><img src="../../dist/img/icon.png" alt=""></a>
                                            </div>
                                        <a class="btn btn-danger btn-sm text-white" style="margin-left: 100px; margin-top: 20px" href="{{route('delete_image_project',['id' => $image->id])}}" >
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </div>



                                </div>

                               @endforeach
                                @endforeach

                            </div>
                            @if($project->profile_project->isEmpty())
                                <div class="row justify-content-center p-3">

                                    <h6  style="text-align: center"> <b>The Project Contains No Images</b></h6>

                                </div>
                            @endif

                        </div>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="form-group col-lg-6">
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
                                                <th  style="text-align: center">Career</th>
                                                <th  style="text-align: center" >More</th>
                                            </tr>
                                            </thead>
                                            <tbody  id="myTable">
                                            @foreach($profiles as $profile)
                                                <tr>
                                                    <td>

                                                             <input type="checkbox" name="ids[]" value="{{$profile->id}}" multiple>
                                                             <span class="checkmark"></span>


                                                    </td>
                                                    <td>
                                                        <img src="{{$profile->image_profile}}" alt="Product1" class="img-circle img-size-32 mr-2">
                                                        {{$profile->name}}
                                                    </td>
                                                    <td style="text-align: center">{{$profile->career}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn" href="{{route('view_user',['id'=>$profile->id])}}"> <i class="nav-icon fa fa-street-view"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @if($profiles->isEmpty())
                                            <div class="row justify-content-center p-3">

                                                <h6  style="text-align: center"> <b>The Table Contains No Data</b></h6>

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mr-auto">
                                <div class="card col-md-12">
                                    <div class="card-header border-0 justify-content-end">

                                        <h4>Users in Project</h4>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                            <tr>
                                                <th  style="text-align: center">#</th>
                                                <th  style="text-align: center">Full Name</th>
                                                <th  style="text-align: center">Career</th>
                                                <th  style="text-align: center" >More</th>
                                            </tr>
                                            </thead>
                                            <tbody  id="myTable">
                                            <?php
                                            $count =1;
                                            ?>
                                            @foreach($project->profile_project as $profile_project)
                                                <tr>
                                                    <td>
                                                        {{$count++}}
                                                    </td>
                                                    <td>
                                                        <img src="{{$profile_project->profile->image_profile}}" alt="Product1" class="img-circle img-size-32 mr-2">
                                                        {{$profile_project->profile->name}}
                                                    </td>
                                                    <td style="text-align: center">{{$profile_project->profile->career}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn" href="{{route('view_user',['id'=>$profile_project->profile->id])}}"> <i class="nav-icon fa fa-street-view"></i></a>
                                                            <a class="btn" href="{{route('delete_profile_project',['id'=>$profile_project->id])}}"  > <i class="nav-icon fa fa-trash-alt"></i></a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @if($project->profile_project->isEmpty())
                                            <div class="row justify-content-center p-3">

                                                <h6  style="text-align: center"> <b>The Table Contains No Data</b></h6>

                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-10 ml-auto text-right">

                                        <input type="submit" class="btn btn-primary" value="Save Changes" />
                                    </div>
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
