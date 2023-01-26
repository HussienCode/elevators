@extends('user.layout.master')
@section('content')

<div class="contactForm">
    <div class="container">
      <h1>{{__('message.CONTACT US')}}</h1>
      <form action="contact" class="row g-3 needs-validation" method="POST" novalidate>
        @csrf
        <div class="col-md-12">
            @if (Session::has('success'))
              <h6 class="alert alert-success">{{Session::get('success')}}</h6>
            @endif
        </div>
        <div class="col-md-12">
          <input
            type="text"
            class="form-control"
            id="validationCustom01"
            placeholder="{{__("message.What's your name ?")}}"
            name="name"
            required
          />
          @error('name')
              <div class="invalid-feedback">{{__('message.Please enter your name here')}}.</div>
          @enderror
        </div>

        <div class="col-md-12">
          <input
            type="email"
            class="form-control"
            id="validationCustom02"
            placeholder="{{__('message.E-mail')}}"
            name="email"
            required
          />
          @error('email')
            <div class="invalid-feedback">{{__('message.Please enter a valid email')}}.</div>
          @enderror
        </div>

        <div class="col-md-12">
          <input
            type="tel"
            class="form-control"
            id="validationCustom03"
            placeholder="{{__('message.Phone number')}}"
            name="phone"
            maxlength="11"
            required
            onkeypress="validate(event)"
          />
          @error('phone')
            <div class="invalid-feedback">{{__('message.Please enter a valid phone number')}}.</div>
          @enderror
        </div>

        <div class="col-md-12">
          <textarea
            class="form-control"
            placeholder="{{__('message.Leave a message here')}}"
            id="validationCustom04"
            name="clientMessage"
            rows="10"
            required
          ></textarea>
          @error('clientMessage')
            <div class="invalid-feedback">{{__('message.Please leave a message here')}}.</div>
          @enderror
        </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit">{{__('message.Send')}}</button>
        </div>
      </form>
    </div>
  </div>
@endsection
