@extends('user.layout.app')
@section('title')
    <title>Edit Profile</title>
@stop
@section('name_page')
    Edit Profile
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
                            <h2 class="text-center font-weight-light">Edit Profile</h2>
                        </div>
                        <div class="col-lg-8">

                        </div>


                    </div>
                    <form role="form" method="POST"  enctype="multipart/form-data" action="{{route('edit_profile')}}">
                        <div class="row ">
                            <div class="col-lg-4 order-lg-0 text-center" >
                                <img src="{{$user->profile->image_profile}}" class="mx-auto img-fluid rounded-circle" alt="image profile"  width="170px" />
                                <h6 class="my-4">Upload a new photo</h6>
                                <div class="input-group px-xl-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="image_profile" value="{{old('image_profile')}}">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-8 order-lg-1 personal-info">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="Jane Jane" name="name" value="{{$user->profile->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Date of Birth</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="date" placeholder="15/4/1987" name="dob" value="{{$user->profile->dob}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                    <div class="col-lg-9">
                                        <input disabled class="form-control" type="text"  name="gender" value="{{$user->profile->gender}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input disabled class="form-control" type="email" placeholder="Jane@example.com" name="email" value="{{$user->email}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="+972 594875621" name="phone" value="{{$user->profile->phone}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="Palestine-Gaza" name="address" value="{{$user->profile->address}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Career</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="backend laravel" name="career" value="{{$user->profile->career}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password"  name="password"  required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto text-right">

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
