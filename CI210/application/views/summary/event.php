<link href="<?php echo base_url();?>css/summaryReport.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"/>
      
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<link rel="stylesheet" href="<?php echo base_url()?>plugins/bootstrap-table-master/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>plugins/bootstrap-table-master/dist/bootstrap-table.css">

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Event Report</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#test"><i class="fa fa-book"></i>Test</a></li>
      <li class="active">School</li>
    </ol>
  </section>


  <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="http://127.0.0.1/CI210/summaryReport/index#activity" data-toggle="tab">Activity</a></li>
            <li><a href="#test" data-toggle="tab">Success</a></li>
            <li class="pull-left header"><i class="fa fa-table"></i> Table</li>
         </ul>
         <div class="tab-pane" id="succession" >
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
            <div class="box-body">
              <div id="chartdiv"></div> 
            </div>
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs ">
                <li class="pull-left header" style="position:absolute "><i class="fa fa-table"></i> Table</li>
              </ul>
            <div class="table-responsive" >
              <table  data-toggle="table"   data-id-field="title"
               data-show-refresh="true" data-show-toggle="true" 
              data-url="getCostParticipant" data-height="500" data-pagination="true" data-search="true"
              data-filter-control="false" >
                <thead>
                   <tr>
                    <th data-halign="center" data-align ="center" rowspan="2" data-field="title" data-sortable="true" tabindex="0">Even title</th>
                    <th data-halign="center" data-align ="center" colspan="2" >Cost (bahts)</th>
                    <th data-halign="center" data-align ="center" colspan="2" scope="colgroup">Participants (people)</th>
                    <th data-halign="center" data-align ="center" rowspan="2" data-field="date" data-sortable="true" tabindex="0">Date</th>
                  </tr>
                  <tr>
                    <th data-halign="center" data-align ="center" data-formatter="budget" data-field="budget" data-switchable="false" data-sortable="true"  >Budget </th>
                    <th data-halign="center" data-align ="center" data-formatter="actual" data-field="cost"  data-switchable="false" data-sortable="true"  >Actual Spend </th>
                    <th data-halign="center" data-align ="center" data-field="expectPeople"data-switchable="true" data-sortable="true" >Expected</th>
                    <th data-halign="center" data-align ="center" data-field="participants"data-switchable="true" data-sortable="true" >Actual</th>
                   </tr>
                </thead>
              </table>
              
            </div><!-- /.table-responsive -->
          </div>
        </div>
    <div class="tab-pane" id="test" >
      <div class="nav-tabs-custom">
        <div id="chartdiv2"></div> 
        <div class="table-responsive" >
              <table  data-toggle="table"   data-id-field="title"
               data-show-refresh="true" data-show-toggle="true" 
              data-url="getCostEffective" data-height="500" data-pagination="true" data-search="true"
              data-filter-control="false" >
                <thead>
                  <tr>
                    <th data-halign="center" data-align ="center"  data-field="title" data-sortable="true" >Even title</th>
                    <th data-halign="center" data-align ="center"  data-field="date" data-sortable="true" >Date</th>
                    <th data-halign="center" data-align ="center" data-field="expected"  data-switchable="false" data-sortable="true"  >Expected </th>
                    <th data-halign="center" data-align ="center" data-field="actual"data-switchable="true" data-sortable="true" >Actual</th>
                   </tr>
                </thead>
              </table>
              
            </div><!-- /.table-responsive -->
      </div>
    </div>
  </div>
</div>
</section><!-- /.content -->
</div>

  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>plugins/bootstrap-table-master/dist/bootstrap-table.min.js"></script>
<script src="<?php echo base_url()?>plugins/bootstrap-table-master/dist/bootstrap-table.js"></script>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="http://www.amcharts.com/lib/3/amstock.js"></script>
<script>
              var test = 0;
    function budget(value, row) {
        test = value;
        return value;
    }

    function actual(value) {
        // 16777215 == ffffff in decimal
        if(test == value){
        var color = '#1a59e0';
        return '<div  style="color: ' + color + '">' +
                '<i class="fa fa-caret-right"></i>' +
                value +
                '</div>';
              }
          else if(test < value){
        var color= '#E80000';
        return '<div  style="color: ' + color + '">' +
                '<i class="fa fa-caret-up"></i>' +
                value +
                '</div>';
              }
              else{
                 var color = '#669521';
        return '<div  style="color: ' + color + '">' +
                '<i class="fa fa-caret-down"></i>' +
                value +
                '</div>';
              }
    }
</script>
<script>
var chart;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReportEvent/getCostParticipant",  function (data) {
        chart.dataProvider = data; 
        chart.validateData();
      });
    });
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "dataDateFormat": "YYYY-MM-DD",
  "precision": 0,
  "valueAxes": [{
    "id": "v1",
    "title": "Participants (people)",
    "position": "left",
    "autoGridCount": false
  }, {
    "id": "v2",
    "title": "Cost (bahts)",
    "gridAlpha": 0,
    "position": "right",
    "autoGridCount": false
  }],
  "graphs": [{
    "id": "g1",
    "precision": 2,
    "valueAxis": "v2",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#20acd4",
    "type": "smoothedLine",
    "title": "Cost",
    "useLineColorForBulletBorder": true,
    "valueField": "cost",
    "balloonText": "Cost<br/><b style='font-size: 130%'>[[value]] (bahts)</b>"
  }, {
    "id": "g2",
    "valueAxis": "v2",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#e1ede9",
    "type": "smoothedLine",
    "dashLength": 5,
    "title": "Budget",
    "useLineColorForBulletBorder": true,
    "valueField": "budget",
    "balloonText": "Budget<br/><b style='font-size: 130%'>[[value]] (bahts)</b>"
  }, {
    "id": "g2",
    "valueAxis": "v1",
    "lineColor": "#62cf73",
    "fillColors": "#62cf73",
    "fillAlphas": 1,
    "type": "column",
    "title": "Participants",
    "valueField": "participants",
    "clustered": false,
    "columnWidth": 0.3,
    "legendValueText": "[[value]]",
    "balloonText": "Actual Participants<br/><b style='font-size: 130%'>[[value]] (people)</b>"
  }, {
    "id": "g3",
    "valueAxis": "v1",
    "lineColor": "#e1ede9",
    "fillColors": "#e1ede9",
    "fillAlphas": 1,
    "type": "column",
    "title": "Expected",
    "valueField": "expectPeople",
    "clustered": false,
    "labelText": "[[title]]",
    "columnWidth": 0.5,
    "legendValueText": "[[value]]",
    "balloonText": "Expected Participants<br/><b style='font-size: 130%'>[[value]] (people)</b>"
  }],
  "chartScrollbar": {
    "graph": "g1",
    "oppositeAxis": false,
    "offset": 30,
    "scrollbarHeight": 50,
    "backgroundAlpha": 0,
    "selectedBackgroundAlpha": 0.1,
    "selectedBackgroundColor": "#888888",
    "graphFillAlpha": 0,
    "graphLineAlpha": 0.5,
    "selectedGraphFillAlpha": 0,
    "selectedGraphLineAlpha": 1,
    "autoGridCount": true,
    "color": "#AAAAAA"
  },
  "chartCursor": {
    "pan": true,
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true,
    "cursorAlpha": 0,
    "valueLineAlpha": 0.2
  },
  "categoryField": "date",
  "categoryAxis": {
    "parseDates": true,
    "dashLength": 1,
    "minorGridEnabled": true
  },
  "legend": {
    "useGraphSettings": true,
    "position": "top"
  },
  "balloon": {
    "borderThickness": 1,
    "shadowAlpha": 0
  },
  "export": {
   "enabled": true
  }
});
</script>
<script>
var chart2;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReportEvent/getCostEffective",  function (data) {
        chart2.dataProvider = data; 
        chart2.validateData();
      });
    });
var chart2 = AmCharts.makeChart("chartdiv2", {
  "type": "serial",
    "theme": "light",
    "marginRight": 80,
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
#chartdiv {
    width   : 100%;
  height    : 500px;
}
#chartdiv2 {
    width   : 100%;
  height    : 500px;
}
</style>

