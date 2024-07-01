<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <title>
    stock keeping system
  </title>

  <!--     Fonts and icons     -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;200;300;400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
  <script src="https://kit.fontawesome.com/96c3fdd630.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- CSS Files -->
  {{-- <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" /> --}}
  @vite(['resources/scss/argon-dashboard.scss', 'resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="{{ $class ?? '' }}" style="font-family: 'Noto Sans TC', sans-serif;">
  @guest
    @yield('content')
  @endguest

  @auth
    @if (in_array(request()->route()->getName(), [
            'sign-in-static',
            'sign-up-static',
            'login',
            'register',
            'recover-password',
            'rtl',
            'virtual-reality',
        ]))
      @yield('content')
    @else
      <div class="position-absolute w-100 min-height-300 top-0"
        style="background-image: url('https://images.unsplash.com/photo-1616401784845-180882ba9ba8?q=80&w=2070'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
      </div>

      @include('layouts.navbars.auth.sidenav')

      <main class="main-content border-radius-lg">
        @yield('content')
      </main>
      @include('components.fixed-plugin')
    @endif
  @endauth

  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/argon-dashboard.js"></script>

  @stack('js');
</body>

</html>
