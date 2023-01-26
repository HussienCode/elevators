@extends('user.layout.master')
@section('content')
    <!-- todo start carttable -->
    <div class="carttable">
        <div class="container">
            <h1>{{__('message.your cart')}}</h1>
            @if (Session::has('success'))
                @if (LaravelLocalization::getLocal() == 'ar')
                    <div class="alert alert-success">تم الحذف بنجاح</div>
                @else
                    <div class="alert alert-success">compleated Delete</div>
                @endif
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-sm table-hover align-middle table-bordered border-dark" id="cartTable">
                        <thead>
                            <tr>
                                <th scope="col">{{__('message.PRODUCTS')}}</th>
                                <th scope="col" class="text-center">{{__('message.price')}}</th>
                                <th scope="col" class="text-center">{{__('message.quantity')}}</th>
                                <th scope="col" class="text-center">{{__('message.total')}}</th>
                                <th scope="col" class="text-center">{{__('message.save')}}</th>
                                <th scope="col" class="text-center">{{__('message.delete')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($myOrder as $key=>$item)
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td>
                                            <img src="/uploads/images/{{ $item->mainPhoto }}" alt="productImg" />
                                            {{ app()->getLocale() == 'ar' ? $item->name_ar : $item->name_en }}
                                        </td>
                                        <td class="text-center">{{app()->getLocale() == 'ar' ? $item->localPrice : $item->forignPrice }}</td>
                                        <td class="text-center">
                                            <span class="down" onClick="decreaseCount(event, this)">
                                                -
                                            </span>
                                            {{-- <form action="{{route('cart.update', $item->id)}}" method="POST"> --}}
                                            <input type="number" name="mount" class="text-center"
                                                value="{{ $item->mount }}" min="1" />
                                            {{-- </form> --}}
                                            <span class="up" onClick="increaseCount(event, this)">
                                                +
                                            </span>
                                        </td>
                                        <td class="text-center">{{ app()->getLocale() == 'ar' ? $arr[] = ($item->localPrice * $item->mount) : $arr[] = ($item->forignPrice * $item->mount) }}</td>

                                        <td class="text-center">
                                            <button type="submit" class="fas fa-save fa-2x text-dark"
                                                style="border:none;background-color:transparent">
                                            </button>
                                        </td>
                                </form>
                                <td class="text-center">
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="fas fa-trash fa-danger"
                                            style="border:none;background-color:transparent">
                                        </button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <button type="button" class="btn btn-secondary">{{app()->getLocale() == 'ar' ? 'عدد الاصناف' : 'Item Total'}} : {{ $ItemsTotal }}</button>
            <br>
            <button type="button" class="btn btn-secondary">{{app()->getLocale() == 'ar' ? 'اجمالي الطلبية' : 'Item Total'}} : {{ array_sum($arr)}}</button>
            <button type="button" class="btn btn-success">
                <a href="{{ LaravelLocalization::localizeURL('/webProducts/0') }}">{{__('message.continue shopping')}}</a>
            </button>
        </div>
    </div>
    <!-- todo end carttable -->
@endsection
