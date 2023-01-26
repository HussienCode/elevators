@extends('user.layout.master')
@section('content')
    <div class="allProducts">
        <div class="container">

            <h1>{{ __('message.all products') }}</h1>

            <h2>{{ __('message.filter results') }}</h2>
            <form class="row mb-5 text-center" action="{{ route('webProducts.store', ['cat_id' => 0]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-2 col-sm-12">
                    <select class="form-select" id="validation8" name="company">
                        <option selected disabled value="0">{{ __('message.company') }}</option>
                        @foreach ($companies as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 col-sm-12">
                    <select class="form-select" id="validation8" name="size">
                        <option selected disabled value="0">{{ __('message.size') }}</option>
                        @foreach ($sizes as $item)
                            <option value="{{ $item->id }}">{{ $item->sizeNum }}{{ $item->unit }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 col-sm-12">
                    <input type="text" class="filter-input" placeholder="{{ __('message.price') }}" id="validation8"
                        name="price">
                </div>

                <div class="col-md-2 col-sm-12">
                    <select class="form-select" id="validation8" name="design">
                        <option selected disabled value="0">{{ __('message.design') }}</option>
                        @foreach ($designs as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 col-sm-12">
                    <select class="form-select" id="validation8" name="country">
                        <option selected disabled value="0">{{ __('message.country') }}</option>
                        @foreach ($countries as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 col-sm-12">
                    <button type="submit" class="btn btn-primary">{{ __('message.filter') }}</button>
                </div>
            </form>


            @if (Session::has('success'))
                @if (app()->getLocale() == 'ar')
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @else
                    <div class="alert alert-success">The product has been successfully added to the cart</div>
                @endif
            @endif

            <div class="row">
                @if (Session::has('products'))
                    @if (Session::get('products')->isEmpty())
                        <h2>{{ __('message.none results') }}</h2>
                    @endif

                    @foreach (Session::get('products') as $key => $value)
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <a href="{{ route('elevator.index', $value->id) }}">
                                    <img src="/uploads/images/{{ $value->mainPhoto }}" title="{{ $value->name }}"
                                        class="card-img-top" alt="elevatoe image" />
                                </a>
                                <div class="card-body">
                                    <a href="{{ route('elevator.index', $value->id) }}">
                                        <h5 class="card-title">{{ $value->name }}</h5>
                                    </a>
                                    <p class="card-text">
                                        @if (app()->getLocale() == 'ar')
                                            جنية {{ $value->price }}
                                        @else
                                            $ {{ $value->price }}
                                        @endif
                                    </p>
                                    <a href="{{ route('elevator.index', $value->id) }}"
                                        class="btn btn-primary">{{ __('message.details') }}</a>
                                    <a href="{{ route('cart.store', ['prod_id' => $value->id]) }}"
                                        class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($products as $key => $value)
                        <div class="col-md-3 col-sm-12">
                            <form action="{{ route('cart.store', ['prod_id' => $value->id]) }}" method="post">
                                @csrf
                                <div class="card">
                                    <a href="{{ route('elevator.index', $value->id) }}">
                                        <img src="/uploads/images/{{ $value->mainPhoto }}" title="{{ $value->name }}"
                                            class="card-img-top" alt="elevatoe image" />
                                    </a>
                                    <div class="card-body">
                                        <a href="{{ route('elevator.index', $value->id) }}">
                                            <h5 class="card-title">{{ $value->name }}</h5>
                                        </a>
                                        <p class="card-text">
                                            @if (app()->getLocale() == 'ar')
                                                جنية {{ $value->price }}
                                            @else
                                                $ {{ $value->price }}
                                            @endif
                                        </p>
                                        <a href="{{ route('elevator.index', $value->id) }}"
                                            class="btn btn-primary">{{ __('message.details') }}</a>

                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
