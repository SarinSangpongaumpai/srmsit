<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo site_url(); ?>img/User.png" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
      <p>SIT's SRM</p>
    </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
      <li >
        <a href="<?php echo base_url()?>main/index"><i class="fa fa-home"></i><span>Main</span></a>
        <a><i class="fa fa-book"></i><span>Summary Report</span> <i class="fa fa-angle-left pull-right"></i> </a>   
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(); ?>summaryReport/index"><i class="fa fa-angle-double-right"></i>
              <span> School Report</span></a>
            </li>
            <li><a href="<?php echo site_url(); ?>summaryReport/activity"><i class="fa fa-angle-double-right"></i>
              <span> Student Report</span></a>
            </li>
            <li><a href="<?php echo site_url(); ?>summaryReport/university"> <i class="fa fa-angle-double-right"></i>
              <span> SIT'SRM activities Report</span></a>
            </li>
          </ul>
      </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-bar-chart-o"></i><span>Comparison Charts</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url(); ?>pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> School</a></li>
          <li><a href="<?php echo site_url(); ?>pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Student</a></li>
          <li><a href="<?php echo site_url(); ?>pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> SIT'SRM activities</a></li>
        </ul>
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
        <a href="<?php echo site_url('event/index'); ?>"><i class="fa fa-edit"></i> <span>Event Setting</span></a>
    </li>
  </ul>
</section>
</aside>






      