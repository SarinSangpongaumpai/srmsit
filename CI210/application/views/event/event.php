
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
              <div class="tab-content">
                  <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col"></div><!-- /.col -->
                      <div class="col-md-6 invoice-col">
                        <?php echo form_open('event/listEvent'); ?>
                        <div class="form-group">
                          <label>Min Cost (bahts)</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa  fa-btc"></i>
                             </div>
                            <input class="form-control input-sm" id="mincost" name="mincost" type="number"/>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                          <label>Max Cost (bahts)</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa  fa-btc"></i>
                             </div>
                            <input class="form-control input-sm" id="maxcost" name="maxcost" type="number"/>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->        
                        <div class="form-group">
                          <label>Duration(days)</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa  fa-clock-o"></i>
                             </div>
                            <input class="form-control input-sm" id="duration" name="duration" type="number"/>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->  
                        <div class="form-group">
                          <label>Start</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa  fa-calendar"></i>
                             </div>
                            <input class="form-control input-sm" id="start" name="start" type="date"/>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->  
                        <div class="form-group">
                          <label>End</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa  fa-calendar"></i>
                             </div>
                            <input class="form-control input-sm" id="end" name="end" type="date"/>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group" style="text-align:center">
                          <button type="submit" class="btn btn-primary">Submit</button>                                          
                        </div>
                     </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div><!-- /.content-wrapper -->