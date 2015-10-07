
    <link href="../plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Calendar
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <div class="row">
 
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body no-padding" >
                  <!-- THE CALENDAR -->
                  <div id="calendar" ></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="https://www4.sit.kmutt.ac.th/">SIT's SRM</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../js/app.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../js/demo.js" type="text/javascript"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script src="../plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- Page specific script -->
    <script src="<?php echo base_url()?>js/bootbox/bootbox.min.js"></script>
    <script type="text/javascript">
      
      
      $(function () {

        function ini_events(ele) {
          ele.each(function () {
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();

        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: '<?php echo base_url('calendar/data');?>',
          editable: true,
          eventRender: function(event, element, view) {
          if (event.allDay === 'true') {
           event.allDay = true;
          } else {
           event.allDay = false;
          }
         },
         selectable: true,
         selectHelper: true,
         select: function(start, end, allDay) {
           bootbox.dialog({
                title: "รายละเอียดกิจกรรม",
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">ชื่อกิจกรรม</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="title" name="title" type="text" placeholder="Example JPC11" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">รูปแบบ</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="type" name="type" type="text" placeholder="Event type" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">สถานที่</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="place" name="place" type="text" placeholder="Event " class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">งบประมาณ(บาท)</label> ' +
                    '<br><div class="col-md-6"> ' +
                    '<input id="budget" name="budget" type="text" placeholder="100 " class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">จำนวนผู้เข้าร่วม</label> ' +
                    '<br><div class="col-md-6"> ' +
                    '<input id="expectPeople" name="expectPeople" type="text" placeholder="100 " class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">วันเริ่มต้น - วันสิ้นสุด</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="Show" name="Show" type="text" readonly value="'+$.fullCalendar.moment(start).format()+'   -   '+$.fullCalendar.moment(end).format()+'" class="form-control input-md"> ' +
                    '<br></div>' +
                    '<div class="col-md-6" style="display: none;"> ' +
                    '<input id="start" name="start" type="text" value="'+$.fullCalendar.moment(start).format()+'" class="form-control input-md"> ' +
                    '<br></div>' +
                    '<div class="col-md-6" style="display: none;"> ' +
                    '<input id="end" name="end" type="text" value="'+$.fullCalendar.moment(end).format()+'" class="form-control input-md"> ' +
                    '</div></div> ' +
                    '</form> </div></div>',
                buttons: {
                    close: {
                        label: "Close",
                        className: "btn btn-default pull-left",
                        callback: function () {
                        }
                    },
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            $.ajax({
                               url: '<?php echo base_url('calendar/addEvent');?>',
                               data: 'title='+ $('#title').val() +'&start='+ $('#start').val() +'&end='+ $('#end').val() +'&type='+ $('#type').val() +'&place='+ $('#place').val() +'&budget='+ $('#budget').val() +'&expectPeople='+ $('#expectPeople').val()  ,
                               type: "POST",
                               success: function(json) {
                               $('#calendar').fullCalendar('renderEvent',
                               {
                               title: $('#title').val(),
                               start: start,
                               end: end,
                               allDay: allDay
                               },
                               true // make the event "stick"
                               );
                               $('#calendar').fullCalendar('unselect');
                               window.location.assign("<?php base_url()?>index")
                             }
                           });
                        }
                    }
                }
            }
        ); 
         },
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          },
          eventClick: function(event,start, end, allDay) {
          bootbox.dialog({
                title: "แก้ไขกิจกรรม",
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">ชื่อกิจกรรม</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="title" name="title" type="text" value="'+event.title+'" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">รูปแบบ</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="type" name="type" type="text" value="'+event.type+'" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">สถานที่</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="place" name="place" type="text" value="'+event.place+'" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">งบประมาณ(บาท)</label> ' +
                    '<br><div class="col-md-6"> ' +
                    '<input id="budget" name="budget" type="text" value="'+event.budget+'" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">จำนวนผู้เข้าร่วม</label> ' +
                    '<br><div class="col-md-6"> ' +
                    '<input id="expectPeople" name="expectPeople" type="text" value="'+event.expectPeople+'" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">วันเริ่มต้น</label> ' +
                    '<br><div class="col-md-6"> ' +
                    '<input id="start" name="start" type="text" value="'+$.fullCalendar.moment(event.start).format()+'" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '<label class="col-md-4 control-label" for="name">วันสิ้นสุด</label> ' +
                    '<br><div class="col-md-6"> ' +
                    '<input id="end" name="end" type="text" value="'+$.fullCalendar.moment(event.end).format()+'" class="form-control input-md"> ' +
                    '</div></div> ' +
                    '<div class="col-md-6" style="display:none"> ' +
                    '<input id="eventID" name="eventID" type="text" value="'+event.id+'" class="form-control input-md"> ' +
                    '<br></div> ' +
                    '</form> </div>  </div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            $.ajax({
                               url: '<?php echo base_url('calendar/editEvent');?>',
                               data: 'eventID='+ $('#eventID').val() + '&title='+ $('#title').val()+'&start='+ $('#start').val() +'&end='+ $('#end').val() +'&type='+ $('#type').val() +'&place='+ $('#place').val() +'&budget='+ $('#budget').val() +'&expectPeople='+ $('#expectPeople').val()  ,
                               type: "POST",
                               success: function(json) {
                               alert('Edit Successfully');
                               window.location.assign("<?php base_url()?>index")
                             }
                           });
                        }
                    },
                    close: {
                        label: "Close",
                        className: "btn btn-default pull-left",
                        callback: function () {
                        }
                    },
                danger: {
                    label: "Delete",
                    className: "btn-danger",
                    callback: function() {
                      bootbox.dialog({
                        title: "Confirm Delete",
                        message: '<div class="row"><div class="col-md-6">'+ event.title +
                        ' will be delete</div></div> ',
                        buttons: {
                          confirm: {
                            label: "Confirm",
                            className: "btn-primary",
                            callback: function () {
                              $.ajax({
                              type: "POST",
                              url: '<?php echo base_url('calendar/removeEvent');?>',

                              data: "&id=" + event.id
                              });
                              $('#calendar').fullCalendar('removeEvents', event.id);
                            }
                          },
                          close: {
                              label: "Close",
                              className: "btn btn-default pull-left",
                              callback: function () {
                              }
                          },
                          success: {
                            label: "Cancel",
                            className: "btn-primary",
                            callback: function () {
                            }
                          }
                        }
                      });
                    }
                  }
                }
            }
        ); 
          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>


  </body>
</html>
