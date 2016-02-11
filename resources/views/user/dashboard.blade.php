@extends('layouts.app')
    @section('extra-head')
        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    @endsection
    @section('content')
        <div class="col-sm-12 col-md-12 dashboard">
            <aside class="col-xs-12 col-lg-2 content-box-large">
                <ul class="nav">
                    
                    
                        <li class="current"><a href="#"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
                        <li><a href="#"><i class="fa fa-user"></i>Profil</a></li>
                        <li><a href="#"><i class="fa fa-graduation-cap"></i>Cours</a></li>
                        @if($right>0)
                            @include('writer.dashboard-menu')
                        @endif
                        
                   
                            
                    </ul>
                
            </aside>
            <div class="col-xs-12 col-lg-10 xs-p0">
                
                
                <div class="col-md-12 xs-p0">
                    <div class="content-box-large xs-p0">
                        <div class="panel-heading">
                            <button id="toggle-edit" data-state="disabled" class="button-edit" type="button"><i class="fa fa-pencil"></i></button>
                        </div>
                        
                        <div class="panel-body">
                        <div class="details">
                                <div class="col-sm-12 xs-p0">
                                
                                    <div class="col-xs-12 col-sm-4 text-center  pull-right">                        
                                        <figure>
                                            <div class="col-sm-12 col-md-12 col-lg-12  profile-pic-wrapper">
                                                <img src="{{Request::root()}}/upload/user/default.png" class="img-responsive">   
                                            </div>                               
                                                    
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        
                                        <h2><a href="#" class="editable" data-type="text" id="firstname" data-title="{{$user->firstname}}">{{$user->firstname}}</a> <a href="#" class="editable" data-type="text" id="name"  data-title="{{$user->name}}">{{$user->name}}</a> @if($user->right==2)(Administrateur)@endif @if($user->right==1)(Rédacteur)@endif</h2>
                                        <p><strong>Etablissement: </strong><a href="#" class="editable" data-type="text" id="school"  data-title="{{$user->school}}">{{$user->school}}</a> </p>
                                        <p><strong>Etudes: </strong><a href="#" class="editable" data-type="text" id="level"  data-title="{{$user->level}}">{{$user->level}}</a> </p>
                    
                                        @foreach($skills as $skill)
                                            <div class="skillLine"><div class="skill pull-left">{{$skill->name}}</div><div class="rating" data-name="{{$skill->name}}" data-value="{{$skill->level}}"></div></div>
                                        @endforeach
                                        
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
                        
                </div>
        </div>



    @endsection

    @section('extra-js')

        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        

        <script type="text/javascript">
        $(document).ready(function() {
            
            //stars
            $('.rating').each(function(){
                var val=$(this).data('value');
                $(this).shieldRating({
                    max: 7,
                    step: 1,
                    value: val,
                    markPreset: false,
                     events: {
                        change: function (e) { 
                            var star=e.target;
                          
                            data=JSON.parse('{"star": '+true+', "value": '+star.value()+', "name": "'+$(star.element).data('name')+'"}');
                           
                            $.ajax({
                                url: '{{route("edit")}}',
                                type: 'PUT',
                                data: data,                              
                                
                            });
                        }
                    }
                });
                $(this).swidget().enabled(false);
            
            })
           
            
            
            //editable 
            $.fn.editable.defaults.mode = 'popup';
            $.fn.editable.defaults.ajaxOptions = {
                type: 'put',
                    dataType: 'json',
                    url: '{{route("edit")}}',
                   
            };
            $.fn.editable.defaults.send= 'always';
           
            $('.editable').each(function(){
                
                $(this).editable({
                    url: '{{route("edit")}}',
                    defaultValue: 'Vide',
                    error: function(response, newValue) {
                        if(response.status === 500) {
                            return 'Service non disponible.';
                        } else {
                            return response.responseText;
                        }
                    }
                });  
                $(this).editable("disable");    
            });
           
            
            
            
            
            
             //enable / disable
            $('#toggle-edit').click(function() {
                if($(this).data('state')=='disabled'){
                    $('.editable').editable("enable");  
                    $('.rating').each(function(){              
                        $(this).swidget().enabled(true);
                    });
                    $(this).data('state','enabled');
                    $(this).find('i').removeClass('fa-pencil');
                    $(this).find('i').addClass('fa-times');
                }else{
                    $('.editable').editable("disable");                
                    $('.rating').each(function(){              
                        $(this).swidget().enabled(false);
                    });
                    $(this).data('state','disabled');
                    $(this).find('i').addClass('fa-pencil');
                    $(this).find('i').removeClass('fa-times');
                }
                
                
            }); 
            
            
            
            
        });
        </script>
    @endsection