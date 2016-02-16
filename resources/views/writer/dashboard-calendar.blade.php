@extends('layouts.app')
    @section('extra-head')
        <link href="{{Request::root()}}/vendor/fullcalendar/fullcalendar.css" rel="stylesheet">
         <link href="{{Request::root()}}/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    @endsection
    @section('content')
    
        <div class="col-sm-12 col-md-12 dashboard">
            @include('user.dashboard-menu')
            
            <div class="col-xs-12 col-lg-10 xs-p0">
                
                
                <div class="col-md-12 xs-p0">
                    <div class="content-box-large xs-p0">
                        <div class="panel-heading">
                 
                        </div>
                        
                        <div class="panel-body">
                
                            <div id="calendar-widget"></div>
                
                    </div>
                </div>
                        
                </div>
        </div>
        
        
<!-- Modal -->
        



<div id="new" class="modal" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body">
            <form  id="new-form">
                    <div class="form-group">
                        <label for="name">Nom de l'évenement</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="start">Début</label>
                        
                            <div class='input-group date datetimepicker' id='startpicker'>
                                <input type='text' class="form-control" name="start" id="start" value="" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                    </div>
                    <div class="form-group">
                        <label for="end">Fin</label>
                        
                            <div class='input-group date datetimepicker' id='endpicker'>
                                <input type='text' class="form-control" name="end" id="end" value="" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                    </div>
                    
                    <button type="submit" class="btn btn-default">Valider</button>
                </form>
            </div>
       
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
    </div>

    </div>
</div>



    @endsection

    @section('extra-js')
            <script src="{{Request::root()}}/vendor/fullcalendar/lib/moment.min.js"></script>
            <script src="{{Request::root()}}/vendor/fullcalendar/fullcalendar.min.js"></script>
            <script src='{{Request::root()}}/vendor/fullcalendar/fr.js'></script>
            
            <script src='{{Request::root()}}/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'></script>
            
            
            <script type="text/javascript">
                
                $(document).ready(function(){
                    
                
                        
                    $('.datetimepicker').datetimepicker();
                
            
                    $('#calendar-widget').fullCalendar({
                        contentHeight: 'auto',
                        theme: true,
                        header: {
                            right: 'title',
                            center: 'prev, today, next',
                            left: 'month, agendaWeek, agendaDay'
                        },
                        themeButtonIcons: {
                            prev: ' fa fa-arrow-left',
                            next: ' fa fa-arrow-right',
                            prevYear: 'left-double-arrow',
                            nextYear: 'right-double-arrow'
                        },
                        defaultDate: '2014-06-12',
                        editable: true,
                        
                        dayClick: function(date, jsEvent, view) {

                            console.log('Clicked on: ' + date.format());

                            console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                            console.log('Current view: ' + view.name);

                            // change the day's background color just for fun
                            $(this).css('background-color', 'red');
                            
                            
                            $('#start').val(date.format('MM/DD/YYYY HH:MM'));
                            $('#end').val(date.format('MM/DD/YYYY HH:MM'));
                            $('#new').modal('show');
                            

                        },
                        
                        
                        events: [
                            {
                                title: 'All Day',
                                start: '2014-06-01',
                                className: 'bgm-cyan'
                            },
                            {
                                title: 'Long Event',
                                start: '2014-06-07',
                                end: '2014-06-10',
                                className: 'bgm-orange'
                            },
                            {
                                id: 999,
                                title: 'Repeat',
                                start: '2014-06-09',
                                className: 'bgm-lightgreen'
                            },
                            {
                                id: 999,
                                title: 'Repeat',
                                start: '2014-06-16',
                                className: 'bgm-blue'
                            },
                            {
                                title: 'Meet',
                                start: '2014-06-12',
                                end: '2014-06-12',
                                className: 'bgm-teal'
                            },
                            {
                                title: 'Lunch',
                                start: '2014-06-12',
                                className: 'bgm-gray'
                            },
                            {
                                title: 'Birthday',
                                start: '2014-06-13',
                                className: 'bgm-pink'
                            },
                            {
                                title: 'Google',
                                url: 'http://google.com/',
                                start: '2014-06-28',
                                className: 'bgm-bluegray'
                            }
                        ],
                        
                    
                    });
                    
                $('#new-form').submit(function(e){
                    e.preventDefault();
                    var formValue=$(this).serialize();
                    $.ajax({
                        url: '{{route("add_event")}}',
                        type: 'POST',
                        data: formValue,
                        success: function(data){
                            /*
                            var newEvent = new Object();

                            newEvent.title = "some text";
                            newEvent.start = new Date();
                            newEvent.allDay = false;
                            $('#calendar').fullCalendar( 'renderEvent', newEvent );
                            */
                        }                              
                        
                    });
                    return false;
                });
                    
                    /*
                    var newEvent = new Object();

                    newEvent.title = "some text";
                    newEvent.start = new Date();
                    newEvent.allDay = false;
                    $('#calendar').fullCalendar( 'renderEvent', newEvent );
                    */
           });      
    
    </script>
    @endsection