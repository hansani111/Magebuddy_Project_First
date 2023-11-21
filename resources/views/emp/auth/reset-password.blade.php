<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Recover Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/asset/dist/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->

    <link rel="stylesheet" href="/asset/dist/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/asset/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
            <h6>Employee Forgot password</h6>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.
                </p>

                @error('email')
                    {{ $message }}
                @enderror

                @if (session('status'))
                    {{ session('status') }}
                @endif

                <form action="{{ route('emp.password.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    {{-- <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span> --}}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email"
                            value="{{ old('email', $request->email) }}" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="my-2">
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                    <span class="text-danger">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="my-2">
                        <input type="text" class="form-control" name="password_confirmation"
                            placeholder="Confirm Password">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('emp.login') }}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/asset/dist/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/asset/dist/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/asset/dist/js/adminlte.min.js"></script>
</body>

</html>
