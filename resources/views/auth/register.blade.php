@extends('user.layout.master')

@section('content')
    <!-- start signup -->
    <div class="signup">
        <div class="container text-center">
            <h1>{{__('message.create your account')}}</h1>
            <div class="row">
                <div class="col">
                    <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}" novalidate>
                        @csrf
                        {{-- Name --}}
                        <div class="col-12 mb-2">
                            <input id="name" type="text" placeholder="{{__("message.What's your name ?")}}"
                                class="form-control no-border @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <div class="invalid-feedback">You don't have a name ?!</div>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- E-mail --}}
                        <div class="col-12 mb-2">
                            <input id="email" type="email"
                                class="form-control no-border @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="{{__('message.your email')}}">
                            <div class="invalid-feedback">Your email !</div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="col-12 mb-2">
                            <input placeholder="{{__('message.your password')}}" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            <div class="invalid-feedback">Create your password !</div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                                <input id="password-confirm" type="password" class="form-control" placeholder="{{__('message.confirm password')}}"
                                    name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('message.sign up') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
