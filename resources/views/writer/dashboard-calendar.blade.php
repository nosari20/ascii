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
                        <input type="text" class="form-control" id="name" name="title" required>
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
                        defaultDate: new Date(),
                        editable: true,
                        nowIndicator: true,
                        
                        dayClick: function(date, jsEvent, view) {

                           
                            
                            $('#start').val(date.format('DD/MM/YYYY HH:MM'));
                            $('#end').val(date.format('DD/MM/YYYY HH:MM'));
                            $('#new').modal('show');
                            

                        },
                        eventResize: function(event, delta, revertFunc) {

                            data=new Object();
                            data.title=event.title;
                            data.start=event.start.format('MM/DD/YYYY HH:MM');
                            data.end=event.end.format('MM/DD/YYYY HH:MM');
                            data.id=event.id;
                            console.log(event);
                            
                            $.ajax({
                                url: '{{route("mod_event")}}',
                                type: 'PUT',
                                data: data,
                                success: function(data){
                                    /*
                                    if(data.response!='ok'){
                                        //revertFunc();
                                    }
                                    */
                                    
                                    
                                }                              
                                
                            });

                            
                        },
                        
                        eventDrop: function(event, delta, revertFunc) {

                            data=new Object();
                            data.title=event.title;
                            data.start=event.start.format('MM/DD/YYYY HH:MM');
                            data.end=event.end.format('MM/DD/YYYY HH:MM');
                            data.id=event.id;
                            console.log(event);
                            
                            $.ajax({
                                url: '{{route("mod_event")}}',
                                type: 'PUT',
                                data: data,
                                success: function(data){
                                    /*
                                    if(data.response!='ok'){
                                        //revertFunc();
                                    }
                                    */
                                    
                                    
                                }                              
                                
                            });

                            

                        },
                        
                        
                        events: '{{route("events")}}'
                        
                        
                    
                    });
                    
                $('#new-form').submit(function(e){
                    e.preventDefault();
                    var formValue=$(this).serialize();
                    $.ajax({
                        url: '{{route("add_event")}}',
                        type: 'POST',
                        data: formValue,
                        success: function(data){
                            if(data.response=='ok'){
                            var newEvent = new Object();
                            console.log(moment(data.event.start));
                            
                            console.log(new Date(data.event.start));   
                            
                                 
                            newEvent.title = data.event.title;
                            newEvent.id = data.event.id;
                            newEvent.start = new Date(data.event.start);
                            newEvent.end = new Date(data.event.end);
                            newEvent.allDay = false;
                            $('#calendar-widget').fullCalendar( 'renderEvent', newEvent );
                            }
                            
                            
                        }                              
                        
                    });
                    return false;
                });
                    
                    
           });      
    
    </script>
    @endsection