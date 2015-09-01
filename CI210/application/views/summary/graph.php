 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
             <div class="col-md-5">   
                <div class="box box-primary">
                  <div class="box-body" >
                    <div style="margin-left:16%;width:68% ">
                      <img  style="width:100%;"src='../img/schoolLogo/ACBK.png' >
                    </div>
                    <ul class="products-list product-list-in-box">        
                      <div style="text-align:center;">
                        <a href="javascript::;" class="product-title">ACBK
                          </ul>
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->




            <section class="col-lg-7 connectedSortable">

              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#chartdiv" data-toggle="tab">PieChart</a></li>
                  <li><a href="#sales-chart" data-toggle="tab">ColumnChart</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="chartdiv" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                </div>
              </div><!-- /.nav-tabs-custom -->

           
            </section><!-- /.Left col -->
            <section >
             <div class="row">
             <div class="col-md-5">   
                <div class="box box-primary">
                  <div class="box-body" >
                    <div style="margin-left:16%;width:68% ">
                      <img  style="width:100%;"src='../img/schoolLogo/ACBK.png' >
                    </div>
                    <ul class="products-list product-list-in-box">        
                      <div style="text-align:center;">
                        <a href="javascript::;" class="product-title">ACBK
                          </ul>
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->
              <div class = "col-md-7">
                  <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#chartdiv" data-toggle="tab">PieChart</a></li>
                  <li><a href="#sales-chart" data-toggle="tab">ColumnChart</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>เพศ</th>
                          <th style="text-align:center">จำนวน(คน)</th>
                        </tr>
                      </thead>
                      <?php if(isset($Gender)){
                        foreach($Gender as $gender){
                      ?>
                      <tbody>
                        <tr>
                          <td><?= $gender->gender;?></td>
                          <td style="text-align:center"><?= $gender->number;?></td>
                        </tr>  
                      </tbody>
                      <?php }
                      }
                      else{
                      ?>
                        <tr>
                        <td>- </td>
                        </tr>
                      <?php
                      }
                      ?>   <!-- for each-->
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.nav-tabs-custom -->
              </div>
            </section>

      </div><!-- /.content-wrapper -->



<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>      
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/pie.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script>;
  var chart;            
    $(document).ready(function(){
      $.getJSON("pieChart",  function (data) {
        chart.dataProvider = data; 
        chart.validateData();
      });
    });


        var chart = AmCharts.makeChart("chartdiv", {
          "type": "pie",
          "startDuration": 0,
           "theme": "light",
          "addClassNames": true,
          "legend":{
            "title":"(Number of student)",
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
                                                  
<style type="text/css">

.amcharts-pie-slice {
  transform: scale(1);
  transform-origin: 50% 50%;
  transition-duration: 0.3s;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  -o-transition: all .3s ease-out;
  cursor: pointer;
  box-shadow: 0 0 30px 0 #000;
}

.amcharts-pie-slice:hover {
  transform: scale(1.1);
  filter: url(#shadow);
}  
.amcharts-legend-div {
  overflow-y: auto!important;
  max-height: 300px;
}           
</style>























      
