
    <!-- start footer -->
    <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-12 border-end border-dark border-2">
              <h1>Elevator EG</h1>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="{{url('/')}}">home</a></li>
                <li class="list-inline-item">
                  <a href="{{url('/about')}}">about us</a>
                </li>
                <li class="list-inline-item">
                  <a href="{{url('/contact')}}">contact us</a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-sm-12 border-end border-dark border-2">
              <h1>contact info</h1>
              <ul>
                <li>{{DB::table('setting')->get('address')->first()->address}}</li>
                @foreach (DB::table('tel')->get(['phone']) as $item)
                    <li>{{$item->phone}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-md-3 col-sm-12">
              <h1>follow us</h1>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a href="{{DB::table('setting')->get(['facebook'])->first()->facebook}}"><i class="fab fa-facebook-square"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="{{DB::table('setting')->get(['twitter'])->first()->twitter}}"><i class="fab fa-twitter-square"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="{{DB::table('setting')->get(['instegram'])->first()->instegram}}"><i class="fab fa-instagram"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end footer -->

      <!-- start floating_Icons -->
      <div class="container floating_Icons">
        <a href="https://web.whatsapp.com/" target="_blank">
          <h3>
            <i class="fab fa-whatsapp"></i>
          </h3>
        </a>
        <a href="mailto:{{DB::table('setting')->get(['email'])->first()->email}}">
          <h3>
            <i class="far fa-envelope"></i>
          </h3>
        </a>
      </div>
      <!-- end floating_Icons -->

      <!-- JAVASCIRPT LIBRARY  -->
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/mainJs.js')}}"></script>

    </body>
  </html>
