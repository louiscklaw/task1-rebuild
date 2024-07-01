@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'view item'])
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          {{-- card header --}}
          <div class="card-header pb-0">
            <div class="d-flex align-items-center justify-content-between">
              <div class="col-md-6">
                <h5 class="">
                  View item
                </h5>
              </div>

              <div class="col-md-6 mt-2">
                <div class="d-flex justify-content-end">
                  <div class="ms-3">
                    <a class="" href="{{ route('items.index') }}">
                      <button class="btn btn-secondary ms-auto">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="ms-1">
                          Back
                        </span>
                      </button>
                    </a>
                  </div>

                  <div class="ms-3">
                    <a href="{{ route('item.edit', ['item_id' => $item->id]) }}">
                      <button class="btn btn-primary ms-auto">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="ms-1">
                          Edit
                        </span>
                      </button>
                    </a>
                  </div>

                  <div class="ms-3">
                    <form action="/items/{{ $item->id }}" method="post" style="max-height: 2rem;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger ">
                        <i class="fa-solid fa-trash"></i>
                        <span class="ms-1">
                          Delete
                        </span>
                      </button>
                    </form>
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
                  <input class="form-control" type="text" value="{{ $item->name }}" disabled />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Categories:
                  </label>
                  @if (count($item->categories) == 0)
                    <input class="form-control" type="text" value="--" disabled />
                  @else
                    <input class="form-control" type="text" value="{{ $item->categories[0]->name }}" disabled />
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Brands:
                  </label>
                  @if (count($item->brands) == 0)
                    <input class="form-control" type="text" value="--" disabled />
                  @else
                    <input class="form-control" type="text" value="{{ $item->brands[0]->name }}" disabled />
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Locations:
                  </label>
                  @if (count($item->locations) == 0)
                    <input class="form-control" type="text" value="--" disabled />
                  @else
                    <input class="form-control" type="text" value="{{ $item->locations[0]->name }}" disabled />
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Owner:
                  </label>
                  @if (count($item->locations) == 0)
                    <input class="form-control" type="text" value="--" disabled />
                  @else
                    <input class="form-control" type="text" value="{{ $item->owners[0]->email }}" disabled />
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Amount:
                  </label>
                  <input name="amount" class="form-control" type="text"  value="{{ $item->amount }}" disabled />
                </div>
              </div>

            </div>

            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Details</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Description:</label>
                  <textarea class="form-control" rows="10" disabled>{{ $item->description }}</textarea>
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
