@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'user_roles'])

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex  align-items-center">
                <i class="fa-solid fa-user fa-xl"></i>
                <h5 class="ps-2 pt-2">User roles (Total: {{ $user_role_count }})</h5>
              </div>
              <div>
                <a class="btn btn-secondary " href="{{ route('user_role.create') }}">
                  <i class="fa-solid fa-circle-plus"></i>
                  <span class="ms-1 btn-text">Add User role</span>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Description</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($user_roles as $user_role)
                    <tr>
                      <td>
                        <div class="ms-2 d-flex flex-row justify-content-start align-items-center">
                          <i class="fa-solid fa-address-card fa-xl"></i>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm font-weight-bold">{{ $user_role->name }}</h6>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="text-secondary d-flex flex-column" style="white-space: break-spaces;">
                            <span>{{ $user_role->description }}</span>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex text-secondary flex-row justify-content-center" style="gap: 1rem;">

                            <a class="btn btn-secondary " href="/user_roles/{{ $user_role->id }}">
                              <i class="fa-brands fa-readme"></i>
                              <span class="ms-1 btn-text">View</span>
                            </a>

                            <a class="btn btn-secondary "
                              href="{{ route('user_role.edit', ['user_role_id' => $user_role->id]) }}">
                              <i class="fa-solid fa-pen-to-square"></i>
                              <span class="ms-1 btn-text">Edit</span>
                            </a>

                            <form action="/user_roles/{{ $user_role->id }}" method="post" style="max-height: 2rem;">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger ">
                                <i class="fa-solid fa-trash"></i>
                                <span class="ms-1 btn-text">Delete</span>
                              </button>
                            </form>
                          </div>

                        </div>
                      </td>

                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('layouts.footers.auth.footer')
  </div>
@endsection
