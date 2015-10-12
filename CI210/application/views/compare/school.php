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
      if(false !== ($CS1)){ foreach($CS1 as $CS1){  $CS1 = $CS1->number; }}
      else{ $CS1 = 0;}
      if(false !== ($CS2)){ foreach($CS2 as $CS2){  $CS2 = $CS2->number; }}
      else{ $CS2 = 0;}
      if(false !== ($IT1)){ foreach($IT1 as $IT1){  $IT1 = $IT1->number; }}
      else{ $IT1 = 0;}
      if(false !== ($IT2)){ foreach($IT2 as $IT2){  $IT2 = $IT2->number; }}
      else{ $IT2 = 0;}
?>
<?php 
      if(false !== ($Male1)){ foreach($Male1 as $Male1){  $Male1 = $Male1->number; }}
      else{ $Male1 = 0;}
      if(false !== ($Male2)){ foreach($Male2 as $Male2){  $Male2 = $Male2->number; }}
      else{ $Male2 = 0;}
      if(false !== ($Female1)){ foreach($Female1 as $Female1){  $Female1 = $Female1->number; }}
      else{ $Female1 = 0;}
      if(false !== ($Female2)){ foreach($Female2 as $Female2){  $Female2 = $Female2->number; }}
      else{ $Female2 = 0;}
?>
<?php 
      if(false !== ($MathSci1)){ foreach($MathSci1 as $MathSci1){  $MathSci1 = $MathSci1->number; }}
      else{ $MathSci1 = 0;}
      if(false !== ($MathSci2)){ foreach($MathSci2 as $MathSci2){  $MathSci2 = $MathSci2->number; }}
      else{ $MathSci2 = 0;}
      if(false !== ($EngMath1)){ foreach($EngMath1 as $EngMath1){  $EngMath1 = $EngMath1->number; }}
      else{ $EngMath1 = 0;}
      if(false !== ($EngMath2)){ foreach($EngMath2 as $EngMath2){  $EngMath2 = $EngMath2->number; }}
      else{ $EngMath2 = 0;}
      if(false !== ($ArtMath1)){ foreach($ArtMath1 as $ArtMath1){  $ArtMath1 = $ArtMath1->number; }}
      else{ $ArtMath1 = 0;}
      if(false !== ($ArtMath2)){ foreach($ArtMath2 as $ArtMath2){  $ArtMath2 = $ArtMath2->number; }}
      else{ $ArtMath2 = 0;}
      if(false !== ($ETC1)){ foreach($ETC1 as $ETC1){  $ETC1 = $ETC1->number; }}
      else{ $ETC1 = 0;}
      if(false !== ($ETC2)){ foreach($ETC2 as $ETC2){  $ETC2 = $ETC2->number; }}
      else{ $ETC2 = 0;}
?>
<?php 
      if(false !== ($M41)){ foreach($M41 as $M41){  $M41 = $M41->number; }}
      else{ $M41 = 0;}
      if(false !== ($M42)){ foreach($M42 as $M42){  $M42 = $M42->number; }}
      else{ $M42 = 0;}
      if(false !== ($M51)){ foreach($M51 as $M51){  $M51 = $M51->number; }}
      else{ $M51 = 0;}
      if(false !== ($M52)){ foreach($M52 as $M52){  $M52 = $M52->number; }}
      else{ $M52 = 0;}
      if(false !== ($M61)){ foreach($M61 as $M61){  $M61 = $M61->number; }}
      else{ $M61 = 0;}
      if(false !== ($M62)){ foreach($M62 as $M62){  $M62 = $M62->number; }}
      else{ $M62 = 0;}
?>
<?php 
      if(false !== ($participant1)){ foreach($participant1 as $p1){  $participant1 = $p1->number; }}
      else{ $participant1 = 0;}
      if(false !== ($participant2)){ foreach($participant2 as $p2){  $participant2 = $p2->number; }}
      else{ $participant2 = 0;}
?>
<?php 
      if(false !== ($register1)){ foreach($register1 as $r1){  $register1 = $r1->number; }}
      else{ $register1 = 0;}
      if(false !== ($register2)){ foreach($register2 as $r2){  $register2 = $r2->number; }}
      else{ $register2 = 0;}
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
<?php 
  if(isset($_GET['school1']) && isset($_GET['school2'])){
         $school1 = $_GET['school1'];
         $school2   = $_GET['school2'];
    }
    else{
          $school1 = "KMUTT";
          $school2   = "RO";
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
                  <li class="pull-left header"><i class="fa fa-bar-chart"></i><?php echo $school1?> and <?php echo $school2 ?></li>
                </ul>
                <div id="chartdiv"></div>  
              </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->

  </section><!-- /.content -->
</div>
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
    "school1": -<?php echo $participant1 ?>,
    "school2": <?php echo $participant2 ?>
  }, {
    "col": "เพศชาย",
    "school1": -<?php echo $Male1 ?>,
    "school2": <?php echo $Male2 ?>
  },{
    "col": "เพศหญิง",
    "school1": -<?php echo $Female1 ?>,
    "school2": <?php echo $Female2 ?>
  }, {
    "col": "มัธยมศึกษาปีที่4",
    "school1": -<?php echo $M41 ?>,
    "school2": <?php echo $M42 ?>
  }, {
    "col": "มัธยมศึกษาปีที่5",
    "school1": -<?php echo $M51 ?>,
    "school2": <?php echo $M52 ?>
  }, {
    "col": "มัธยมศึกษาปีที่6",
    "school1": -<?php echo $M61 ?>,
    "school2": <?php echo $M62 ?>
  },{
    "col": "วิทย์คณิต",
    "school1": -<?php echo $MathSci1 ?>,
    "school2": <?php echo $MathSci2 ?>
  },{
    "col": "ศิลป์คำนวน",
    "school1": -<?php echo $EngMath1 ?>,
    "school2": <?php echo $EngMath2 ?>
  },{
    "col": "ศิลป์ภาษา",
    "school1": -<?php echo $ArtMath1 ?>,
    "school2": <?php echo $ArtMath2 ?>
  },{
    "col": "อื่นๆ",
    "school1": -<?php echo $ETC1 ?>,
    "school2": <?php echo $ETC2 ?>
  },{
    "col": "จำนวนคนเข้าสมัครทั้งหมด",
    "school1": -<?php echo $register1 ?>,
    "school2": <?php echo $register2 ?>
  },{
    "col": "CS",
    "school1": -<?php echo $CS1 ?>,
    "school2": <?php echo $CS2 ?>
  },{
    "col": "IT",
    "school1": -<?php echo $IT1 ?>,
    "school2": <?php echo $IT2 ?>
  },{
    "col": "Center(user for scale graphs)",
    "school1": -100,
    "school2": 100
  }],
  "startDuration": 1,
  "graphs": [{
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "school1",
    "title": "KMUTT",
    "valueText":  "[[title]]",
    "labelText": "[[value]][[title]]",
    "clustered": false,
    "labelFunction": function(item) {
      return Math.abs(item.values.value);
    },
    "balloonText" : "[[value]]",
    "balloonFunction": function(item) {
      return "<?php echo $school1 ?><br>"+item.category + ": " + Math.abs(item.values.value)+" คน" ;
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
      return "<?php echo $school2 ?><br>"+item.category + ": " + Math.abs(item.values.value)+" คน" ;
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
      return Math.abs(value)+"คน";
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
    "text": "<?php echo $school1?>(blue)",
    "x": "20%",
    "y": "97%",
    "bold": true,
    "align": "middle"
  }, {
    "text": "<?php echo $school2?>(yellow)",
    "x": "95%",
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

 <div class="modal fade" id="changeDate">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Change Start and End date</h4>
        </div>
        <div class="modal-body">
          <div style="height: 200px;">
                <div class="body ">
                  <form>
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" class="form-control" id="start" name="start">
                  </div><br>
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" class="form-control" id="end" name="end">
                  </div><br>
                  <?php if ( isset($_GET['school1']))
                    { ?>
                  <div style="" class="input-group">
                    <input type="text" class="form-control" id="school1" name="school1" value="<?php echo ($_GET['school1']) ?>">
                  </div>
                  <?php }?>
                  <?php if ( isset($_GET['school2']))
                    { ?>
                  <div style="" class="input-group">
                    <input type="text" class="form-control" id="school2" name="school2" value="<?php echo ($_GET['school2']) ?>">
                  </div>
                  <?php }?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button name="submitDate" id="submitDate" type="submit" class="btn btn-primary">Search</button>
                </div>
              </form> 
              <script>
                  document.getElementById('submitDate').addEventListener('click', function (e) {
                        window.location.href = "<?php echo base_url()?>compareSchool/school";
                    });
              </script>        
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
   


      
