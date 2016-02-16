@extends('layouts.app')
    @section('extra-head')
        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    @endsection
    @section('content')
    
        <div class="col-sm-12 col-md-12 dashboard">
            @include('user.dashboard-menu')
            
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
                                        
                                            <div class="col-sm-12 col-md-12 col-lg-12  profile-pic-wrapper">
                                                <img id="profile-pic" src="{{Request::root()}}/upload/user/{{$user->image}}" class="img-responsive">
                                                <button id="edit-img" class="button-edit hidden" data-toggle="modal" data-target="#picture" type="button"><i class="fa fa-file-image-o"></i></button>   
                                            </div>                               
                                                    
                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        
                                        <h2><a href="#" class="editable" data-type="text" id="firstname" data-title="Prénom">{{$user->firstname}}</a> <a href="#" class="editable" data-type="text" id="name"  data-title="Nom">{{$user->name}}</a> @if($user->right==2)(Administrateur)@endif @if($user->right==1)(Rédacteur)@endif</h2>
                                        <p><strong>Etablissement: </strong><a href="#" class="editable" data-type="text" id="school"  data-title="Etablissement">{{$user->school}}</a> </p>
                                        <p><strong>Etudes: </strong><a href="#" class="editable" data-type="text" id="level"  data-title="Cursus">{{$user->level}}</a> </p>
                    
                                        <div id="skills">
                                            @foreach($skills as $skill)
                                                <div class="skillLine"><div class="skill pull-left">{{$skill->name}}</div><div class="rating" data-name="{{$skill->name}}" data-value="{{$skill->level}}"></div></div>
                                            @endforeach
                                        </div>
                                        <button id="add-skill" class="button-edit hidden pull-left" data-toggle="modal" data-target="#skill" type="button"><i class="fa fa-plus"></i></button>
                                        
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
                        
                </div>
        </div>
        
        
<!-- Modal -->
        
<div id="picture" class="modal" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-body">
            <div class="image-editor" data-image="{{Request::root()}}/upload/user/{{$user->image}}">
                
                <div class="cropit-image-preview"></div>
                <div class="image-size-label">
                    Recadrage <span class="error"></span>
                </div>
                
                <div class="col-sm-12">
                    <input type="file" class="cropit-image-input">
                </div>
                <form id="image-form" action="">
                    <input type="hidden" name="image-data" class="hidden-image-data" />
                    <input type="submit" class="submit hidden">
                </form>
                <div class="col-sm-12">
                    <i class="fa fa-picture-o fa-lg"></i>
                    <input type="range" class="cropit-image-zoom-input">
                    <i class="fa fa-picture-o fa-2x"></i>
                </div>
                
                <button id="image-form-send" class="btn btn-default" >Utiliser</button>
                
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
    </div>

    </div>
</div>


<div id="skill" class="modal" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-body">
            <form  id="skill-form">
                <div class="form-group">
                    <label for="text">Intitulé</label>
                    <input type="text" class="form-control" id="text" name="skill">
                </div>
                <div class="form-group">
                    <label for="number">Niveau</label>
                    <input type="number" class="form-control" id="number" name="level" min="0" max="7" step="1" value="0">
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

        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        

        <script type="text/javascript">
        $(document).ready(function() {
            
            $('.editable').click(function(e){
                e.preventDefault();
            })
            
            
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
                    //enbale
                    $('.editable').editable("enable");  
                    $('.rating').each(function(){              
                        $(this).swidget().enabled(true);
                    });
                    $(this).data('state','enabled');
                    $(this).find('i').removeClass('fa-pencil');
                    $(this).find('i').addClass('fa-times');
                    
                    $('#edit-img').removeClass('hidden');
                    $('#add-skill').removeClass('hidden');
                    
                }else{
                    //disable
                    $('.editable').editable("disable");                
                    $('.rating').each(function(){              
                        $(this).swidget().enabled(false);
                    });
                    $(this).data('state','disabled');
                    $(this).find('i').addClass('fa-pencil');
                    $(this).find('i').removeClass('fa-times');
                    
                    $('#edit-img').addClass('hidden');
                    $('#add-skill').addClass('hidden');
                }
                
                
            }); 
            
            
            
            $('#image-form-send').click(function(){
               $('#image-form .submit').click();
                
                 
            });
            
            $('#image-form').submit(function(e){
                e.preventDefault();
                var imageData = $('.image-editor').cropit('export', {
                    type: 'image/jpeg',
                    quality: .9,
                });
                
                $('.hidden-image-data').val(imageData);
                var formValue = $(this).serialize();
                $.ajax({
                    url: '{{route("edit_image")}}',
                    type: 'PUT',
                    data: formValue,
                    success: function(data){
                        d = new Date();
                        $('#profile-pic').attr('src',data.img+"?"+d.getTime());
                        $('button[data-dismiss="modal"]').click();
                    }                              
                    
                });
                return false;
            });
            
            
             
            
            $('#skill-form').submit(function(e){
                e.preventDefault();
                var formValue=$(this).serialize();
                $.ajax({
                    url: '{{route("add_skill")}}',
                    type: 'POST',
                    data: formValue,
                    success: function(data){
                       if(data.response=="new"){
                           
                           var skill=data.skill;
                           console.log(data);
                           var skillStr='<div class="skillLine"><div class="skill pull-left">'+skill.name+'</div><div class="rating" data-name="'+skill.name+'" data-value="'+skill.level+'"></div></div>';
                           var skillEl = $(skillStr).appendTo('#skills');
                       
                           
                           
                           
                           
                           
                           $(skillEl).find('.rating').each(function(){
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
                        
                        });
                           
                           
                           
                           
                       }
                    }                              
                    
                });
                return false;
            });
            
            
            
            
            
            
            
        });
        </script>
    @endsection