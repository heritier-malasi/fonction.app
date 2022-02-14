  <!-- ======= Header ======= -->
  <header id="header">
      <div class="container">

          <div class="logo float-left">
              <h1 class="text-light"><a href="/"><span>Fondation</span></a></h1>
              <!-- Uncomment below if you prefer to use an image logo -->
              <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
          </div>

          <nav class="nav-menu float-right d-none d-lg-block">
              <ul>
                  <li class="active"><a href="index.html">Home</a></li>
                  <li><a href="#about">About Us</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#portfolio">Portfolio</a></li>
                  <li><a href="#team">Team</a></li>
                  <li><a href="#contact">Contact Us</a></li>


                  <!-- Authentication Links -->
                  @guest
                  @if (Route::has('login'))
                  <li>
                      <a href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @endif

                  @if (Route::has('register'))
                  <li>
                      <a href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                  @endif
                  @else

                  <li class="drop-down">

                      <a href="{{ route('profile.index')}}">
                          {{ Auth::user()->name }}
                      </a>
                      <ul>
                          <li><a href="#">Drop Down 1</a></li>
                          <li><a href="#">Drop Down 3</a></li>
                          <li><a href="#">Drop Down 4</a></li>

                          @if (Auth::user()->is_admin == 1)
                          <li><a href="{{ url('/admin/home') }}">Dashboard Admin</a></li>
                          @endif
                          <li>
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </li>

                      </ul>
                  </li>
                  @endguest

              </ul>
          </nav><!-- .nav-menu -->

      </div>
  </header><!-- End Header -->
