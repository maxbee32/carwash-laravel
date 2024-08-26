<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>ECW-Admin Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{asset('assets/img/water.webp')}}" rel="icon">
  <link href="{{asset('assets/img/water.webp')}}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="{{asset('assets/admin/css/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <form class="user" method="POST" action="{{ route('login.post') }}">

                                        @csrf

                                             @if($errors->any() )
                                             <div class="alert alert-danger">
                                             <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error}}</li>

                                                @endforeach
                                             </ul>
                                             </div>
                                             @endif


                                             @if (session('error'))
                                            <div class="alert alert-danger" >
                                             {{ session('error') }}
                                             </div>
                                            @endif

                                            @if (session('success'))
                                            <div class="alert alert-success" >
                                             {{ session('success') }}
                                             </div>
                                            @endif


                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..."  required autofocus>
                                          {{-- @error('email')<small class="text-danger">{{$message}}</small>@enderror --}}
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password"  required autofocus>
                                         {{-- @error('password')<small class="text-danger">{{$message}}</small>@enderror --}}
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary btn-user btn-block" btn-primary”>Login</button>
                                        {{-- <button class="btn btn-primary btn-user btn-block" type="submit">{{ __('Login') }}</button> --}}
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('fpassword') }}">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>


</body>

</html>
