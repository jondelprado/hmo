{{-- @extends('layouts.app') --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/adminlte.min.js')}}" charset="utf-8"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <style media="screen">
      body, .card-header, .card-footer{
        background: linear-gradient(89deg, #ffffff, #aeb5f3, #bfeaa7);
        background-size: 600% 600%;

        -webkit-animation: AnimationName 30s ease infinite;
        -moz-animation: AnimationName 30s ease infinite;
        animation: AnimationName 30s ease infinite;
      }


      @-webkit-keyframes AnimationName {
          0%{background-position:0% 50%}
          50%{background-position:100% 50%}
          100%{background-position:0% 50%}
      }
      @-moz-keyframes AnimationName {
          0%{background-position:0% 50%}
          50%{background-position:100% 50%}
          100%{background-position:0% 50%}
      }
      @keyframes AnimationName {
          0%{background-position:0% 50%}
          50%{background-position:100% 50%}
          100%{background-position:0% 50%}
      }
    </style>

</head>
<body>
  {{-- @section('content') --}}
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div style="margin-top: 10%;" class="card">
            <div style="text-align: center;" class="card-header"><h4>{{ __('Login Page') }}<h4></div>

            <div style="padding: 5%;" class="card-body">

              <div class="row">

                <div class="col-lg-4 text-center banner">
                  <img width="60%" height="60%"  src="{{asset('img/logo.png')}}" alt=""><br>
                  <h3>Health Maintenance Organization</h3>
                </div>

                <div class="col-lg-8">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                      <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                              {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                              </a>
                            @endif
                          </div>
                        </div>

                      </form>

                    </div>
              </div>

              </div>

              <div class="card-footer text-center">
                © 2018-2019 Health Maintenance Organization
              </div>

            </div>
          </div>
        </div>
      </div>
      {{-- @endsection --}}
</body>
</html>
