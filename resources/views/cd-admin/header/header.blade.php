
<header class="main-header">
  <!-- Logo -->
  <a href="{{url('/dashboard')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>H</b>E</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Hotel</b>Excellence</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('cd-admin/creatu/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('cd-admin/creatu/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

              <p>
                {{Auth::user()->name}}
                <small>Member since Nov. 2012</small>
              </p>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header" align="center"><h4>Services</h4></li>
      <li>
        <a href="{{url('/dashboard')}}">
          <i class="fa fa-dashboard"></i><span>Dashboard</span>
        </a>

      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/viewadmin')}}"><i class="fa fa-eye"></i> View Admins</a></li>
          <li><a href="{{url('/viewadmin/create')}}"><i class="fa fa-edit"></i> Add Admin</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-bed"></i>
          <span>Room</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/viewroom')}}"><i class="fa fa-eye"></i>View Room</a></li>
          <li><a href="{{url('/viewroom/create')}}"><i class="fa fa-edit"></i> Add Room</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-calendar-check-o"></i>
          <span>Accomodation</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/viewaccomodation')}}"><i class="fa fa-eye"></i> View Accomodation</a></li>
          <li><a href="{{url('/viewaccomodation/create')}}"><i class="fa fa-edit"></i> Add Accomodation</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Tailored Programs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/viewtailored')}}"><i class="fa fa-eye"></i> View Programs</a></li>
          <li><a href="{{url('/viewtailored/create')}}"><i class="fa fa-edit"></i> Add Programs</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-wifi"></i>
          <span>Facility</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/viewfacility')}}"><i class="fa fa-eye"></i> View Facility</a></li>
          <li><a href="{{url('/viewfacility/create')}}"><i class="fa fa-edit"></i> Add Facility</a></li>
          <li><a href="{{url('/viewgallery/create')}}"><i class="fa fa-edit"></i> Add Gallery</a></li>

        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-image "></i>
          <span>Carousel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/viewcarousel')}}"><i class="fa fa-eye"></i> View Carousel</a></li>
          <li><a href="{{url('/viewcarousel/create')}}"><i class="fa fa-edit"></i> Add Carousel</a></li>
        </ul>
      </li>
      <li>
        <a href="{{url('/viewabout')}}">
          <i class="fa fa-question"></i><span>About</span>
        </a>

      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-commenting"></i>
          <span>Feedback</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            <small class="label pull-right bg-yellow">{{$unreplied}}</small>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/viewfeedback')}}"><i class="fa fa-eye"></i> Inbox</a></li>
          <li><a href="{{url('/viewfeedback/reply')}}"><i class="fa fa-edit"></i>Sent</a></li>

        </ul>
      </li>



    </aside>