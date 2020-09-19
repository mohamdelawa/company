@extends('user.layout.app')
@section('title')
    <title>My Profile</title>
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
    My Profile
@stop
@section('page padding')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="card card-primary card-outline col-md-11 " style="margin: auto">
                    <div class=" card-body box-profile">

                        <div class="row justify-content-end">

                            <a href="{{route('view_edit_profile')}}">
                                <button class="btn btn-primary">Edit Profile</button>
                            </a>
                        </div>

                        <div class="row">
                            <div style="margin-right: 40px;">
                                <img class="img-rounded img-responsive"
                                 src="{{ $user->profile->image_profile }}"
                                 alt="User profile picture" width="150px" height="200px">
                            </div>
                            <div  >
                                <h4 style="margin-top: 20px;">{{ $user->profile->name }}</h4>
                                <p>
                                     <i class="fa fa-envelope header-icon"></i><span style="margin-left: 10px;"><b>{{ $user->email }}</b></span>
                                     <br />
                                    <i class="fa fa-gift "></i><span style="margin-left: 10px;"><b>{{ $user->profile->dob }}</b></span>
                                     <br />
                                    <i class="fa fa-genderless "></i><span style="margin-left: 10px;"><b>{{ $user->profile->gender }}</b></span>
                                    <br />
                                    <i class="fa fa-phone-alt "></i><span style="margin-left: 10px;"><b>{{ $user->profile->phone }}</b></span>
                                    <br />
                                    <i class="fa fa-shopping-bag "></i><span style="margin-left: 10px;"><b>{{ $user->profile->career }}</b></span>
                                    <br />
                                    <i class="fa fa-map-marker-alt "></i><span style="margin-left: 10px;"><b>{{ $user->profile->address }}</b></span>
                                    <br />


                                </p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px;">

                            <h3 style="margin:auto"><b>Images The Project</b></h3>
                        </div>
                        @if($image_projects->isEmpty())
                            <div class="row justify-content-center p-3">

                                <h6  style="text-align: center"> <b>The Project Contains No Images</b></h6>

                            </div>
                        @endif
                        <div class="row" style="margin-top: 40px;">

                            <div class="gallery_f_inner row imageGallery1 mr-1" style="margin-top: 20px" id="mySlides">


                                    @foreach($image_projects as $image)

                                        <div class="col-lg-3 col-md-3 col-sm-6 brand manipul design print" >
                                            <div class="h_gallery_item">
                                                <div class="g_img_item" >

                                                    <img style="  height:200px ; width: 800px " class="img-fluid"  src="{{$image->url}}" alt="photo mohammed">
                                                    <a class="light" href="{{$image->url}}"><img src="../../dist/img/icon.png" alt=""></a>
                                                </div>
                                            </div>



                                        </div>

                                    @endforeach

                            </div>

                        </div>

                        <br/>
                        <div class="row justify-content-center" >   {{  $image_projects->render()}} </div>
                        <br/>

                    </div>
                </div>
            </div>


                </div>
    </section>
@stop
