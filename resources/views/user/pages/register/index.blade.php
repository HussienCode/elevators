@extends('user.layout.master')
@section('content')
    <!-- start signup -->
    <div class="signup">
        <div class="container text-center">
            <h1>create your account</h1>
            <div class="row">
                <div class="col">
                    <form class="row g-3 needs-validation" action="{{route('register.store')}}" method="POST" novalidate>
                        <div class="col-12 mb-2">
                            <input type="text" name="name" class="form-control no-border" id="validationCustom01" placeholder="Full name"
                                required />
                            <div class="invalid-feedback">You don't have a name ?!</div>
                        </div>

                        <div class="col-12 mb-2">
                            <input type="text" name="email" class="form-control no-border" id="validationCustom02"
                                placeholder="Your email" required />
                            <div class="invalid-feedback">{{Your email}} !</div>
                        </div>

                        <div class="col-12">
                            <input type="password" name="password" class="form-control" id="validationCustom05"
                                placeholder="Create your password" required />
                            <div class="invalid-feedback">Create your password !</div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end signup -->
@endsection
