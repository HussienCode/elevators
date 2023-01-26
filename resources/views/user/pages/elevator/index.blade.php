@extends('user.layout.master')

@section('content')
    <div class="evelator">
        <div class="container">
            <h1>{{ $category->name }}</h1>
            @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <form action="{{ route('cart.store', ['prod_id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- single img -->
                    <a href="{{ route('webPhotos.show', $product->id) }}">
                        <img src="\uploads\images\{{ $product->mainPhoto }}" title="{{ $product->imageTitle }}"
                            alt="evelatorImg">
                    </a>

                    <div class="col-12 mt-3">
                        <h2>{{ $product->name }}</h2>
                        <h4>{{ __('message.price') }} : @if (LaravelLocalization::setLocale() == 'ar')
                                {{ $product->price }} جنية
                            @else
                                {{ $product->price }} $
                            @endif
                        </h4>
                        <table class="table table-sm align-middle table-bordered table-hover border-dark">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('message.category') }}</th>
                                    <th scope="col">{{ __('message.model') }}</th>
                                    <th scope="col">{{ __('message.design') }}</th>
                                    <th scope="col">{{ __('message.company') }}</th>
                                    <th scope="col">{{ __('message.type') }}</th>
                                    <th scope="col">{{ __('message.size') }}</th>
                                    <th scope="col">{{ __('message.origin') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($category == null)
                                            {{ __('message.none') }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($model == null)
                                            {{ __('message.none') }}
                                        @else
                                            {{ $model->name }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($design == null)
                                            {{ __('message.none') }}
                                        @else
                                            {{ $design->name }}
                                        @endif
                                    </td>

                                    <th scope="row">
                                        @if ($company == null)
                                            {{ __('message.none') }}
                                        @else
                                            {{ $company->name }}
                                        @endif
                                    </th>

                                    <td>
                                        @if ($type == null)
                                            {{ __('message.none') }}
                                        @else
                                            {{ $type->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($size == null)
                                            {{ __('message.none') }}
                                        @else
                                            {{ $size->sizeNum }} {{ $size->unit }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($country == null)
                                            {{ __('message.none') }}
                                        @else
                                            {{ $country->name }}
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <p>
                            {{ $product->description }}
                        </p>

                        <!-- buttons -->
                        <div class="mt-3">
                            <a class="btn btn-primary" href="{{ LaravelLocalization::LocalizeURL('/contact') }}"
                                role="button">
                                {{ __('message.Request A Quote') }}
                            </a>
                            <a class="btn btn-primary" href="{{ route('webVideos.show', $product->id) }}" role="button">
                                {{ __('message.more videos') }}
                            </a>
                            <a class="btn btn-primary" href="{{ route('webPhotos.show', $product->id) }}" role="button">
                                {{ __('message.more gallary') }}
                            </a>
                            <a class="btn btn-primary" href="{{ route('webFiles.show', $product->id) }}" role="button">
                                {{ __('message.Detail files') }}
                            </a>
                            <button type="submit" class="btn btn-success" role="button">
                                <i class="fas fa-shopping-cart"></i> {{ __('message.Add to cart') }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
