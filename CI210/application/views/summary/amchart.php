 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/exporting/amexport_combined.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>
<script>
            var chart;
             
             $(document).ready(function(){
               $.getJSON("data2",  function (data) {
                    chart.dataProvider = data;   
                    colorSet();
                    chart.validateData();
                });

             });


        
            var chart = AmCharts.makeChart("chartdiv", {
                theme: "none",
                startDuration: 2,
                type: "serial",
                //dataProvider: chartData,
                categoryField: "school",
                depth3D: 20,
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
                chart.startDuration = 0;

                if ( property == 'topRadius') {
                    target = chart.graphs[0];
                    if ( this.value == 0 ) {
                      this.value = undefined;
                    }
                }

                target[property] = this.value;
                chart.validateNow();
            });

            function colorSet(){
                chart.dataProvider[0].color = "#FF0F00";
                chart.dataProvider[1].color = "#FF9E01";
                chart.dataProvider[3].color = "#F8FF01";
                chart.dataProvider[4].color = "#04D215";
                chart.dataProvider[5].color = "#0D8ECF";
                chart.dataProvider[6].color = "#2A0CD0";
                chart.dataProvider[7].color = "#CD0D74";
                chart.dataProvider[8].color = "#DDDDDD";
                chart.dataProvider[9].color = "#333333";
            }

            </script>
                                                  
























      
