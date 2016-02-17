@extends('layouts.app')   
 
    @section('extra-head')

         <link href="{{Request::root()}}/vendor/fullcalendar/fullcalendar.css" rel="stylesheet">
         <link href="{{Request::root()}}/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        
    @endsection
    
    @section('content')  
    
    
        <div class="row calendar">
            
            <div class="col-sm-12">
                <div id="calendar-widget"></div>
            </div>
        </div>

    @endsection

    @section('extra-js')
        
      
            <script src="{{Request::root()}}/vendor/fullcalendar/lib/moment.min.js"></script>
            <script src="{{Request::root()}}/vendor/fullcalendar/fullcalendar.min.js"></script>
            <script src='{{Request::root()}}/vendor/fullcalendar/fr.js'></script>
                       
            
            <script type="text/javascript">
                
                $(document).ready(function(){
                    
                
                        

                
            
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
                        editable: false,
                        nowIndicator: true,
                        
                        
                        
                        
                        
                        
                        events: '{{route("events")}}'
         
                    }); 
                    
           });      
    
    </script>

        
        
    @endsection