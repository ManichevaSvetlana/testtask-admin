@extends('layouts.admin')
@section('styles')
    <style>
        td{
            cursor: pointer;
        }
        .mdi{
            font-size: 21px;
        }
        .mdi-account-remove:hover, .mdi-account-multiple-minus:hover{
            color: #bf0002;
            cursor: default;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    @if(!$isGroup)
                    <h4 class="card-title">Users table</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Date of Birth</th>
                                <th><i class="mdi mdi-account-settings-variant"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Deshmukh</td>
                                <td>Prohaska</td>
                                <td>@Genelia</td>
                                <td>12-05-2015</td>
                                <td><i class="mdi mdi-account-remove"></i></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Deshmukh</td>
                                <td>Prohaska</td>
                                <td>@Genelia</td>
                                <td>12-05-2015</td>
                                <td><i class="mdi mdi-account-remove"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        @else
                        <h4 class="card-title">Groups table</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group Name</th>
                                    <th>Number of users</th>
                                    <th><i class="mdi mdi-account-settings-variant"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Deshmukh</td>
                                    <td>12</td>
                                    <td><i class="mdi mdi-account-multiple-minus"></i></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Deshmukh</td>
                                    <td>3</td>
                                    <td><i class="mdi mdi-account-multiple-minus"></i></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection