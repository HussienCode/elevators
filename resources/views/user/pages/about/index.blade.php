@extends('user.layout.master')
@section('content')
    <div class="aboutUs">
        <div class="container">
            @foreach ($about as $item)
                <h1>{{ $item->name }}</h1>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p>
                            {{ $item->description }}
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <img src="/uploads/about/{{$item->image}}" alt="aboutus img" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- End Section --}}
@endsection
