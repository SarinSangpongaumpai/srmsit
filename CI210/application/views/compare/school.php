<link href="<?php echo base_url();?>css/summaryReport.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<?php 

      if(false !== ($CostEvent1)){
          foreach($CostEvent1 as $CostEvent){
             $cost1 = $CostEvent->cost;
             $totalEvent1 = $CostEvent->totalEvent;
           }
       }
       else{
          $cost1 = "0";
          $totalEvent1 = "0";
       }
?>
<?php 
      if(false !== ($CostEvent2)){
          foreach($CostEvent2 as $CostEvent){
             $cost2 = $CostEvent->cost;
             $totalEvent2 = $CostEvent->totalEvent;
           }
       }
       else{
          $cost2 = "0";
          $totalEvent2 = "0";
       }
?>
<?php 
  if(isset($_GET['start']) && isset($_GET['end'])){
         $start = $_GET['start'];
         $end   = $_GET['end'];
    }
    else{
          $start = "2015-01-01";
          $end   = date("Y-m-d");
    }
?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-bar-chart-o"></i>Compare School <small>(<?php echo $start." - ".$end ?>)</small>
      <small><a style=" font-weight: bold;"
        href="#changeDate" data-toggle="modal" >Click change date</a></small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>summaryReport/index"><i class="fa fa-book"></i>SummaryReport</a></li>
      <li class="active">School</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
       <div class="nav-tabs-custom">

          <div class="tab-content">
            <div class="active tab-pane" id="activity">
               <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-bar-chart"></i> Number of participants</li>
                </ul>
                <div id="chartdiv"></div>  
              </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->

  </section><!-- /.content -->
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
  <script>
  var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "rotate": true,
  "marginBottom": 50,
  "dataProvider": [{
    "col": "จำนวนครั้งที่จัด",
    "school1": -<?php echo $totalEvent1 ?>,
    "school2": <?php echo $totalEvent2 ?>
  }, {
    "col": "ผู้เข้าร่วมทั้งหมด",
    "school1": -3,
    "school2": 0
  }, {
    "col": "เพศชาย",
    "school1": -2,
    "school2": 5
  },{
    "col": "เพศหญิง",
    "school1": -2,
    "school2": 5
  }, {
    "col": "มัธยมศึกษาปีที่4",
    "school1": -2,
    "school2": 1
  }, {
    "col": "มัธยมศึกษาปีที่5",
    "school1": -1,
    "school2": 4
  }, {
    "col": "มัธยมศึกษาปีที่6",
    "school1": -1,
    "school2": 1
  },{
    "col": "วิทย์คณิต",
    "school1": -2,
    "school2": 4
  },{
    "col": "ศิลป์คำนวน",
    "school1": -1,
    "school2": 3
  },{
    "col": "ศิลป์ภาษา",
    "school1": -2,
    "school2": 3
  },{
    "col": "อื่นๆ",
    "school1": -0.2,
    "school2": 0.4
  },{
    "col": "จำนวนคนเข้าสมัครทั้งหมด",
    "school1": -10,
    "school2": 20
  },{
    "col": "CS",
    "school1": -10,
    "school2": 20
  },{
    "col": "IT",
    "school1": -10,
    "school2": 20
  }],
  "startDuration": 1,
  "graphs": [{
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "school1",
    "title": "KMUTT",
    "labelText": "[[value]]",
    "clustered": false,
    "labelFunction": function(item) {
      return Math.abs(item.values.value);
    },
    "balloonFunction": function(item) {
      return item.category + ": " + Math.abs(item.values.value) + "%";
    }
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "school2",
    "title": "KMUTT",
    "labelText": "[[value]]",
    "clustered": false,
    "labelFunction": function(item) {
      return Math.abs(item.values.value);
    },
    "balloonFunction": function(item) {
      return item.category + ": " + Math.abs(item.values.value) + "%";
    }
  }],
  "categoryField": "col",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0.2,
    "axisAlpha": 0
  },
  "valueAxes": [{
    "gridAlpha": 0,
    "ignoreAxisWidth": true,
    "labelFunction": function(value) {
      return Math.abs(value) + '%';
    },
    "guides": [{
      "value": 0,
      "lineAlpha": 0.2
    }]
  }],
  "balloon": {
    "fixedPosition": true
  },
  "chartCursor": {
    "valueBalloonsEnabled": false,
    "cursorAlpha": 0.05,
    "fullWidth": true
  },
  "allLabels": [{
    "text": "KMUTT",
    "x": "28%",
    "y": "97%",
    "bold": true,
    "align": "middle"
  }, {
    "text": "ACBK",
    "x": "75%",
    "y": "97%",
    "bold": true,
    "align": "middle"
  }],
 "export": {
    "enabled": true
  }   

});
  </script>
  <style>
  #chartdiv {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}           
  </style>


   


      
