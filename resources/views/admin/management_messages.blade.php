@extends('user.layout.app')
@section('title')
    <title>Management Messages</title>
@stop
@section('name_page')
    Management  Messages
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
                                <th  style="text-align: center">Phone</th>
                                <th  style="text-align: center">Message</th>
                                <th  style="text-align: center" >More</th>
                            </tr>
                            </thead>
                            <tbody  id="myTable">
                            <?php
                                $count =1;
                            ?>
                            @foreach($contacts as $contact)
                                <tr>
                                <td>{{$count++}}</td>
                                <td>
                                   {{$contact->name}}
                                </td>
                                <td style="text-align: center"><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
                                <td style="text-align: center">{{$contact->phone}}</td>
                                <td style="text-align: center">
                                   {{$contact->message}}
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{route('delete_message',['id'=>$contact->id])}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        @if($contacts->isEmpty())
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
