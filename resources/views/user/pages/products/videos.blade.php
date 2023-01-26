@extends('user.layout.master')
@section('content')
    <div class="evelator">
        <div class="container">
            <h1>{{__('message.Elevator videos')}}</h1>
            <div class="row">
                <!-- iframe -->
                @if ($videos->isEmpty())
                    <h2>{{__('message.no videos')}}</h2>
                @endif
                @foreach ($videos as $item)
                    <div class="col-md-6 col-sm-12 mt-3">
                        <iframe src="/uploads/videos/{{$item->name}}" alt="{{$item->description}}" title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>{{$item->description}}</iframe>
                            <h5>{{$item->title}}</h5>
                            <p>{{$item->description}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
