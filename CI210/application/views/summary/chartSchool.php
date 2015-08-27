<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
	width		: 100%;
	height		: 435px;
	font-size	: 11px;
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
    "europe": 2.5,
    "namerica": 2.5,
    "asia": 2.1,
    "lamerica": 1.2,
    "meast": 0.2,
    "africa": 0.1
  }, {
    "year": 2004,
    "europe": 2.6,
    "namerica": 2.7,
    "asia": 2.2,
    "lamerica": 1.3,
    "meast": 0.3,
    "africa": 0.1
  }, {
    "year": 2005,
    "europe": 2.8,
    "namerica": 2.9,
    "asia": 2.4,
    "lamerica": 1.4,
    "meast": 0.3,
    "africa": 0.1
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
    "title": "Europe",
    "type": "column",
    "color": "#000000",
    "valueField": "europe"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "North America",
    "type": "column",
    "color": "#000000",
    "valueField": "namerica"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Asia-Pacific",
    "type": "column",
    "newStack": true,
    "color": "#000000",
    "valueField": "asia"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Latin America",
    "type": "column",
    "color": "#000000",
    "valueField": "lamerica"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Middle-East",
    "type": "column",
    "color": "#000000",
    "valueField": "meast"
  }, {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Africa",
    "type": "column",
    "color": "#000000",
    "valueField": "africa"
  } ],
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



