<?php $session_data = $this->session->userdata('logged_in');
      $name = $session_data['name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SIT's SRM System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo site_url(); ?>plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo site_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo site_url(); ?>plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo site_url(); ?>css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body class="skin-black">
    <div class="wrapper">
      <!-- header logo: style can be found in header.less -->
      <header class="main-header">
      <!-- Logo -->
        <img src="<?php echo site_url(); ?>img/SIT_logo.png" class="logo-image" />
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>img/user/<?php echo $name ?>.png" class="user-image" alt="User Image"/>
                <span class="hidden-xs">SIT's SRM </span>
              </a>
              <ul class="dropdown-menu">
              <!-- User image -->
                <li class="user-header">
                <img src="<?php echo base_url(); ?>img/user/<?php echo $name ?>.png" class="img-circle" alt="User Image" />
                <p><?php echo $name; ?>!</p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url() ?>main/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
           </ul>
        </div>
      </nav>
    </header>
  
<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo site_url(); ?>img/user/<?php echo $name ?>.png" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
      <p>SIT's SRM</p>
    </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
      <li >
        <a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i><span>Main</span></a>
        <a><i class="fa fa-book"></i><span>Summary Report</span> <i class="fa fa-angle-left pull-right"></i> </a>   
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(); ?>summaryReport/school?place=KMUTT"><i class="fa fa-angle-double-right"></i>
              <span> School Report</span></a>
            </li>
            <li><a href="<?php echo site_url(); ?>summaryReportEvent/event"> <i class="fa fa-angle-double-right"></i>
              <span> SIT'SRM activities Report</span></a>
            </li>
          </ul>
      </li>
    <li class="treeview">
      <a href="<?php echo site_url(); ?>compareSchool/school"><i class="fa fa-bar-chart-o"></i><span>Compare School</span></i></a>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-table"></i> <span>Tables</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('table/student'); ?>"><i class="fa fa-angle-double-right"></i>Student</a></li>
          <li><a href="<?php echo site_url('table/school'); ?>"><i class="fa fa-angle-double-right"></i>School</a></li>
          <li><a href="<?php echo site_url('table/activities'); ?>"><i class="fa fa-angle-double-right"></i> SIT'SRM Activities</a></li>
        </ul>
    </li>
    <li>
      <a href="<?php echo site_url('map/index'); ?>"><i class="fa fa-location-arrow"></i><span>Map</span></a>
    </li>
    <li>
      <a href="<?php echo site_url('upload/index'); ?>"><i class="fa  fa-upload"></i> <span>Upload File</span></a>
    </li>
     <li>
         <a href="<?php echo site_url('calendar/index'); ?>"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
    </li>
    <li>
        <a href="<?php echo site_url('event/setting'); ?>"><i class="fa fa-edit"></i> <span>Event Setting</span></a>
    </li>
  </ul>
</section>
</aside>






      
      

