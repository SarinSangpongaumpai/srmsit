

<script type="text/javascript" src="http://www.amcharts.com/lib/3/amstock.js"></script>
           
   <script type="text/javascript">
          /**
 * Prepare random data for our data sets
 */


var chart2 = AmCharts.makeChart("chartdiv2", {
    type: "stock",
    theme: "none",
    pathToImages: "http://www.amcharts.com/lib/3/images/",
    startDuration: 2,
     amExport:{
                 top:21,
                  right:20,
                  exportJPG:true,
                  exportPNG:true,
                  exportSVG:true
                },
    panels: [{

        showCategoryAxis: false,
        title: "Value",
        percentHeight: 70,
      

        stockGraphs: [{
            id: "g1",
            valueField: "student",
            comparable: true,
            compareField: "student",
            balloonText: "[[title]]:<b>[[student]]</b>",
            compareGraphBalloonText: "[[title]]:<b>[[student]]</b>"
        }],

        stockLegend: {
            periodValueTextComparing: "[[percents.value.close]]%",
            periodValueTextRegular: "[[value.close]]"
        }
    }],

    chartScrollbarSettings: {
        graph: "g1"
    },

    chartCursorSettings: {
        valueBalloonsEnabled: true,
        fullWidth: true,
        cursorAlpha: 0.1,
        valueLineBalloonEnabled: true,
        valueLineEnabled: true,
        valueLineAlpha: 0.5
    },

    periodSelector: {
        position: "left",
        periods: [{
            period: "MM",
            selected: true,
            count: 1,
            label: "1 month"
        }, {
            period: "YYYY",
            count: 1,
            label: "1 year"
        }, {
            period: "YTD",
            label: "YTD"
        }, {
            period: "MAX",
            label: "MAX"
        }]
    },

    dataSetSelector: {
        position: "left"
    }
});

    var dataSet = new AmCharts.DataSet();
                //dataSet.dataProvider = chartData2;
                $.getJSON("data",  function (data) {
                    dataSet.dataProvider = data;  
                    //chart.dataDateFormat = "YYYY-DD-MM"; 
                    chart2.validateData();
                });
                dataSet.title = "Applicants";
                dataSet.fieldMappings = [{fromField:"student", toField:"student"}];   
                dataSet.categoryField = "date";          
           

    var dataSet2 = new AmCharts.DataSet();
                //dataSet.dataProvider = chartData2;
                $.getJSON("data",  function (data) {
                    dataSet2.dataProvider = data;  
                    //chart.dataDateFormat = "YYYY-DD-MM"; 
                    chart2.validateData();
                });
                dataSet2.title = "Applicantss";
                dataSet2.fieldMappings = [{fromField:"student", toField:"student"}];   
                dataSet2.categoryField = "date";          
                chart2.dataSets = [dataSet,dataSet2];

/*
var stock1;
var stock2 = [];

generateChartData();

function generateChartData() {
 stock1 = new AmCharts.DataSet();
                //dataSet.dataProvider = chartData2;
                $.getJSON("data",  function (data) {
                    //dataSet.dataProvider = data;  
                    stock1 = data;
                });
}
*/
    </script>

    
