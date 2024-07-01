@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'View User'])

  <div id="alert">
    @include('components.alert')
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <div class="col-md-6">
                <div class="d-flex flex-row align-items-center">
                  <i class="fa-solid fa-user fa-xl"></i>
                  <span class="ms-3 font-weight-bold">
                    View User (id:{{ $user->id }})
                  </span>
                </div>
              </div>
              <div class="col-md-6 mt-2">
                <div class="d-flex justify-content-end">
                  <div class="ms-3">
                    <a class="" href="{{ route('users.index') }}">
                      <button class="btn btn-secondary ms-auto">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="ms-1">Back</span>
                      </button>
                    </a>
                  </div>

                  <div class="ms-3">
                    <a href="{{ route('users.edit', ['user_id' => $user->id]) }}">
                      <button class="btn btn-primary ms-auto">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="ms-1">Edit<span>
                      </button>
                    </a>
                  </div>

                  @if ($user->status == 1)
                    <div class="ms-3">
                      <form action="{{ route('user.disable', ['user_id' => $user->id]) }}" method="post">
                        @csrf
                        <button class="btn btn-warning ms-auto">
                          <i class="fa-solid fa-ban"></i>
                          <span class="ms-1">Disable</span>
                        </button>
                      </form>
                    </div>
                  @else
                    <div class="ms-3">
                      <form action="{{ route('user.enable', ['user_id' => $user->id]) }}" method="post">
                        @csrf
                        <button class="btn btn-success ms-auto">Enable</button>
                      </form>
                    </div>
                  @endif

                  <div class="ms-3">
                    <form action="/users/{{ $user->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger " {{ $user->id == 1 ? 'disabled' : '' }}>
                        <i class="fa-solid fa-trash"></i>
                        <span class="ms-1">Delete</span>
                      </button>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Username:</label>
                  <input class="form-control" type="text" name="username"
                    value="{{ $user->username ? $user->username : '--' }}" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email address:</label>
                  <input class="form-control" type="email" name="email"
                    value="{{ $user->email ? $user->email : '--' }}" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">First name:</label>
                  <input class="form-control" type="text" name="firstname"
                    value="{{ $user->firstname ? $user->firstname : '--' }}" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Last name:</label>
                  <input class="form-control" type="text" name="lastname"
                    value="{{ $user->lastname ? $user->lastname : '--' }}" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Role:</label>
                  <input class="form-control" type="text" name="role"
                    value="{{ $user->role ? $user->role : '--' }}" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Department:</label>
                  @if (count($user->usergroups) == 0)
                    <input class="form-control" type="text" name="usergroup" value="{{ '--' }}" disabled>
                  @else
                    <input class="form-control" type="text" name="usergroup" value="{{ $user->usergroups[0]->name }}"
                      disabled>
                  @endif
                </div>
              </div>





            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Contact Information</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Address:</label>
                  <input class="form-control" type="text" name="address"
                    value="{{ $user->address ? $user->address : '--' }}" disabled />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">City:</label>
                  <input class="form-control" type="text" name="city"
                    value="{{ $user->city ? $user->city : '--' }}" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Country:</label>
                  <input class="form-control" type="text" name="country"
                    value="{{ $user->country ? $user->country : '--' }}" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Postal code:</label>
                  <input class="form-control" type="text" name="postal"
                    value="{{ $user->postal ? $user->postal : '--' }}" disabled>
                </div>
              </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">About me</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">About me:</label>
                  <textarea class="form-control" rows=10 disabled>{{ $user->about ? $user->about : '--' }}</textarea>
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
                  <span class="font-weight-bold">{{ $user->firstname }}</span>
                  <span class="font-weight-light">, {{ $user->lastname }}</span>
                </h5>

                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i> {{ $user->country }}
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
                        {{ count($user->orders) }}</span>
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
    @include('layouts.footers.auth.footer')
  </div>
@endsection
