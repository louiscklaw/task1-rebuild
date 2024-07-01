<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
  id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
      <div class="d-flex flex-column">
        <span class="ms-1 font-weight-bold">
          {{ 'Hello ! ' }}{{ auth()->user()->firstname }}
        </span>
        <span class="ms-1 text-secondary">
          {{ auth()->user()->email ?? '--' }}
        </span>
      </div>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto test-gold " id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
          General
        </h6>
      </li>


      @if (auth()->id() === 1)
        <li class="nav-item">
          <a class="py-3 nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
            <div class="ms-2 me-2">
              <i class="fa-solid fa-desktop fa-xl"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
      @endif

      <li class="nav-item">
        <a class="py-3 nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
          href="{{ route('profile') }}">
          <div class="ms-2 me-2">
            <i class="fa-solid fa-address-card fa-xl"></i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
          DB Tables
        </h6>
      </li>


      <li class="nav-item">

        <a class="py-3 nav-link {{ str_contains(request()->url(), 'items') == true ? 'active' : '' }}"
          href="{{ route('page', ['page' => 'items']) }}">
          <div class="ms-2 me-2">
            <i class="fa-solid fa-box fa-xl"></i>
          </div>
          <span class="nav-link-text ms-2">
            Items
          </span>
          <span class="badge badge-primary">24</span>
        </a>

      </li>

      <li class="nav-item">
        <a class="py-3 nav-link {{ str_contains(request()->url(), 'orders') == true ? 'active' : '' }}"
          href="{{ route('page', ['page' => 'orders']) }}">
          <div class="ms-2 me-2">
            <i class="fa-solid fa-clipboard fa-xl"></i>
          </div>
          <span class="nav-link-text ms-2">
            Orders
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="py-3 nav-link {{ str_contains(request()->url(), 'projects') == true ? 'active' : '' }}"
          href="{{ route('page', ['page' => 'projects']) }}">
          <div class="ms-2 me-2">
            <i class="fa-solid fa-diagram-project fa-xl"></i>
          </div>
          <span class="nav-link-text ms-2">
            Projects
          </span>
        </a>
      </li>

      @if (auth()->id() === 1)
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
            User Management
          </h6>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link
            {{ str_contains(request()->url(), 'users') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'users']) }}">
            <div class="ms-2 me-2">
              <i class="fa fa-user fa-lg fa-xl"></i>
            </div>
            <span class="nav-link-text ms-1">User List</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link {{ str_contains(request()->url(), 'user_roles') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'user_roles']) }}">
            <div class="ms-2 me-2">
              <i class="fa-solid fa-address-card fa-xl"></i>
            </div>
            <span class="nav-link-text ms-1">
              User roles
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link {{ str_contains(request()->url(), 'user_groups') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'user_groups']) }}">
            <div class="ms-2 me-2">
              <i class="fa-solid fa-people-group fa-xl"></i>
            </div>
            <span class="nav-link-text ms-1">
              Departments
            </span>
          </a>
        </li>
      @endif

      

      @if (auth()->id() === 1)
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
            Settings
          </h6>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link {{ str_contains(request()->url(), 'addresses') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'addresses']) }}">
            <div class="ms-2 me-2">
              <i class="fa-solid fa-map-location-dot fa-xl"></i>
            </div>
            <span class="nav-link-text ms-1">
              Addresses
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link {{ str_contains(request()->url(), 'categories') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'categories']) }}">
            <div class="ms-2 me-2">
              <i class="fa-solid fa-icons fa-xl"></i>
            </div>
            <span class="nav-link-text ms-1">
              Categories
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link {{ str_contains(request()->url(), 'brands') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'brands']) }}">
            <div class="ms-2 me-2">
              <i class="fa-solid fa-table-list fa-xl"></i>
            </div>
            <span class="nav-link-text ms-1">
              Brands
            </span>
          </a>
        </li>
      @endif


      {{-- Pages --}}
      <div style="display: none;">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
        </li>
        <li class="nav-item">
          <a class="py-3 nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'tables']) }}">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link {{ str_contains(request()->url(), 'billing') == true ? 'active' : '' }}"
            href="{{ route('page', ['page' => 'billing']) }}">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="py-3 nav-link {{ Route::currentRouteName() == 'virtual-reality' ? 'active' : '' }}"
            href="{{ route('virtual-reality') }}">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality 3</span>
          </a>
        </li>
      </div>
      {{-- Pages --}}

    </ul>
  </div>
</aside>
