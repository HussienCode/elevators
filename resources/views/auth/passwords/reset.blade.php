@extends('user.layout.master')

@section('content')
    <!-- start signup -->
    <div class="signup">
        <div class="container text-center">
            <h1>{{__('message.reset password')}}</h1>
            <div class="row">
                <div class="col">
                    <form class="row g-3 needs-validation" method="POST" action="{{ route('password.update') }}" novalidate>
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        {{-- E-mail --}}
                        <div class="col-12 mb-2">
                            <input id="email" type="email" placeholder="{{__('message.your email')}}" class="form-control no-border @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="col-12 mb-2">
                            <input id="password" type="password" placeholder="{{__('message.your password')}}" class="form-control no-border @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <input placeholder="{{__('message.confirm password')}}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('message.reset password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

