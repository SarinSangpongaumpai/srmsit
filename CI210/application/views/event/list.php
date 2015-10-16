<script src="https://code.jquery.com/jquery-2.1.1.min.js"/>
      
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 

  <!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event Setting
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <div id="chartdiv2"></div>
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th style="text-align:center;">No</th>
                      <th >Event Title</th>
                      <th style="text-align:left;">Type</th>
                      <th style="text-align:left;">Start</th>
                      <th style="text-align:left;">Cost</th>
                      <th style="text-align:center;">Duration</th>
                      <th style="text-align:center;">Participants</th>
                      <th style="text-align:left;">Actual</th>
                    </tr>
                  </thead>
                  <?php if(false !==($result)){  $number = 1;
                    foreach($result as $r){
                  ?>
                  <tbody>
                    <tr>
                      <td style="text-align:center;"><?php echo $number ?></td>
                      <td><?= $r->title;?></td>
                      <td><?= $r->type;?></td>
                      <td><?= $r->start;?></td>
                      <td><?= $r->cost;?></td>
                      <td style="text-align:center;"><?= $r->duration;?></td>
                      <td style="text-align:center;"><?= $r->number;?></td>
                      <td  ><?= $r->actual;?></td>
                   </tr>  
                  </tbody>
                  <?php  $number = $number+1; 
                      }
                  }
                  else{
                  ?>
                    <tr>
                    <td>No results </td>
                    </tr>
                  <?php
                  }
                  ?>   <!-- for each-->
                </table>
              </div><!-- /.table-responsive -->
              <br>
              <div class="form-group" style="text-align:center">
                <a href="<?php echo base_url()?>event/setting" style=" font-weight: bold;">Change Setting</a>
              </div>
        </div>
      </section>
  </div><!-- /.content-wrapper -->
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="http://www.amcharts.com/lib/3/amstock.js"></script>
<script>
var chart2;            
    $(document).ready(function(){
        chart2.dataProvider = <?php echo $jsonResult?>; 
        chart2.validateData();
    });
var chart2 = AmCharts.makeChart("chartdiv2", {
  "type": "serial",
    "theme": "light",
    "marginRight": 80,
    "precision": 2,
    "autoMarginOffset": 20,
    "marginTop": 7,
    "valueAxes": [{
        "axisAlpha": 0.2,
        "dashLength": 1,
        "position": "left"
    }],
    "mouseWheelZoomEnabled": true,
    "graphs": [{
        "id": "g1",
        "labelText": "[[title]]",
        "balloonText": "Actual <br>[[category]]<br/><b><span style='font-size:14px;'>value: [[value]]</span></b>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "title": "Actual",
        "valueField": "actual",
        "useLineColorForBulletBorder": true
    },{
        "id": "g2",
        "balloonText": "Expected <br>[[category]]<br/><b><span style='font-size:14px;'>value: [[value]]</span></b>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "title": "Expected",
        "valueField": "expected",
        "useLineColorForBulletBorder": true
    }],
    "chartScrollbar": {
        "autoGridCount": true,
        "graph": "g1",
        "scrollbarHeight": 40
    },
    "chartCursor": {

    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "axisColor": "#DADADA",
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "legend": {
      "useGraphSettings": true,
      "position": "top"
    }
});
  </script>
  <style>
#chartdiv2 {
    width   : 100%;
  height    : 500px;
}
</style>