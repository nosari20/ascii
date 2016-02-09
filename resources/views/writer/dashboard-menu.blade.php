<li><a href="#"><i class="glyphicon glyphicon-calendar"></i>Calendrier</a></li>
<li><a href="#"><i class="fa fa-newspaper-o"></i>Actualités</a></li>
@if($right>1)
    @include('admin.dashboard-menu')
@endif
<li class="submenu">
    <a href="#">
        <i class="glyphicon glyphicon-list"></i> Autre
        <span class="caret pull-right"></span>
    </a>
    
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Bureau</a></li>
        <li><a href="#">Information</a></li>
    </ul>
</li>

