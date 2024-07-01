@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'view order'])
  <div class="container-fluid py-4">
    <div class="row">
      <form action="{{ route('order.update', $order->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
          <div class="card">
            {{-- card header --}}
            <div class="card-header pb-0">
              <div class="d-flex align-items-center justify-content-between">
                <div class="col-md-6">
                  <h5 class="">Edit Order</h5>
                </div>

                <div class="col-md-6 mt-2">
                  <div class="d-flex justify-content-end">
                    <div class="ms-3">
                      <a href="{{ route('orders.index') }}">
                        <button class="btn btn-success  ms-auto">
                          <i class="fas fa-save"></i>
                          <span class="ms-1">Save</span>
                        </button>
                      </a>
                    </div>
                    <div class="ms-3">
                      <a href="{{ route('orders.index') }}">
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
            {{-- card header --}}

            <div class="card-body">
              <p class="text-uppercase text-sm">Order Information</p>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Name:
                    </label>
                    <input name="name" class="form-control" type="text" value="{{ $order->name }}" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Status:
                    </label>
                    <select name="status" class="form-select" aria-label="Default select example">
                      <option value="{{ 'pending' }}" {{ $order->status == 'pending' ? 'selected' : '' }}>
                        {{ 'pending' }}</option>
                      <option value="{{ 'paid' }}" {{ $order->status == 'paid' ? 'selected' : '' }}>
                        {{ 'paid' }}</option>
                      <option value="{{ 'cancelled' }}" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                        {{ 'cancelled' }}</option>
                    </select>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Amount:
                    </label>
                    <input name="amount" class="form-control" type="number" value="{{ $order->amount }}" />
                  </div>
                </div>

              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Details</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description:</label>
                    <textarea name="description" class="form-control" rows="10">{{ $order->description }}</textarea>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div>

        </div>
      </form>

    </div>
    @include('layouts.footers.auth.footer')
  </div>
@endsection
