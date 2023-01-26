@extends('user.layout.master')

@section('content')
    <!-- start signin -->
    <div class="signin">
        <div class="container text-center">
            <h1>{{ __('message.reset password') }}</h1>
            <div class="row">
                <div class="col">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf

                        <div class="col-12 mb-2">
                            <input id="email" type="email"
                                class="form-control no-border @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="{{ __('message.your email') }}" />

                            <div class="invalid-feedback">{{ __('message.Enter your email here') }}</div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('message.send password reset link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
