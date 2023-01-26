@extends('user.layout.master')
@section('content')
    <div class="nothing">
        <div class="container">
            <div class="row" dir={{app()->getLocale() == 'ar' ? "rtl" : "ltr"}}>
                <div class="col-md-6 col-sm-12 position-relative">
                    <div class="position-absolute top-50 end-0 translate-middle-y">
                        <h1>{{ __('message.There is nothing to show here!') }}</h1>
                        {{-- <h6>يبدو أنه تم نقل الصفحة أو حذفها!</h6> --}}
                        <a href="{{url('/')}}" class="btn btn-primary mt-3">
                            {{ __('message.Go to the home page') }}
                        </a>
                        <a href="{{URL::previous()}}" class="btn btn-secondary mt-3">
                            {{ __('message.back to the products page') }}
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="{{ asset('img/nothing.png') }}" alt="error404-img" />
                </div>
            </div>
        </div>
    </div>
@endsection
