<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left info">
          <p style="color:white"><?php Session::get('login')->name; ?></p>
          <a style="color:white" href="#"><?php Session::get('login')->email; ?></a>
        </div>
      </div>
      <!-- search form -->
      @if(Session::get('login')->role == 1)
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
      @elseif(Session::get('login')->role == 2)
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
      @elseif((Session::get('login')->role == 3) || (Session::get('login')->role == ""))
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
