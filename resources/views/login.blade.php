<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SILOLAKU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- IziToast -->
  <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
  <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    {{-- <nav class="navbar navbar-static-top"  style="box-shadow: 0 8px 8px 0 rgba(0,0,0,.2); background-color:#37517e;">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>DINAS KESEHATAN KOTA BANJARMASIN</b></a>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
          </ul>
          
        </div>
        
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <b>BADAKO</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
      
    </nav> --}}
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper"  style="background-image: url('/logo/login-bg.jpg'); background-size:cover;">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
            <div class="text-center"><br/><br/><br/><br/><br/>
            </div>
            
            <div class="box" style="box-shadow: 20px 28px 18px 18px rgba(0,0,0,.2);border-radius:5px 50px;">
              {{-- <div class="box-header with-border text-center">
                <h3 class="box-title">BASIC DATA KEPEGAWAIAN ONLINE</h3>
      
              </div> --}}
              <form role="form" class="form-horizontal" method="post" action="/login">
                @csrf
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-6">

                    <div class="description-block border-right">
                      <img src="/logo/animasi.png" width="70%" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="box-body text-center" style="padding:20px;">
                      <img src="/logo/silolaku.png" width="70%">
                      
                      
                      <div class="form-group">
                        <label >USERNAME</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label >PASSWORD</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" style="border-radius:25px;box-shadow: 2px 2px #888888;"><i class="fa fa-sign-in"></i> Login</button>
                      </div>
                    </div>
                

                  </div>
                </div>
              </div>
              
              </form>
            </div>
          </div>
          <div class="col-md-1">
          </div>
        </div>
        
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2022 Pemerintah Kota Banjarmasin</strong>
    </div>
    <!-- /.container -->
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
<script type="text/javascript">
@include('layouts.notif')
</script>

</body>
</html>
