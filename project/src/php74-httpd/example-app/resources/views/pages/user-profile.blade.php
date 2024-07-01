@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Edit Profile'])

  <div id="alert">
    @include('components.alert')
  </div>

  <div class="container-fluid">
    <form action="{{ route('profile.self_update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="username" value={{ auth()->user()->username }}>

      <div class="row">

        <div class="col-md-8">
          <div class="card">

            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <div class="col-md-6">
                  <p class="">Edit {{ 'Profile' }} (id:{{ auth()->user()->id }}, {{ $role_name }},
                    {{ $user_status }})</p>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="d-flex justify-content-end">
                    <div class="ms-3">
                      <a href="{{ route('profile.update', ['user_id' => auth()->user()->id]) }}">
                        <button class="btn btn-success ms-auto">
                          <i class="fa-solid fa-floppy-disk "></i>
                          <span class="ms-1">Save</span>
                        </button>
                      </a>
                    </div>

                    <div class="ms-3">
                      <a href="{{ route('users.index') }}">
                        <button type="button" class="btn btn-secondary ms-auto">
                          <i class="fa-solid fa-xmark"></i>
                          <span class="ms-1">Cancel</span>
                        </button>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">
                User Information
              </p>

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username:</label>
                    <input class="form-control" type="text" name="username" value="{{ auth()->user()->username }}"
                      disabled />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address:</label>
                    <input name="email" class="form-control" type="email" value="{{ auth()->user()->email }}" />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">First name:</label>
                    <input class="form-control" type="text" name="firstname" value="{{ auth()->user()->firstname }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Last name:</label>
                    <input class="form-control" type="text" name="lastname" value="{{ auth()->user()->lastname }}">
                  </div>
                </div>
              </div>

              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Address:</label>
                    <textarea name="address" class="form-control" rows=3>{{ auth()->user()->address }}</textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">City:</label>
                    <input class="form-control" type="text" name="city" value="{{ auth()->user()->city }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Country:</label>
                    <input class="form-control" type="text" name="country" value="{{ auth()->user()->country }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Postal code:</label>
                    <input class="form-control" type="text" name="postal" value="{{ auth()->user()->postal }}">
                  </div>
                </div>
              </div>

              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">About me</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">About me:</label>
                    <textarea name="about" class="form-control" rows=5>{{ auth()->user()->about }}</textarea>
                  </div>
                </div>
              </div>

              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Role</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">About me:</label>
                    <textarea name="about" class="form-control" rows=10>{{ auth()->user()->about }}</textarea>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile p-3">
            <div class="card-body pt-0">
              <div class="row">
                <div class="text-center mt-4">
                  <h5>
                    <span class="font-weight-bold">{{ auth()->user()->firstname }}</span>
                    <span class="font-weight-light">, {{ auth()->user()->lastname }}</span>
                  </h5>

                  <div class="h6 font-weight-300">
                    <i class="ni location_pin mr-2"></i> {{ auth()->user()->country }}
                  </div>


                </div>

                <div class="row">
                  <div class="text-center mt-4">
                    <div class="h6 font-weight-300">
                      <i class="ni location_pin mr-2"></i>
                      <h3>Owns:</h3>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="d-flex justify-content-center">
                      <div class="d-grid text-center">
                        <span class="text-lg font-weight-bolder">
                          {{ count($user->items) }}
                        </span>
                        <span class="text-sm opacity-8">Items</span>
                      </div>
                      <div class="d-grid text-center mx-4">
                        <span class="text-lg font-weight-bolder">
                          {{ count($user->projects) }}
                        </span>
                        <span class="text-sm opacity-8">Projects</span>
                      </div>
                      <div class="d-grid text-center">
                        <span class="text-lg font-weight-bolder">
                          {{ count($user->orders) }}
                        </span>
                        <span class="text-sm opacity-8">Orders</span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </form>

    @include('layouts.footers.auth.footer')
  </div>
@endsection
