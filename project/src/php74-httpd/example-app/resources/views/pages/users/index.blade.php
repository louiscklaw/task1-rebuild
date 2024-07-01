@extends('layouts.app')

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])

  <div class="row mt-4 mx-4">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex  align-items-center">
              <i class="fa fa-user fa-lg"></i>
              <h5 class="ps-2 pt-2">Users list</h5>
            </div>
            <div>
              <a class="btn btn-secondary" href="{{ route('user.create') }}">
                <i class="fa-solid fa-circle-plus"></i>
                <span class="ms-1 btn-text">Add User</span>
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
                    Name
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Role
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Department
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Create Date
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>
                      <a class="text-secondary text-dark text-decoration-none"
                        href="{{ route('user.view', ['user_id' => $user->id]) }}" style="margin-bottom: 0;">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-row justify-content-center align-items-center">
                            <i class="fa fa-user fa-lg fa-xl"></i>
                            <div class="d-flex flex-column justify-content-center ms-3">
                              <h6 class="mb-0 text-sm font-weight-bold">{{ $user->firstname }}, {{ $user->lastname }}</h6>
                              <div class="mb-0 text-secondary text-sm">{{ $user->email }}</div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </td>

                    <td>
                      <a class="text-secondary text-dark text-decoration-none"
                        href="{{ route('user.view', ['user_id' => $user->id]) }}" style="margin-bottom: 0;">
                        <p class="text-sm font-weight-bold mb-0">
                          @foreach ($user_roles as $user_role)
                            @if ($user_role->id == $user->roles)
                              {{ $user_role->name }}
                            @endif
                          @endforeach
                        </p>
                      </a>
                    </td>

                    <td>
                      <a class="text-secondary text-dark text-decoration-none"
                        href="{{ route('user.view', ['user_id' => $user->id]) }}" style="margin-bottom: 0;">
                        <p class="text-sm font-weight-bold mb-0">
                          @if (count($user->usergroups) == 0)
                            {{ '--' }}
                          @else
                            @foreach ($user_groups as $user_group)
                              @if ($user_group->id == $user->usergroups[0]->id)
                                {{ $user_group->name }}
                              @endif
                            @endforeach
                          @endif
                        </p>
                      </a>
                    </td>

                    <td class="align-middle text-center text-sm">
                      @if ($user->status == 1)
                        <span class="badge bg-gradient-success">enabled</span>
                      @else
                        <span class="badge bg-gradient-danger">disabled</span>
                      @endif
                    </td>

                    <td class="align-middle text-center text-sm">
                      <p class="text-sm font-weight-bold mb-0">
                        {{ $user->created_at == '' ? '--' : explode(' ', $user->created_at)[0] }}</p>
                    </td>

                    <td class="align-middle text-center">

                      <div class="d-flex px-3 py-1 justify-content-center align-items-center">

                        <a class="mx-1 btn btn-secondary " href="{{ route('user.view', ['user_id' => $user->id]) }}"
                          style="margin-bottom: 0;">
                          <i class="fa-brands fa-readme"></i>
                          <span class="ms-1 btn-text">View</span>
                        </a>


                        <a class="mx-1 btn btn-secondary {{ $user->id == 1 ? 'disabled' : '' }}"
                          href="{{ route('users.edit', ['user_id' => $user->id]) }}" style="margin-bottom: 0;">
                          <i class="fa-solid fa-pen-to-square"></i>
                          <span class="ms-1 btn-text">Edit</span>
                        </a>

                        @if ($user->id == 1)
                          <button class="mx-1 btn btn-danger " disabled style="margin-bottom: 0;">
                            <i class="fa-solid fa-trash"></i>
                            <span class="btn-text">Delete</span>
                          </button>
                        @else
                          <form action="{{ route('user.delete', ['user_id' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="mx-1 btn btn-danger " style="margin-bottom: 0;">
                              <i class="fa-solid fa-trash"></i>
                              <span class="ms-1 btn-text">Delete</span>
                            </button>
                          </form>
                        @endif
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
@endsection
