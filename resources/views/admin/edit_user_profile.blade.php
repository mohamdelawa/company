@extends('user.layout.app')
@section('title')
    <title>Edit User Profile</title>
@stop
@section('name_page')
    Edit User Profile
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
                            <h2 class="text-center font-weight-light">Edit User Profile</h2>
                        </div>
                        <div class="col-lg-8">

                        </div>


                    </div>
                    <form role="form" method="POST"  enctype="multipart/form-data" action="{{route('edit_user',['id'=>$user_profile->id])}}">
                        <div class="row ">
                            <div class="col-lg-4 order-lg-0 text-center" >
                                <img src="{{$user_profile->profile->image_profile}}" class="mx-auto img-fluid rounded-circle" alt="image profile"  width="170px" />
                                <h6 class="my-4">Upload a new photo</h6>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="image_profile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                            </div>
                            <div class="col-lg-8 order-lg-1 personal-info">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="Jane Jane" name="name" value="{{$user_profile->profile->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Date of Birth</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="date" placeholder="15/4/1987" name="dob" value="{{$user_profile->profile->dob}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                    <div class="col-lg-9">
                                        <select name="gender" class="custom-select mb-3">
                                            <option   value="mail" @if($user_profile->profile->gender=="mail")selected @endif >Mail</option>
                                            <option   value="femail" @if($user_profile->profile->gender=="femail")selected @endif >Femail</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input  class="form-control" type="email" placeholder="Jane@example.com" name="email" value="{{$user_profile->email}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="+972 594875621" name="phone" value="{{$user_profile->profile->phone}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="Palestine-Gaza" name="address" value="{{$user_profile->profile->address}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Career</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="backend laravel" name="career" value="{{$user_profile->profile->career}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password User</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password"  name="password_user"  />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">My Password </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password"  name="my_password"  required/>
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
