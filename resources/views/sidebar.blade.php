<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ session()->get('users')->NAME }}</p>
          <a href="#">{{ session()->get('users')->EMAIL }}</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div>
          <button type="submit" name="search" id="search-btn" class="btn btn-block">
            Ganti Password
          </button>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
        <a href="/dashboard-admin">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
