@extends('user.layout.master')

@section('content')
    <!-- start signin -->
    <div class="signin">
        <div class="container text-center">
            <h1>{{__('message.welcome back')}}</h1>
            <div class="row">
                <div class="col">
                    <form class="row g-3 needs-validation" method="POST" action="{{route('login')}}" novalidate>
                        @csrf
                        <div class="col-12 mb-2">
                            <input id="email" type="email" class="form-control no-border @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('message.your email')}}" />
                            <div class="invalid-feedback">{{__('message.Enter your email here')}}</div>
                        </div>

                        <div class="col-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{__('message.your password')}}"
                                required autocomplete="current-password" />
                            <div class="invalid-feedback">{{__('message.Enter your password here')}}.</div>
                        </div>

                        <div class="col-12">
                            @if (Route::has('password.request'))
                                <a id="forgetPass" href="{{ route('password.request') }}">
                                    {{ __('message.Forgot Your Password?') }}
                                </a>
                            @endif
                            <button class="btn btn-primary" type="submit">{{__('message.login')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <span>{{__("message.I do'nt have an account")}}</span>
            <a href="{{route('register')}}">{{__('message.sign up')}}</a>
        </div>
    </div>
    <!-- end signin -->
@endsection
