@extends('user.layout.master')

@section('content')
    <!-- start landing -->
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h1>
                        {{ __('message.Trust is earned') }}
                        <br />
                        {{ __('message.through experience') }}
                        <br />
                        <span>{{ __('message.let us earn yours') }}.</span>
                    </h1>
                    <p>
                        {{ __('message.Supplying and installing all types of elevators Request a free preview now!') }}
                    </p>
                    <a class="btn btn-primary" href="{{ LaravelLocalization::localizeURL('/prices') }}"
                        role="button">{{ __('message.Request for prices') }}</a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="img/header.png" alt="header img" />
                </div>
            </div>
        </div>
    </div>
    <!-- end landing -->

    <!-- start services -->
    <div class="services">
        <div class="container">
            <h1>{{ __('message.our services') }}</h1>
            <div class="row">
                @foreach ($services as $item)
                    <div class="col-md-4 col-sm-12">
                        <h4>{{ $item->name }}</h4>
                        <p>
                            {{ $item->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end services -->

    <!-- start project -->
    <div class="project">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ __('message.Do you have a project?') }}</h1>
                    <p>{{ __('message.that you can contact to start work') }}.</p>
                    <a class="btn btn-primary" href="{{ LaravelLocalization::localizeURL('/contact') }}" role="button">
                        {{ __('message.Start with us') }}
                    </a>
                </div>
                <div class="col-md-6">
                    <img src="img/img3.jpg" alt="project img" />
                </div>
            </div>
        </div>
    </div>
    <!-- end project -->

    {{-- <!-- start products -->
    <div class="products">
        <div class="container">
            <h1>{{ __('message.our products') }}</h1>
            <div class="slider">
                <div class="slide_track">
                    <div class="slide">
                        @foreach ($products as $item)
                            <a href="{{ laravelLocalization::localizeURL(url('/elevator', $item->id)) }}">
                                <img src="/uploads/images/{{ $item->mainPhoto }}" title="{{ $item->name }}"
                                    alt="elevator img" />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products --> --}}

    <!-- start preview -->
    <div class="preview">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img src="img/img4.jpg" alt="preview img" />
                </div>
                <div class="col-md-6 col-sm-12">
                    <h1>{{ __('message.You can now request a free preview') }}</h1>
                    <p>{{ __('message.Call us now') }}.</p>
                    <a class="btn btn-primary" href="tel:{{$whatsapp}}" role="button">
                        <i class="fas fa-mobile-alt"></i>
                        {{$whatsapp}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end preview -->

    <!-- start types -->
    <div class="types">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h3>Elevators for individuals and companies</h3>
                            <p>
                                Installation and maintenance of all types of elevators
                                European standards and competence
                            </p>
                        </li>
                        <li class="list-group-item">
                            <h3>hydraulic lifts</h3>
                            <p>
                                Elevators do not need a room at the top of the well.. All
                                kinds of Italian pumps and pistons
                            </p>
                        </li>
                        <li class="list-group-item">
                            <h3>panorama elevators</h3>
                            <p>
                                It is used for commercial buildings and hotels of all kinds
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="img/img2.jpg" alt="types img" />
                </div>
            </div>
        </div>
    </div>
    <!-- end types -->
@endsection
