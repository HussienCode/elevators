@extends('user.layout.master')
@section('content')
    <div class="gallery min-vh-100">
        <div class="container">
            <h1>{{__('message.the gallery')}}</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                <div class="col">
                    <img src="/uploads/images/{{$mainPhoto->mainPhoto}}" class="gallery-item" alt="img" />
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{$mainPhoto->imageTitle}}
                    </h5>
                    <p>
                        {{$mainPhoto->imageDescription}}
                    </p>
                </div>

                @foreach ($photos as $item)
                    <div class="col">
                        <img src="/uploads/images/{{$item->name}}" class="gallery-item" alt="img" />
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{$item->title}}
                        </h5>
                        <p>
                            {{$item->description}}
                        </p>
                    </div>
                @endforeach

            </div>

            <!-- Modal -->
            <div
            class="modal fade"
            id="gallery-modal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-body">
                  <img src="img/img2.jpg" class="mdoal-img" alt="Elevator-img" />
                </div>
              </div>
            </div>

        </div>
    </div>
@endsection
