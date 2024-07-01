@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'orders'])

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex  align-items-center">
                <i class="fa-solid fa-clipboard fa-2xl"></i>
                <h5 class="ps-2 pt-2">Orders list</h5>
              </div>
              <div>
                <a class="btn btn-secondary " href="{{ route('order.create') }}">
                  <i class="fa-solid fa-circle-plus"></i>
                  <span class="ms-1 btn-text">Create</span>
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

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Amount</th>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Status</th>

                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($orders as $order)
                    <tr>
                      <td>
                        <div class="ms-2 d-flex flex-row justify-content-start align-items-center">
                          <i class="fa-solid fa-clipboard fa-xl"></i>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm font-weight-bold">{{ $order->name }}</h6>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="text-secondary d-flex flex-column" style="white-space: break-spaces;">
                            <span>{{ $order->description }}</span>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="text-secondary d-flex flex-column" style="white-space: break-spaces;">
                            <span>{{ $order->amount }}</span>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="text-secondary d-flex flex-column" style="white-space: break-spaces;">
                            @if ($order->status == 'paid')
                              <span class="badge bg-gradient-info">Paid</span>
                            @elseif ($order->status == 'pending')
                              <span class="badge bg-gradient-danger">Pending</span>
                            @else
                              <span class="badge bg-gradient-warning">Cancelled</span>
                            @endif
                          </div>
                        </div>
                      </td>

                      <td class="align-middle text-center">
                        <div class="d-flex px-2 py-1 justify-content-center align-items-center">
                          <div class="d-flex text-secondary flex-row justify-content-center" style="gap: 1rem;">
                            <a class="mx-1 btn btn-secondary" href="/orders/{{ $order->id }}"
                              style="margin-bottom: 0;">
                              <i class="fa-brands fa-readme"></i>
                              <span class="btn-text">View</span>
                            </a>

                            <a class="mx-1 btn btn-secondary "
                              href="{{ route('order.edit', ['order_id' => $order->id]) }}" style="margin-bottom: 0;">
                              <i class="fa-solid fa-pen-to-square"></i>
                              <span class="btn-text">Edit</span>
                            </a>

                            <form action="/orders/{{ $order->id }}" method="post" style="max-height: 2rem;">
                              @csrf
                              @method('DELETE')
                              <button class="mx-1 btn btn-danger " style="margin-bottom: 0;"
                                {{ $order->id == 1 ? 'disabled' : '' }}>
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