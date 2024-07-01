@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'view item'])
  <div class="container-fluid py-4">
    <div class="row">
      <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-md-12">
          <div class="card">
            {{-- card header --}}
            <div class="card-header pb-0">
              <div class="d-flex align-items-center justify-content-between">
                <div class="col-md-6">
                  <h5 class="">Create item</h5>
                </div>

                <div class="col-md-6 mt-2">
                  <div class="d-flex justify-content-end">
                    <div class="ms-3">
                      <a href="{{ route('items.index') }}">
                        <button class="btn btn-success  ms-auto">
                          <i class="fas fa-save"></i>
                          <span class="ms-1">Add</span>
                        </button>
                      </a>
                    </div>
                    <div class="ms-3">
                      <a href="{{ route('items.index') }}">
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
              <p class="text-uppercase text-sm">item Information</p>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Name:
                    </label>
                    <input name="name" class="form-control" type="text" value="{{ old('name', '') }}"
                      placeholder="Name" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Categories:
                    </label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Brands:
                    </label>

                    <select name="brand_id" class="form-select" aria-label="Default select example">
                      @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Locations:
                    </label>

                    <select name="location_id" class="form-select" aria-label="Default select example">
                      @foreach ($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Owner:
                    </label>

                    <select name="owner_id" class="form-select" aria-label="Default select example"
                                        
                    @if (auth()->id() == 1)
                      @else disabled
                      @endif

                    >
                      @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                          @if (auth()->id() == $user->id)
                            selected
                          @endif
                        >
                        {{ $user->email }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">
                      Amount:
                    </label>
                    <input name="amount" class="form-control" type="number" />
                  </div>
                </div>

              </div>

              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Details</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description:</label>
                    <textarea name="description" class="form-control" rows="10" placeholder="Description">{{ old('description', '') }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
    @include('layouts.footers.auth.footer')
  </div>
@endsection
