<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</div>
<div id="chartdiv"></div>
<div class="container-fluid">
  <div class="row text-center" style="overflow:hidden;">
    <div class="col-sm-3" style="float: none !important;display: inline-block;">
      <label class="text-left">Angle:</label>
      <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>  
    </div>

    <div class="col-sm-3" style="float: none !important;display: inline-block;">
      <label class="text-left">Depth:</label>
      <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="20" step="1"/>
    </div>
  </div>
</div>                                  
<style>
#chartdiv {
  width   : 100%;
  height    : 435px;
  font-size : 11px;
}                     
</style>
<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "theme": "light",
  "path": "http://www.amcharts.com/lib/3/",
  "depth3D": 20,
  "angle": 30,
  "legend": {
    "horizontalGap": 10,
    "useGraphSettings": true,
    "markerSize": 10
  },
  "dataProvider": [ {
    "year": 2003,
    "JPC": 4,
    "WIP": 5,
    "Addmission": 120,
    "ActiveRecruitment": 15,
    "ClearingHouse": 30,
  }, {
    "year": 2004,
    "JPC": 8,
    "WIP": 14,
    "Addmission": 180,
    "ActiveRecruitment": 35,
    "ClearingHouse": 34,
  }, {
    "year": 2005,
    "JPC": 11,
    "WIP": 10,
    "Addmission": 160,
    "ActiveRecruitment": 11,
    "ClearingHouse": 32,
  } ],
  "valueAxes": [ {
    "stackType": "regular",
    "axisAlpha": 0,
    "gridAlpha": 0
  } ],
  "graphs": [ {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "JPC",
    "type": "column",
    "color": "#000000",
    "valueField": "JPC"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "WIP Camp",
    "type": "column",
    "color": "#000000",
    "valueField": "WIP"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Addmission",
    "type": "column",
    "newStack": true,
    "color": "#000000",
    "valueField": "Addmission"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "ActiveRecruitment",
    "type": "column",
    "color": "#000000",
    "valueField": "ActiveRecruitment"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "ClearingHouse",
    "type": "column",
    "color": "#000000",
    "valueField": "ClearingHouse"
  }],
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "gridAlpha": 0,
    "position": "left"
  },
  "export": {
    "enabled": true
  }

} );
jQuery( '.chart-input' ).off().on( 'input change', function() {
  var property = jQuery( this ).data( 'property' );
  var target = chart;
  chart.startDuration = 0;

  if ( property == 'topRadius' ) {
    target = chart.graphs[ 0 ];
    if ( this.value == 0 ) {
      this.value = undefined;
    }
  }

  target[ property ] = this.value;
  chart.validateNow();
} );
</script>



