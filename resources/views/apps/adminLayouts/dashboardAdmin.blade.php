<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Management | Admin Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css" />
  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

      <!-- Header -->
      @include('headers')
  
      <!-- Sidebar -->
      @include('sidebar')
   
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content -->
      <section class="content-header">
        <h1>
          Application
          <small>List User</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>List Users</a></li>
          <li class="active">Here</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        
          <div class="box">
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('status') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>
               @endif
              <div class="box-header">
                <h3 class="box-title" style="margin-bottom: 8px">Data Users</h3>
                <div>
                    <a href="{{ url('/dashboard-admin/add-user') }}" type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add User Data</a href="{{ url('/dashboard-user') }}">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Personal Number</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Assignment Number</th>
                    <th>Account Active</th>
                    <th>Type</th>
                    {{--  <th>Role</th>  --}}
                    {{--  <th>Expired</th>  --}}
                    <th style="text-align: center">Action</th>
                  </tr>
                  </thead>
                  @php(
                    $no = 1
                    )
                  <tbody>
                    @foreach($getdatas as $a)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$a->PERNR}}</td>
                    <td>{{$a->NAME}}</td>
                    <td>{{$a->AD_USERNAME}}</td>
                    <td>{{$a->EMAIL}}</td>
                    <td>{{$a->ASSIGNMENT_NUMBER}}</td>
                    <td>
                        @if($a->IS_ACTIVE == 1)
                          <span class="label label-primary bold uppercase"> Actived</span>
                        @else
                          <span class="label label-danger bold uppercase"> Inactive</span>
                        @endif
                    </td>
                    <td>
                      @if($a->ZTIPE == 'L')
                        <span class="label label-success bold uppercase"> LDAP</span>
                      @else
                        <span class="label label-warning bold uppercase"> Not LDAP</span>
                      @endif
                    </td>
                    {{--  <td>{{$a->ZROLE}}</td>  --}}
                    {{--  <td>{{$a->ZUSER_EXPIRY}}</td>  --}}
                    <td class="row" style="min-width: 200px">
                        @if($a->IS_ACTIVE == 1)
                        <form method="post" action="{{ route('home.delete-user',[$a->PERNR,$a->ASSIGNMENT_NUMBER]) }}">
                            <a class="btn btn-info" href="{{ route('home.update-user-index' , $a->PERNR) }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
                            @csrf
                            <button type="submit" class="btn btn-danger"></i>Inactive Account</button> 
                        </form>
                        @else
                        <form method="post" action="{{ route('home.active-user',[$a->PERNR,$a->ASSIGNMENT_NUMBER]) }}">
                            <a class="btn btn-info" href="{{ route('home.update-user-index' , $a->PERNR) }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
                            @csrf
                            <button type="submit" class="btn btn-primary"></i>Actived Account</button> 
                        </form>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    {{-- @include('footer') --}}

  </div><!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- DataTables -->
  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : false,
          'autoWidth'   : true,
          'scrollX'     : true
        })
      })
    </script>
</body>

</html>