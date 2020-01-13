<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('home.dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
          <img class="" src="https://i0.wp.com/www.desaintasik.com/wp-content/uploads/2018/05/logopertamina.png?fit=320%2C320&ssl=1" width="50">
      </span>
      <!-- logo for regular state and mobile devices -->
      <img class="" src="{{asset('assets/images/img/logo/logo.png')}}" width="160">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ session()->get('users')->NAME }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png" class="img-circle" alt="User Image">

                <p>
                    {{ session()->get('users')->NAME }}
                  <small>{{ session()->get('users')->AD_USERNAME }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                {{--  <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>  --}}
                <div class="pull-right">
                  <a href="{{ route('signout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>