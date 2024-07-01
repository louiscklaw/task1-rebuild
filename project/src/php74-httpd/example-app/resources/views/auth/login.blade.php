@extends('layouts.app')

@section('content')
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card " style="border: none; box-shadow: none;">
                <div class="card-header text-start" style="background-color: unset; border: none;">
                  <h4 class="font-weight-bolder">
                    Sign In
                  </h4>
                  <p class="mb-0">
                    Enter your email and password to sign in
                  </p>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="{{ route('login.perform') }}">

                    @csrf
                    @method('post')
                    <div class="flex flex-col mb-3">
                      <input type="email" name="email" class="form-control form-control-lg"
                        value="{{ old('email') ?? 'admin@ims.com' }}" aria-label="Email">
                      @error('email')
                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="flex flex-col mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" aria-label="Password"
                        value="secret">
                      @error('password')
                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="remember" type="checkbox" id="rememberMe" />
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1" style="border: none;">
                  <p class="mb-1 text-sm mx-auto">
                    <span>
                      Forgot you password? Reset your password
                    </span>
                    <a href="{{ route('reset-password') }}" class="text-primary font-weight-bold">
                      here
                    </a>
                  </p>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1" style="border: none;">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-primary font-weight-bold">
                      Sign up
                    </a>
                  </p>
                </div>
              </div>
            </div>
            <div
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('https://images.unsplash.com/photo-1616401776146-ae3453da7105?q=80&w=1974');
              background-size: cover;">
                <span class="mask bg-gradient-primary opacity-8"></span>
                <h3 class="mt-5 text-white font-weight-bolder position-relative">
                  "ACME company inventory management system"
                </h3>
                <p class="text-white position-relative">
                  please login.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
