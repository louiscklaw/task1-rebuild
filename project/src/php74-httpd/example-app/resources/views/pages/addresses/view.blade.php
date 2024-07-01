@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'view address'])
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          {{-- card header --}}
          <div class="card-header pb-0">
            <div class="d-flex align-items-center justify-content-between">
              <div class="col-md-6">
                <h5 class="">View Address</h5>
              </div>

              <div class="col-md-6 mt-2">
                <div class="d-flex justify-content-end">
                  <div class="ms-3">
                    <a class="" href="{{ route('addresses.index') }}">
                      <button class="btn btn-secondary ms-auto">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="ms-1">Back</span>
                      </button>
                    </a>
                  </div>

                  <div class="ms-3">
                    <a href="{{ route('address.edit', ['address_id' => $address->id]) }}">
                      <button class="btn btn-primary ms-auto">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="ms-1">Edit<span>
                      </button>
                    </a>
                  </div>

                  <div class="ms-3">
                    <form action="/addresses/{{ $address->id }}" method="post" style="max-height: 2rem;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger ">
                        <i class="fa-solid fa-trash"></i>
                        <span class="ms-1">Delete</span>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- card header --}}

          <div class="card-body">
            <p class="text-uppercase text-sm">address Information</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    name
                  </label>
                  <input class="form-control" type="text" value="{{ $address->name }}" disabled />
                </div>
              </div>

            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Details</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Description:</label>
                  <textarea class="form-control" rows="10" disabled>{{ $address->description }}</textarea>
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
