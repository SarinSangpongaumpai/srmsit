
      <!-- Right side column. Contains the navbar and content of the page -->
      <body class="bg-black">
       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Summary Report
            <small>Version 0.5</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index23.html"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>

        <section class="content">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Top 10 High School that have highest student who study in this faculty</h3>
                  <div class="box-tools pull-right">
                    
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">  
                        <li><a href="pages/tables/data.html">Table</a></li>
                        <li><a href="#">Separated Year</a></li>
                        <li><a href="#">Separated Round</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Change School</a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <!-- AmChart-->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>From: 1 Jan, 2014 - 30 Jul, 2014</strong>
                      </p>
                       <body>
                          <div id="chartdiv" style="width: 100%; height: 350px;"></div>
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
                       </body>

                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Goal Completion(Student Registration)</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">RoadShow</span>
                        <span class="progress-number"><b>40</b>/200</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">OpenHouse</span>
                        <span class="progress-number"><b>40</b>/400</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 10%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">JPC Camp</span>
                        <span class="progress-number"><b>10</b>/80</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 12.5%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">WIP Camp</span>
                        <span class="progress-number"><b>20</b>/120</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 25%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-2 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-red"><i class="fa fa-caret"></i> 45%</span>
                        <h5 class="description-header">50</h5>
                        <span class="description-text">Total Male</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-2 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret"></i> 55%</span>
                        <h5 class="description-header">60</h5>
                        <span class="description-text">Total Female</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-2 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-red"><i class="fa fa-caret"></i> 20%</span>
                        <h5 class="description-header">30</h5>
                        <span class="description-text">Total CS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-2 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-green"><i class="fa fa-caret"></i> 80%</span>
                        <h5 class="description-header">80</h5>
                        <span class="description-text">Total IT</span>
                      </div><!-- /.description-block -->
                    </div>
                    <div class="col-sm-2 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-green"><i class="fa fa-caret"></i> 50%</span>
                        <h5 class="description-header">60</h5>
                        <span class="description-text">Science-Math Program</span>
                      </div><!-- /.description-block -->
                    </div>
                    <div class="col-sm-2 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-red"><i class="fa fa-caret"></i> 40%</span>
                        <h5 class="description-header">50</h5>
                        <span class="description-text">Another Program</span>
                      </div><!-- /.description-block -->
                    </div>
        </section>


<!-- Stock chart/-->
<section class="content">
            <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Top 10 High School that have highest student who study in this faculty</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">  
                        <li><a href="pages/tables/data.html">Table</a></li>
                        <li><a href="#">Separated Year</a></li>
                        <li><a href="#">Separated Round</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Change School</a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                       


                       <body>
                         <div id="chartdiv2" style="min-width: 1000px; height: 400px; margin: 0 auto">
                          <div class="loading-data">Loading data...</div>
                        </div>                    
                      </body>

                    </div><!-- /.col -->
                 </div>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </section>
      </div><!-- /.content-wrapper -->