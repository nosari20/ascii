@extends('layouts.app')
    @section('extra-head')
        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    @endsection
    @section('content')
        <div class="row dashboard">
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
            <div class="col-xs-12 col-lg-10">
                
                
                <div class="col-md-12">
                    <div class="content-box-large">
                        
                        <div class="panel-body">
                        <div class="details">
                                <div class="col-sm-12">
                                
                                    <div class="col-xs-12 col-sm-4 text-center  pull-right">                        
                                        <figure>
                                            <div class="col-sm-12 col-md-12 col-lg-12  profile-pic-wrapper">
                                                <img src="{{Request::root()}}/upload/user/default.png" class="img-responsive">   
                                            </div>                               
                                                    
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        <a href="#" data-type="text" data-pk="1" data-url="" data-title="{{$user->firstname}}"></a>
                                        <h2><a href="#" class="editable" data-type="text" data-pk="1" data-url="" data-title="{{$user->firstname}}">{{$user->firstname}}</a> <a href="#" class="editable" data-type="text" data-pk="1" data-url="" data-title="{{$user->name}}">{{$user->name}}</a> @if($user->right==2)(Administrateur)@endif @if($user->right==1)(Rédacteur)@endif</h2>
                                        <p><strong>Etablissement: </strong>{{$user->school}} </p>
                                        <p><strong>Etudes: </strong>{{$user->level}} </p>
                    
                                        @foreach($skills as $skill)
                                            <div class="skillLine"><div class="skill pull-left">{{$skill->name}}</div><div class="rating" data-value="{{$skill->level}}"></div></div>
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
            $('.rating').each(function(){
                var val=$(this).data('value');
                $(this).shieldRating({
                    max: 7,
                    step: 0,
                    value: val,
                    enabled:false,
                    markPreset: false,
                     events: {
                        change: function (e) { 
                            alert(e.target.value());
                        }
                    }
                });
            
            })
            
            $.fn.editable.defaults.mode = 'inline';
                        $(document).ready(function() {
                $('.editable').editable();
            });
            
            
            
             //enable / disable
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            }); 
            
             //$('.rating').swidget().enabled(false);
            
            
        });
        </script>
    @endsection