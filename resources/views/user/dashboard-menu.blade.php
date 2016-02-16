<aside class="col-xs-12 col-lg-2 content-box-large">
    <ul class="nav">
        
        
            <li><a href="{{ route('user_dashboard') }}"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
            <li><a href="#"><i class="fa fa-graduation-cap"></i>Cours</a></li>
            @if($right>0)
                @include('writer.dashboard-menu')
            @endif
            
        
                
        </ul>
    
</aside>