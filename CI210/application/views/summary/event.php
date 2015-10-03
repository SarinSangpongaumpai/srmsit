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
              data-url="getCostParticipant" data-height="400" data-pagination="true" data-search="true"
              data-filter-control="false" >
                <thead>
                  <tr>
                    <th data-field="title" data-switchable="false" data-sortable="true" >Event title</th>
                    <th data-field="cost" data-switchable="false" data-sortable="true"  >Cost</th>
                    <th data-field="participants"data-switchable="true" data-sortable="true" >Participant</th>
                    <th data-field="date" data-sortable="true" >Date</th>
                  </tr>
                </thead>
              </table>
            </div><!-- /.table-responsive -->
          </div>
        </div>
    <div class="tab-pane" id="test" >
      <div class="nav-tabs-custom">
        dsadsadasd
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
<script src="http://www.amcharts.com/lib/3/themes/none.js"></script>

<script>
var chart;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReportEvent/getCostParticipant",  function (data) {
        chart.dataProvider = data; 
        chart.validateData();
      });
    });
//var chartData = [{"date":"2015-08-21","participants":100,"title":"BootCamp1","cost":25000}];
var chart = AmCharts.makeChart("chartdiv", {
  type: "serial",
  dataDateFormat: "YYYY-MM-DD",
  
  addClassNames: true,
  startDuration: 1,
  color: "#000000",
  marginLeft: 0,

  categoryField: "date",
  categoryAxis: {
    parseDates: true,
    minPeriod: "DD",
    autoGridCount: false,
    gridCount: 50,
    gridAlpha: 0.1,
    gridColor: "#000000",
    axisColor: "#555555",
    dateFormats: [{
        period: 'DD',
        format: 'DD'
    }, {
        period: 'WW',
        format: 'MMM DD'
    }, {
        period: 'MM',
        format: 'MMM'
    }, {
        period: 'YYYY',
        format: 'YYYY'
    }]
  },

  valueAxes: [{
    id: "a1",
    title: "Participants (people)",
    gridAlpha: 0,
    axisAlpha: 0
  },{
    id: "a2",
    position: "right",
    gridAlpha: 0,
    axisAlpha: 0,
    labelsEnabled: false
  },{
    id: "a3",
    title: "Cost (bahts)",
    position: "right",
    gridAlpha: 0,
    axisAlpha: 0,
    inside: true
  }],
  graphs: [{
    id: "g1",
    valueField:  "participants",
    title:  "Participants",
    type:  "column",
    fillAlphas:  0.9,
    valueAxis:  "a1",
    balloonText:  "[[title]]: [[value]] people",
    legendValueText:  "[[value]] people",
    legendPeriodValueText:  "[[value]] people",
    lineColor:  "#263138",
    alphaField:  "alpha",
  },{
    id: "g3",
    title: "Cost",
    valueField: "cost",
    type: "line",
    valueAxis: "a3",
    lineColor: "#ff5755",
    balloonText: "[[title]]: [[value]] bahts",
    lineThickness: 1,
    legendValueText: "[[value]] bahts",
    legendFunction: function(item, graph) {
      var result = graph.balloonText;
      for (var key in item.dataContext) {
        if (item.dataContext.hasOwnProperty(key) && !isNaN(item.dataContext[key])) {
          var formatted = AmCharts.formatNumber(item.dataContext[key], {
            precision: chart.precision,
            decimalSeparator: chart.decimalSeparator,
            thousandsSeparator: chart.thousandsSeparator
          }, 2);
          result = result.replace("[[" + key + "]]", formatted);
        }
      }
      return result;
    },
    bullet: "square",
    bulletBorderColor: "#ff5755",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
    animationPlayed: true
  }],

  chartCursor: {
    zoomable: false,
    categoryBalloonDateFormat: "DD",
    cursorAlpha: 0,
    valueBalloonsEnabled: false
  },
  legend: {
    bulletType: "round",
    equalWidths: false,
    valueWidth: 120,
    useGraphSettings: true,
    color: "#000000"
  }
});
  </script>



      
<style>
#chartdiv {
    width   : 100%;
  height    : 500px;
}

.amcharts-graph-g2 .amcharts-graph-stroke {
  stroke-dasharray: 3px 3px;
  stroke-linejoin: round;
  stroke-linecap: round;
  -webkit-animation: am-moving-dashes 1s linear infinite;
  animation: am-moving-dashes 1s linear infinite;
}

@-webkit-keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -31px;
  }
}
@keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -31px;
  }
}


.lastBullet {
  -webkit-animation: am-pulsating 1s ease-out infinite;
  animation: am-pulsating 1s ease-out infinite;
}
@-webkit-keyframes am-pulsating {
  0% {
    stroke-opacity: 1;
    stroke-width: 0px;
  }
  100% {
    stroke-opacity: 0;
    stroke-width: 50px;
  }
}
@keyframes am-pulsating {
  0% {
    stroke-opacity: 1;
    stroke-width: 0px;
  }
  100% {
    stroke-opacity: 0;
    stroke-width: 50px;
  }
}

.amcharts-graph-column-front {
  -webkit-transition: all .3s .3s ease-out;
  transition: all .3s .3s ease-out;
}
.amcharts-graph-column-front:hover {
  fill: #496375;
  stroke: #496375;
  -webkit-transition: all .3s ease-out;
  transition: all .3s ease-out;
}

.amcharts-graph-g3 {
  stroke-linejoin: round;
  stroke-linecap: round;
  stroke-dasharray: 500%;
  stroke-dasharray: 0 \0/;    /* fixes IE prob */
  stroke-dashoffset: 0 \0/;   /* fixes IE prob */
  -webkit-animation: am-draw 10s;
  animation: am-draw 10s;
}
@-webkit-keyframes am-draw {
    0% {
        stroke-dashoffset: 500%;
    }
    100% {
        stroke-dashoffset: 0px;
    }
}
@keyframes am-draw {
    0% {
        stroke-dashoffset: 500%;
    }
    100% {
        stroke-dashoffset: 0px;
    }
}
/* OVERWRITE OUR MAIN STYLE */
.demo-flipper-front.demo-panel-white, body {
  background-color: #161616;  
}               
}
       
</style>

