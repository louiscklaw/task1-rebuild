@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])

  <div id="alert">
    @include('components.alert')
  </div>

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <div class="col-md-6">
                  <div class="d-flex flex-row align-items-center">
                    <i class="fa-solid fa-user fa-xl"></i>
                    <span class="ms-3 font-weight-bold">
                      Add User
                    </span>
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="d-flex justify-content-end">
                    <div class="ms-3">
                      <button class="btn btn-success  ms-auto">
                        <i class="fas fa-save"></i>
                        <span class="ms-1">Save</span>
                      </button>
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
              <div class="row">
                <div class="col-md-8">
                  <p class="text-uppercase text-sm">User Information</p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Username:</label>
                        <input class="form-control" type="text" name="username" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email address:</label>
                        <input class="form-control" type="email" name="email" value="">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Password:</label>
                        <input class="form-control" type="password" name="password" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">First name:</label>
                        <input class="form-control" type="text" name="firstname" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Last name:</label>
                        <input class="form-control" type="text" name="lastname" value="">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Roles:</label>
                        <select name="roles" class="form-select" aria-label="Default select example">
                          @foreach ($user_roles as $user_role)
                            <option value="{{ $user_role->id }}">
                              {{ $user_role->name }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <p class="text-uppercase text-sm">Contact Information</p>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Address:</label>
                        <textarea name="address" class="form-control" rows=5></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">City:</label>
                        <input class="form-control" type="text" name="city" value="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Country:</label>
                        <input class="form-control" type="text" name="country" value="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Postal code:</label>
                        <input class="form-control" type="text" name="postal" value="">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-md-4">
                  <p class="text-uppercase text-sm">About user</p>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">About user:</label>
                        <textarea name="about" class="form-control" rows=10></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
    @include('layouts.footers.auth.footer')
  </div>
@endsection
