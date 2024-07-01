@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'view project'])
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          {{-- card header --}}
          <div class="card-header pb-0">
            <div class="d-flex align-items-center justify-content-between">
              <div class="col-md-6">
                <h5 class="">View Project</h5>
              </div>

              <div class="col-md-6 mt-2">
                <div class="d-flex justify-content-end">
                  <div class="ms-3">
                    <a class="" href="{{ route('projects.index') }}">
                      <button class="btn btn-secondary ms-auto">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="ms-1">Back</span>
                      </button>
                    </a>
                  </div>

                  <div class="ms-3">
                    <a href="{{ route('project.edit', ['project_id' => $project->id]) }}">
                      <button class="btn btn-primary ms-auto">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="ms-1">Edit<span>
                      </button>
                    </a>
                  </div>

                  <div class="ms-3">
                    <form action="/projects/{{ $project->id }}" method="post" style="max-height: 2rem;">
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
            <p class="text-uppercase text-sm">Project Information</p>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Name:
                  </label>
                  <input class="form-control" type="text" value="{{ $project->name }}" disabled />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Owner:
                  </label>
                  <input class="form-control" type="text" value="{{ $project->owners[0]->email }}" disabled />
                </div>
              </div>
            </div>

            <hr class="horizontal dark">

            <p class="text-uppercase text-sm">
              Details
            </p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Description:
                  </label>
                  <textarea class="form-control" rows="10" disabled>{{ $project->description }}</textarea>
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
