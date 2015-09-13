
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>      
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/exporting/amexport_combined.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script>;
  var chart;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReport/schoolpieChart?Place=<?php 
                echo $place ?>",  function (data) {
        chart.dataProvider = data; 
        chart.validateData();
      });
    });
        var chart = AmCharts.makeChart("pieChart", {
          "type": "pie",
          "startDuration": 0,
           "theme": "light",
          "addClassNames": true,
          "legend":{
            "title":"(Participants)",
            "position":"bottom",
            "autoMargins":true
          },
          "innerRadius": "30%",
          "defs": {
            "filter": [{
              "id": "shadow",
              "feOffset": {
                "result": "offOut",
                "in": "SourceAlpha",
                "dx": 0,
                "dy": 0
              },
              "feGaussianBlur": {
                "result": "blurOut",
                "in": "offOut",
                "stdDeviation": 5
              },
              "feBlend": {
                "in": "SourceGraphic",
                "in2": "blurOut",
                "mode": "normal"
              }
            }]
          },
          //"dataProvider": [{"type":"Camp","student":"0"},{"type":"OpenHouse","student":"1"},{"type":"WIP","student":"0"}],
          "valueField": "student",
          "titleField": "type",
          "export": {
            "enabled": true
          }
        });

        chart.addListener("init", handleInit);

        chart.addListener("rollOverSlice", function(e) {
          handleRollOver(e);
        });

        function handleInit(){
          chart.legend.addListener("rollOverItem", handleRollOver);
        }

        function handleRollOver(e){
          var wedge = e.dataItem.wedge.node;
          wedge.parentNode.appendChild(wedge);  
        }

  </script>

  <script>;
  var columnChart;
             
             $(document).ready(function(){
               $.getJSON("<?php echo base_url() ?>summaryReport/schoolcolumnChart?Place=<?php 
                echo $place ?>",  function (data) {
                    columnChart.dataProvider = data;   
                    var numberEvent = "<?php echo $distinctEvent; ?>"
                    colorSet(numberEvent);
                    columnChart.validateData();
                });

             });


        
            var columnChart = AmCharts.makeChart("columnChart", {
                theme: "none",
                startDuration: 1,
                type: "serial",
                //dataProvider: chartData,
                categoryField: "type",
                depth3D: 30,
                angle: 30,

                categoryAxis: {
                    labelRotation: 90,
                    gridPosition: "start"
                },

                valueAxes: [{
                    position: "left",
                    title: "Students"
                }],

                graphs: [{
                    balloonText: "[[category]]: <b>[[value]]</b>",
                    valueField: "student",
                    colorField: "color",
                    type: "column",
                    lineAlpha: 0.1,
                    fillAlphas: 1
                }],

                chartCursor: {
                    cursorAlpha: 0,
                    zoomable: false,
                    categoryBalloonEnabled: false
                },
                pathToImages:"http://www.amcharts.com/lib/3/images/",
                amExport:{
                  top:21,
                  right:20,
                  exportJPG:true,
                  exportPNG:true,
                  exportSVG:true
                }

            });
            jQuery('.chart-input').off().on('input change',function() {
                var property    = jQuery(this).data('property');
                var target      = chart;
                columnChart.startDuration = 0;

                if ( property == 'topRadius') {
                    target = columnChart.graphs[0];
                    if ( this.value == 0 ) {
                      this.value = undefined;
                    }
                }

                target[property] = this.value;
                columnChart.validateNow();
            });

            function colorSet(row){
              if(row.localeCompare("0"))  columnChart.dataProvider[0].color = "#FF0F00";   
              if(row.localeCompare("1"))  columnChart.dataProvider[1].color = "#FF9E01";
              if(row.localeCompare("2"))  columnChart.dataProvider[2].color = "#F8FF01";
              if(row.localeCompare("3"))  columnChart.dataProvider[3].color = "#04D215";
              if(row.localeCompare("4"))  columnChart.dataProvider[4].color = "#0D8ECF";
              if(row.localeCompare("5"))  columnChart.dataProvider[5].color = "#2A0CD0";
              if(row.localeCompare("6"))  columnChart.dataProvider[6].color = "#CD0D74";
              if(row.localeCompare("7"))  columnChart.dataProvider[7].color = "#DDDDDD";
              if(row.localeCompare("8"))  columnChart.dataProvider[8].color = "#333333";
            }   
  </script>

  <script>;
  var successionChart;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReport/schoolsuccessChart?Place=<?php 
                echo $place ?>",  function (data) {
        successionChart.dataProvider = data; 
        successionChart.validateData();
      });
    });
        var successionChart = AmCharts.makeChart("successionChart", {
          "type": "pie",
          "startDuration": 0,
           "theme": "light",
          "addClassNames": true,
          "legend":{
            "title":"(Students)",
            "position":"bottom",
            "autoMargins":true
          },
          "innerRadius": "30%",
          "defs": {
            "filter": [{
              "id": "shadow",
              "feOffset": {
                "result": "offOut",
                "in": "SourceAlpha",
                "dx": 0,
                "dy": 0
              },
              "feGaussianBlur": {
                "result": "blurOut",
                "in": "offOut",
                "stdDeviation": 5
              },
              "feBlend": {
                "in": "SourceGraphic",
                "in2": "blurOut",
                "mode": "normal"
              }
            }]
          },
          //"dataProvider": [{"type":"Camp","student":"0"},{"type":"OpenHouse","student":"1"},{"type":"WIP","student":"0"}],
          "valueField": "student",
          "titleField": "type",
          "export": {
            "enabled": true
          }
        });

        successionChart.addListener("init", handleInit);

        successionChart.addListener("rollOverSlice", function(e) {
          handleRollOver(e);
        });

        function handleInit(){
          successionChart.legend.addListener("rollOverItem", handleRollOver);
        }

        function handleRollOver(e){
          var wedge = e.dataItem.wedge.node;
          wedge.parentNode.appendChild(wedge);  
        }

  </script>

  <script>;
  var successionChart2;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReport/schoolTotalRegisterChart?Place=<?php 
                echo $place ?>",  function (data) {
        successionChart2.dataProvider = data; 
        successionChart2.validateData();
      });
    });
        var successionChart2 = AmCharts.makeChart("successionChart2", {
          "type": "pie",
          "startDuration": 0,
           "theme": "light",
          "addClassNames": true,
          "legend":{
            "title":"(Students)",
            "position":"bottom",
            "autoMargins":true
          },
          "innerRadius": "30%",
          "defs": {
            "filter": [{
              "id": "shadow",
              "feOffset": {
                "result": "offOut",
                "in": "SourceAlpha",
                "dx": 0,
                "dy": 0
              },
              "feGaussianBlur": {
                "result": "blurOut",
                "in": "offOut",
                "stdDeviation": 5
              },
              "feBlend": {
                "in": "SourceGraphic",
                "in2": "blurOut",
                "mode": "normal"
              }
            }]
          },
          //"dataProvider": [{"type":"Camp","student":"0"},{"type":"OpenHouse","student":"1"},{"type":"WIP","student":"0"}],
          "valueField": "student",
          "titleField": "type",
          "export": {
            "enabled": true
          }
        });

        successionChart2.addListener("init", handleInit);

        successionChart2.addListener("rollOverSlice", function(e) {
          handleRollOver(e);
        });

        function handleInit(){
          successionChart2.legend.addListener("rollOverItem", handleRollOver);
        }

        function handleRollOver(e){
          var wedge = e.dataItem.wedge.node;
          wedge.parentNode.appendChild(wedge);  
        }

  </script>