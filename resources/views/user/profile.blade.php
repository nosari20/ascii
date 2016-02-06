@extends('layouts.app')  
@section('extra-head')
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
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
                    <h2>{{$user->firstname}} {{$user->name}} @if($user->right==2)(Administrateur)@endif @if($user->right==1)(Rédacteur)@endif</h2>
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



@endsection
@section('extra-js')

<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
jQuery(function ($) {
    $('.rating').each(function(){
        var val=$(this).data('value');
        $(this).shieldRating({
            max: 7,
            step: 0.1,
            value: val,
            markPreset: false
        });
    })
});
</script>
@endsection