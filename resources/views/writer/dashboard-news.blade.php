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
                                                <option>Autre</option>
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
                    
                    
        
                        <li>
                            <div class="timeline-badge"><i class="fa fa-gamepad"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-"></i> 11 hours ago via Twitter</small></p>
                                </div>
                                <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="timeline-badge warning"><i class="fa fa-beer"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                                <p>Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</p>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="timeline-badge danger"><i class="fa fa-code"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-"></i> 11 hours ago via Twitter</small></p>
                                </div>
                                <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                                </div>
                            </div>
                        </li>
                        
                        
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