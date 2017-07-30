@extends('layouts.admin')
@section('styles')
    <style>
        .mdi-close{
            font-size: 15px;
        }
        .label-danger:hover{
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
                <div class="row">
                    @if($isUser)
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="{{ asset('assets/images/users/2.jpg') }}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">Hanna Gover</h4>
                                    <h6 class="card-subtitle">User</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-12"><i class="icon-people"></i> <font class="font-medium">254</font></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="@johnathan" class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line"  placeholder="123123qwe" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Date of Birth</label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control form-control-line" value="2001-02-04">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Groups</label>
                                        <div class="col-md-12">
                                            <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                            <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                            <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                            <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        @else
                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                <div class="card">
                                    <div class="card-block">
                                        <center class="m-t-30"> <img src="{{ asset('assets/images/users/3.jpg') }}" class="img-circle" width="150" />
                                            <h4 class="card-title m-t-10">Hanna Gover</h4>
                                            <h6 class="card-subtitle">Group</h6>
                                            <div class="row text-center justify-content-md-center">
                                                <div class="col-12"><i class="mdi mdi-account-outline"></i> <font class="font-medium">15</font></div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                <div class="card">
                                    <div class="card-block">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Group's Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Groups</label>
                                                <div class="col-md-12">
                                                    <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                                    <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                                    <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                                    <span class="label label-danger">Danger Label<i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                </div>
                @endsection

