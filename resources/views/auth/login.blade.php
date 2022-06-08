<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                @if (session('status'))
                    <div class="text-red">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- <form id="loginForm" name="loginForm"> --}}
                <form action="{{ route('login') }}" method="post" id="loginForm">

                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') border-danger @enderror" placeholder="Email"
                            value="{{ old('email') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    @error('email')
                        <div class="text-red">
                            {{ $message }}
                        </div>
                    @enderror


                    <div class="input-group my-3">
                        <input type="password" name="password" id="password"
                            class="form-control  @error('password') border-danger @enderror" placeholder="Password"
                            value="{{ old('password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-red">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->


    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


    {{-- LOGIN THROUUGH AJAX --}}
    {{-- <script>
        const apiURL = "http://127.0.0.1:8000/api/";
        const webURL = "http://127.0.0.1:8000/";

        const notification = (type, title, message) => {
            return toastr[type](message, title);
        };

        toastr.options = {
            positionClass: "toast-top-center",
        };

        $(function() {

            $("#loginForm")
                .on("submit", function(e) {
                    e.preventDefault(); // prevent page refresh
                })
                .validate({
                    rules: {
                        // simple rule, converted to {required:true}
                        email: {
                            email: true,
                            required: true,
                        },
                        // compound rule
                        password: {
                            required: true,
                        },
                    },
                    messages: {
                        email: {
                            required: "please provide email",
                            email: "please enter valid email",
                        },

                        password: {
                            required: "please provide password",
                        },
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        error.addClass("invalid-feedback");
                        element.closest(".input-group").append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass("is-invalid");
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass("is-invalid");
                        $(element).addClass("is-valid");
                    },
                    submitHandler: function() {
                        $.ajax({
                            url: apiURL + "login",
                            // contentType: "application/x-www-form-urlencoded",
                            type: "POST", // post, put, delete, get
                            data: {
                                _token: "{{ csrf_token() }}",
                                email: $("#email").val(),
                                password: $("#password").val(),
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.token) {
                                    localStorage.setItem("TOKEN", data.token);
                                    localStorage.setItem("ID", data.user.id);
                                    localStorage.setItem("FULLNAME", data.user.name);
                                    window.location.replace(webURL + "dashboard");
                                }
                            },
                            error: function({
                                responseJSON
                            }) {
                                notification("error", "Error!", responseJSON.message);
                            },
                        });
                    },
                });
        });
    </script> --}}
</body>

</html>
