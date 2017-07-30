@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-6 col-xlg-6 col-md-6">
            <div class="card">
                <a href="{{route('admin-groups')}}">
                    <div class="card-block bg-info">
                        <h4 class="text-white card-title">Our groups</h4>
                        <h6 class="card-subtitle text-white m-b-0 op-5">Manage groups here</h6>
                    </div>
                </a>
                <div class="card-block">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+
                            </button>
                        </h2>
                        <div class="message-widget contact-widget">
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                                           class="img-circle"></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">5 users</span></div>
                            </a>
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                                           class="img-circle"></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">5 users</span></div>
                            </a>
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                                           class="img-circle"></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">5 users</span></div>
                            </a>
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                                           class="img-circle"></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">5 users</span></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-xlg-6 col-md-6">
            <div class="card">
                <a href="{{route('admin-groups')}}">
                    <div class="card-block bg-info">
                        <h4 class="text-white card-title">Our users</h4>
                        <h6 class="card-subtitle text-white m-b-0 op-5">Manage users here</h6>
                    </div>
                </a>
                <div class="card-block">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+
                            </button>
                        </h2>
                        <div class="message-widget contact-widget">
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                                           class="img-circle"> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">info@wrappixel.com</span></div>
                            </a>
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                                           class="img-circle"> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">info@wrappixel.com</span></div>
                            </a>
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                                           class="img-circle"> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">info@wrappixel.com</span></div>
                            </a>
                            <a href="#">
                                <div class="user-img"><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                                           class="img-circle"> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">info@wrappixel.com</span></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection