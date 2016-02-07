@extends('layouts.app')   
 
    @section('extra-head')

        <link rel="stylesheet" href="{{Request::root()}}/vendor/bootstrap-calendar/css/calendar.css">
        
    @endsection
    
    @section('content')  
    
    
        <div class="row calendar">
            <div class="col-sm-12">
                <div class="pull-right form-inline">
                    <div class="btn-group">
                        <button class="btn" data-calendar-nav="prev"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn" data-calendar-nav="today">Aujourd'hui</button>
                        <button class="btn" data-calendar-nav="next"><i class="fa fa-arrow-right"></i></button>
                    </div>
                    <div class="btn-group">
                        <button class="btn" data-calendar-view="year">Année</button>
                        <button class="btn active" data-calendar-view="month">Mois</button>
                        <button class="btn" data-calendar-view="week">Semaine</button>
                        <button class="btn" data-calendar-view="day">Jour</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="calendar"></div>
            </div>
        </div>

    @endsection

    @section('extra-js')
        
       

        <script type="text/javascript" src="{{Request::root()}}/vendor/underscore/underscore.min.js"></script>
        <script type="text/javascript" src="{{Request::root()}}/vendor/bootstrap-calendar/js/calendar.min.js"></script>
        <script type="text/javascript" src="{{Request::root()}}/vendor/bootstrap-calendar/js/language/fr-FR.js"></script>
        
         <script type="text/javascript">
            var calendar = $("#calendar").calendar(
                {
                    tmpl_path: baseURL+"vendor/bootstrap-calendar/tmpls/",
                    language: 'fr-FR',
                    events_source: function () {
                        
                        return  [
                            {
                                "id": 293,
                                "title": "Soirée",
                                //"url": "#",
                                "class": "event-party",
                                "start": 1454877519000, // Milliseconds
                                "end": 1454877559000 // Milliseconds
                            },
                            {
                                "id": 294,
                                "title": "Cours",
                                //"url": "#",
                                "class": "event-school",
                                "start": 1454877519000, // Milliseconds
                                "end": 1454877559000 // Milliseconds
                            },
                            {
                                "id": 294,
                                "title": "Cours",
                                //"url": "#",
                                "class": "event-game",
                                "start": 1454877519000, // Milliseconds
                                "end": 1454877559000 // Milliseconds
                            }
                           
                        ];
                    
                    }
                });  
                
            $('.btn-group button[data-calendar-nav]').each(function() {
                var $this = $(this);
                $this.click(function() {
                    calendar.navigate($this.data('calendar-nav'));
                });
            });
            
            $('.btn-group button[data-calendar-view]').each(function() {
                var $this = $(this);
                $this.click(function() {
                    calendar.view($this.data('calendar-view'));
                    $('.btn-group button[data-calendar-view]').removeClass('active');
                    $(this).addClass('active');
                    
                });
            });
        </script>
        
    @endsection