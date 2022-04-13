@extends('layouts.app', ['titlePage' => 'Login'])

@section('content')
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('../img/about-img.jpeg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Log in</h4>
                  <h6 class="text-white font-weight-bolder text-center mt-2 mb-0">Welcome to 'Cafe Bisa Ngopi'</h6>
                </div>
              </div>
              @if($errors->any())
                {{ session()->flash('warning', 'Tolong Cek Ulang Data Yang Kamu Masukkan!') }}
                <script>
                  $("#username").focus()
                </script>
              @endif
              <div class="card-body">
                <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="my-3">
                    <div class="input-group input-group-outline {{ $errors->has('username') ? ' has-danger' : '' }}">
                      <label class="form-label">Username</label>
                      <input type="username" name="username" value="{{ old('username') }}" id="username" class="form-control">
                    </div>
                    @if ($errors->has('username'))
                      <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                        <small>{{ $errors->first('username') }}</small>
                      </div>
                    @endif
                  </div>

                  <div class="my-3">
                    <div class="input-group input-group-outline {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                    </div>
                    @if ($errors->has('password'))
                      <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                        <small>{{ $errors->first('password') }}</small>
                      </div>
                    @endif
                  </div>

                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@push('js')
    <script>
      $(function() {
        $("#username").focus()
      });
    </script>
@endpush


{{-- @extends('layouts.app',['titlePage' => 'title', 'activePage' => 'admin-user'])

@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
                    </form> --}}
                {{-- </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
