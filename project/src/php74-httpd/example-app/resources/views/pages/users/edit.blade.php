@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])

  <div id="alert">
    @include('components.alert')
  </div>

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-8">
        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="email" value={{ $user->email }} />

          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <div class="col-md-6">
                  <div class="d-flex flex-row align-items-center">
                    <i class="fa-solid fa-user fa-xl"></i>
                    <span class="ms-3 font-weight-bold">
                      Edit User (id:{{ $user->id }})
                    </span>
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="d-flex justify-content-end">
                    <div class="ms-3">
                      <a href="{{ route('users.edit', ['user_id' => $user->id]) }}">
                        <button class="btn btn-success  ms-auto">
                          <i class="fas fa-save"></i>
                          <span class="ms-1">Save</span>
                        </button>
                      </a>
                    </div>

                    <div class="ms-3">
                      <a href="{{ route('users.index') }}">
                        <button type="button" class="btn btn-secondary  ms-auto">
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
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username:</label>
                    <input class="form-control" type="text" name="username" value="{{ $user->username }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address:</label>
                    <input class="form-control" type="email" name="email" value="{{ $user->email }}" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">First name:</label>
                    <input class="form-control" type="text" name="firstname" value="{{ $user->firstname }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Last name:</label>
                    <input class="form-control" type="text" name="lastname" value="{{ $user->lastname }}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Role:</label>
                    <select name="roles" class="form-select" aria-label="Default select example">
                      @foreach ($user_roles as $user_role)
                        <option value="{{ $user_role->id }}" {{ $user_role->id == $user->roles ? 'selected' : '' }}>
                          {{ $user_role->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Department:</label>
                    <select name="usergroup_id" class="form-select" aria-label="Default select example">
                      @if (count($user->usergroups) == 0)
                        @foreach ($user_groups as $user_group)
                          <option value="{{ $user_group->id }}" {{ $user_group->id == 5 ? 'selected' : '' }}>
                            {{ $user_group->name }}</option>
                        @endforeach
                      @else
                        @foreach ($user_groups as $user_group)
                          <option value="{{ $user_group->id }}"
                            {{ $user_group->id == $user->usergroups[0]->id ? 'selected' : '' }}>
                            {{ $user_group->name }}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Address:</label>
                    <textarea name="address" class="form-control" rows=5>{{ $user->address }}</textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">City:</label>
                    <input class="form-control" type="text" name="city" value="{{ $user->city }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Country:</label>
                    <input class="form-control" type="text" name="country" value="{{ $user->country }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Postal code:</label>
                    <input class="form-control" type="text" name="postal" value="{{ $user->postal }}">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">About me</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">About me:</label>
                    <textarea name="about" class="form-control" rows=10>{{ $user->about }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </form>
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
