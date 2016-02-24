@extends('layouts.app')
    @section('extra-head')
        <link href="{{Request::root()}}/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    @endsection
    @section('content')
    
        <div class="col-sm-12 col-md-12 dashboard">
            @include('user.dashboard-menu')
            
            <div class="col-xs-12 col-lg-10 xs-p0">
                
                <ul class="timeline">
                    
                    
                    
                        <li>
                            <div class="timeline-badge timeline-plus close"><i class="fa fa-plus"></i></div>
                            <div class="timeline-panel content">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Nouvelle actualité</h4>
                                    
                                </div>
                                <div class="timeline-body">
                                    <form  id="new-form">
                                        <div class="form-group">
                                            <label for="name">Titre</label>
                                            <input type="text" class="form-control" id="name" name="title" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="cat">Catégorie</label>
                                            <select class="form-control" id="cat" name="cat">
                                                <option value="gamepad">Jeux video</option>
                                                <option value="graduation-cap">Cours</option>
                                                <option value="beer">Soirée</option>
                                                <option value="random">Autre</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            
                                                <div class='input-group date datetimepicker' id='startpicker'>
                                                    <input type='text' class="form-control" name="date" id="date" value="" required/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>

                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="desc">Texte</label>
                                            <textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
                                        </div>
                                        
                                        

                                        <button type="submit" class="btn btn-default">Valider</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </li>
                    
                    
        
                         @foreach ($news as $new)
                            <li>
                                <div class="timeline-badge {{$new->cat}}"><i class="fa fa-{{$new->cat}}"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">{{$new->title}}</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$new->date}}</small></p>
                                    </div>
                                    <div class="timeline-body">
                                    <p>{{$new->content}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
        
                        
                        
                    </ul>
               
                        
            </div>
        </div>
        
        





    @endsection

    @section('extra-js')
    
            <script src="{{Request::root()}}/vendor/fullcalendar/lib/moment.min.js"></script>
            <script src="{{Request::root()}}/vendor/fullcalendar/lib/moment-fr.js"></script>
            <script src='{{Request::root()}}/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'></script>
             
            
            
            <script type="text/javascript">
                $(document).ready(function(){
 
                   $('.datetimepicker').datetimepicker({
                       format: 'DD/MM/YYYY HH:MM',
                       locale: 'fr',
                   });
                   
                   $('.timeline-plus').click(function(){
                       
                    
                       if($(this).hasClass('close')){
                           
                           $(this).removeClass('close');
                           $(this).addClass('open');
                       }else{
                           
                            $(this).removeClass('open');
                            $(this).addClass('close');
                       }
                       
                   });
                   
                   
                   $('#new-form').submit(function(e){
                    e.preventDefault();
                    var formValue=$(this).serialize();
                   
                    $.ajax({
                        url: '{{route("add_news")}}',
                        type: 'POST',
                        data: formValue,
                        success: function(data){
                            if(data.response=='ok'){
                                $('.timeline-plus').click();
                                
                                var news=$('.timeline li:nth-child(2n+2)').first().clone();
                                
                                $(news).find('.timeline-badge').removeClass().addClass('timeline-badge '+data.news.cat);
                                
                                $(news).find('.timeline-badge i').removeClass().addClass('fa fa-'+data.news.cat);
                                
                                $(news).find('.timeline-title').text(data.news.title);
                                
                                $(news).find('.text-muted').text(data.news.date);
                                
                                $(news).find('.timeline-body p').text(data.news.desc);
                                
                                $(news).prependTo( '.timeline' );
                                
                                $('.timeline li:nth-child(2n+2)').first().prependTo( '.timeline' );
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            }
                            
                        }                              
                        
                    });
                    return false;
                });
                   
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                });
     
    
            </script>
    @endsection