@extends('layouts.app')   
  
@section('content') 

<div class="col-sm-12 col-md-12"> 
    <ul class="timeline">
        
        
        
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
@endsection    