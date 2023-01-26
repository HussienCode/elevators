@extends('user.layout.master')
@section('content')
    <div class="prices">
        <div class="container">
            <h1>{{__('message.send request for prices')}}</h1>

            @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            <form class="row g-3 needs-validation" method="POST" action="{{route('userPrices.store')}}" novalidate>
                @csrf
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="{{__("message.What's your name ?")}}" required />
                    <div class="invalid-feedback">{{__('message.Please enter your name here')}}.</div>
                </div>

                <div class="col-md-6">
                    <input type="text" name="address" class="form-control" id="validationCustom02" placeholder="{{__('message.your address')}}" required />
                    <div class="invalid-feedback">{{__('message.Please enter your address here')}}</div>
                </div>

                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" id="validationCustom03" placeholder="{{__('message.Phone number')}}"
                        name="clientPhoneNumber" maxlength="11" required onkeypress="validate(event)" />
                    <div class="invalid-feedback">
                        {{__('message.Please enter a valid phone number')}}.
                    </div>
                </div>

                <div class="col-md-6">
                    <input type="number" name="floorNum" class="form-control" id="validationCustom02" placeholder="{{__('message.number of floors')}}"
                        required />
                    <div class="invalid-feedback">{{__('message.Please input number of floors')}}</div>
                </div>

                <div class="col-md-6">
                    <input type="number" name="peopleNum" class="form-control" id="validationCustom02" placeholder="{{__('message.number of people')}}"
                        required />
                    <div class="invalid-feedback">{{__('message.Please input number of people')}}</div>
                </div>

                <div class="col-md-6">
                    <input type="number" name="doorsNum" class="form-control" id="validationCustom02" placeholder="{{__('message.number of doors')}}"
                        required />
                    <div class="invalid-feedback">{{__('message.Please input number of doors')}}.</div>
                </div>

                <div class="col-md-6">
                    <select class="form-select" name="doorType_id" id="validationCustom04" required>
                        <option selected disabled>{{__('message.type of the door')}}</option>
                        @foreach ($doorTypes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{__('message.Please select a type of the door')}}
                    </div>
                </div>

                <div class="col-md-6">
                    <select class="form-select" name="elevatorType_id" id="validationCustom04" required>
                        <option selected disabled value="">{{__('message.type of the elevator')}}</option>
                        @foreach ($elevatorTypes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{__('message.Please select a type of the elevator')}}.
                    </div>
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="notes" placeholder="{{__('message.Leave notes here')}}" id="validationCustom04" name="clientMessage"
                        rows="10"></textarea>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('message.Send')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
