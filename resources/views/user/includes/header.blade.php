<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit" />

    <title>Elevator</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    {{-- if language is arabic add style rtl else eng style --}}
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('css/mainStyleRtl.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/responsiveRtl.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('css/mainStyle.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <!-- start navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="{{ LaravelLocalization::localizeURL('/') }}"> {{DB::table('setting')->get(['name_' . app()->getLocale() . ' as websiteName'])->first()->websiteName}} </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ LaravelLocalization::localizeURL('/') }}">{{ __('message.HOME') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ DB::table('products')->get() }}" class="nav-link dropdown-toggle"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('message.PRODUCTS') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="text-center">
                                <a class="dropdown-item"
                                    href="{{ LaravelLocalization::localizeURL(url('/webProducts', 0)) }}">{{ __('message.All') }}</a>
                            </li>
                            @foreach (DB::table('lk_category')->select('id', 'name_' . LaravelLocalization::setLocale() . ' as name')->get()
    as $item)
                                <li class="text-center">
                                    <a class="dropdown-item"
                                        href="{{ LaravelLocalization::localizeURL(url('/webProducts', $item->id)) }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
              <a class="nav-link" href="prices.html">Request for prices</a>
            </li> -->
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ LaravelLocalization::localizeURL('/about') }}">{{ __('message.ABOUT US') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ LaravelLocalization::localizeURL('/contact') }}">{{ __('message.CONTACT US') }}</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">



                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                                    </li>
                                @endif

                                {{-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('message.sign up') }}</a>
                                    </li>
                                @endif --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('message.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ LaravelLocalization::localizeURL('/cart') }}">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ LaravelLocalization::localizeURL('/elevator') }}"> --}}
                        @if (app()->getLocale() == 'ar')
                            <a class="nav-link"
                                href="{{ LaravelLocalization::localizeURL('/' . LaravelLocalization::setLocale('en')) }}">
                                <img src="{{ asset('img/united-states.png') }}" alt="ar_lang" />
                            </a>
                        @else
                            <a class="nav-link"
                                href="{{ LaravelLocalization::localizeURL('/' . LaravelLocalization::setLocale('ar')) }}">
                                <img src="{{ asset('img/egypt.png') }}" alt="ar_lang" />
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end navbar -->
