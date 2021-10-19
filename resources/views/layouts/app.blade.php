<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css ') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css ') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css ') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css ') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css ') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css ') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css ') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css ') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css ') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css ') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilo.css') }}">

  <script src="{{asset('js/jquery-3.2.1.js')}}"></script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!-- ______________________________Fin head__________________________________ -->

<!-- ______________________________Inicio de body____________________________ -->

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ asset('home') }}" class="logo">
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Muni</b>PUNO</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
    
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

    
    <!-- _____________________________Administrador Salir__________________________ -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                 <li class="user-header">
                    <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    <p> {{ Auth::user()->name }} </p>
                  </li>
    
                  <!-- Menu Footer-->
                  <li class="user-footer">
    
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fa fa-btn fa-sign-out"></i>Salir del sistema
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
    
                  </li>
                </ul>
              </li>
          <!-- /.Administrador(menuSalir) -->
    
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ________________  _Fin header___Parte superior del sistema____________ -->



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

<!-- ____________________ panel del usuario__________________________________-->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Activo</a>
        </div>
      </div>
      <!-- /.panel de usuario -->



      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>

        <li>
          <a href="{{ asset('home') }}">
            <i class="fa fa-dashboard"></i>
            <span>Inicio</span>
          </a>
        </li>



<!-- ____________________SEDE_______________________________________________-->
        <li>
          <a href="{{ asset('equipo_computo') }}">
            <i class="fa fa-desktop"></i>
            <span>Equipos de Computo</span>
          </a>
        </li>


        <li>
          <a href="{{ asset('sede') }}">
            <i class="fa fa-university"></i>
            <span>Sedes</span>
          </a>
        </li>

        <li>
          <a href="{{ asset('area') }}">
            <i class="fa fa-sitemap"></i>
            <span>Areas</span>
          </a>
        </li>

        <li>
          <a href="{{ asset('cargo') }}">
            <i class="fa fa-suitcase"></i>
            <span>Cargos</span>
          </a>
        </li>

        <li>
          <a href="{{ asset('servicio') }}">
            <i class="fa fa-podcast"></i>
            <span>Servicios</span>
          </a>
        </li>

        <li>
          <a href="{{ asset('funcionario') }}">
            <i class="fa fa-group"></i>
            <span>Funcionarios</span>
          </a>
        </li>

        <li>
          <a href="{{ asset('tipo_equipo') }}">
            <i class="fa fa-laptop"></i>
            <span>Tipo de equipos</span>
          </a>
        </li>

        <li>
          <a href="{{ asset('protocolo_internet') }}">
            <i class="fa fa-server"></i>
            <span>Protocolos de Internet</span>
          </a>
        </li>


        <!-- /.Fin sede -->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside>

  </aside>

  @yield('content')
  <!--
  <div class="control-sidebar-bg"></div>
  -->
</div>

<!-- ./wrapper -->
<!-- ______________________________Inicio js_________________________________ -->
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js ') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js ') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js ') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js ') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js ') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js ') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js ') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js ') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js ') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js ') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js ') }}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js ') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js ') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js ') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js ') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js ') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js ') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js ') }}"></script>
<!----
   <script src="{{asset('js/app.js')}}"></script>
--->
@yield('scripts')

</body>

</html>
