<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="color:white">{{ session()->get('users')->NAME }}</p>
          <a style="color:white" href="#">{{ session()->get('users')->EMAIL }}</a>
        </div>
      </div>
      <!-- search form -->
      @if($users->ZROLE == 1)
      <form action="#" method="get" class="sidebar-form">
        <div>
          <button type="submit" name="search" id="search-btn" class="btn btn-block">
            Ganti Password
          </button>
        </div>
      </form>
 
      <ul class="sidebar-menu" data-widget="tree">
        <li>
        <a href="{{ route('home.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('apps.list-apps') }}">
            <i class="fa fa-desktop"></i> <span>Apps</span>
          </a>
        </li>
        <li>
          <a href="{{ route('apps.apps-index') }}">
            <i class="fa fa-desktop"></i> <span>Apps Data</span>
          </a>
        </li>
        <li>
          <a href="{{ route('apps.apps-mapping-index') }}">
            <i class="fa fa-desktop"></i> <span>Apps Mapping</span>
          </a>
        </li>
        <li>
          <a href="{{ route('users.data') }}">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
      </ul>
      @elseif($users->ZROLE == 2)
      <form action="#" method="get" class="sidebar-form">
        <div>
          <button type="submit" name="search" id="search-btn" class="btn btn-block">
            Ganti Password
          </button>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{ route('home.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('apps.list-apps') }}">
            <i class="fa fa-desktop"></i> <span>Apps</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa fa-desktop"></i> <span>Apps Data</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa fa-desktop"></i> <span>Apps Mapping</span>
          </a>
        </li>
      </ul>
      @elseif(($users->ZROLE == 3) || ($users->ZROLE == ""))
      <form action="#" method="get" class="sidebar-form">
        <div>
          <button type="submit" name="search" id="search-btn" class="btn btn-block">
            Ganti Password
          </button>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{ route('home.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('apps.list-apps') }}">
            <i class="fa fa-desktop"></i> <span>Apps</span>
          </a>
        </li>
      </ul>
      @endif
    </section>
    <!-- /.sidebar -->
  </aside>
