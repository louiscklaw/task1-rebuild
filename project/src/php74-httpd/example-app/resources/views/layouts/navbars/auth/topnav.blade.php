<!-- Navbar -->
<nav
  class="
    navbar
    navbar-main
    px-0
    mx-4
    shadow-none
    border-radius-xl
    {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}"
  id="navbarBlur" data-scroll="false">

  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
      </ol>
    </nav>
  </div>
  <div>
    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
      @csrf
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="nav-link text-white font-weight-bold px-0">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        <span class="d-sm-inline d-none">Log out</span>
      </a>
    </form>
  </div>
</nav>
<!-- End Navbar -->
