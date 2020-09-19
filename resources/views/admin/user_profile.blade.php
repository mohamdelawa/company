@extends('user.layout.app')
@section('title')
    <title>User Profile</title>
@stop
@section('name_page')
    User Profile
@stop
@section('page padding')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="card card-primary card-outline col-md-11 " style="margin: auto">
                    <div class=" card-body box-profile">

                        <div class="row justify-content-end">

                            <a href="{{route('view_edit_user',['id'=> $user_profile->id])}}">
                                <button class="btn btn-primary">Edit Profile</button>
                            </a>
                        </div>

                        <div class="row">
                            <div style="margin-right: 40px;">
                                <img class="img-rounded img-responsive"
                                 src="{{ $user_profile->profile->image_profile }}"
                                 alt="User profile picture" width="150px" height="200px">
                            </div>
                            <div  >
                                <h4 style="margin-top: 20px;">{{ $user_profile->profile->name }}</h4>
                                <p>
                                     <i class="fa fa-envelope header-icon"></i><span style="margin-left: 10px;">
                                      <a href="mailto:{{$user_profile->email}}">
                                          <b>{{ $user_profile->email }}</b></a>
                                    </span>
                                     <br />
                                    <i class="fa fa-gift "></i><span style="margin-left: 10px;"><b>{{ $user_profile->profile->dob }}</b></span>
                                     <br />
                                    <i class="fa fa-genderless "></i><span style="margin-left: 10px;"><b>{{ $user_profile->profile->gender }}</b></span>
                                    <br />
                                    <i class="fa fa-phone-alt "></i><span style="margin-left: 10px;"><b>{{ $user_profile->profile->phone }}</b></span>
                                    <br />
                                    <i class="fa fa-shopping-bag "></i><span style="margin-left: 10px;"><b>{{ $user_profile->profile->career }}</b></span>
                                    <br />
                                    <i class="fa fa-map-marker-alt "></i><span style="margin-left: 10px;"><b>{{ $user_profile->profile->address }}</b></span>
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
