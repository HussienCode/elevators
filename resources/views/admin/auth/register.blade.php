    <!DOCTYPE html>
    <html dir="rtl">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{asset('admin/dist/css/custom.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}"> --}}
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>لوحة الأدمن</b>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">

                    <form action="{{route('login')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="الايميل">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">يرجى ادخال الايميل بشكل صحيح</div>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="كلمة السر">
                        </div>
                        @error('password')
                            <div class="alert alert-danger" >يرجى ادخال كلمة السر بشكل صحيح</div>
                        @enderror
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">الدخول</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>

    </html>
