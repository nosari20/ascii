<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ASCII - @yield('title')</title>
        <!-- Bootstrap minified css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        
        <!-- FontAwesome minified css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <!-- Custom css -->
        <link rel="stylesheet" href="{{Request::root()}}/assets/css/style.css">
        
        <!-- shortcut icon -->
        <link rel="shortcut icon" href="{{Request::root()}}/assets/image/favicon.PNG" />
        
        <!-- Chrome for Android -->
        <meta name="theme-color" content="#010135">
        <link rel="icon" sizes="192x192" href="{{Request::root()}}/assets/image/favicon.PNG">
        
        @yield('extra-head')
    </head>
    <body>
        
        
        
        <header class="navbar-fixed-top">
            <!-- Navbar top -->
            <div role="banner" class="navbar navbar-top">
                <div class="container">
                    <div class="navbar-top">
                        <nav role="navigation" class="navbar-collapse">
                            
                            <ul class="nav navbar-nav separator top-info">
                                <li>
                                    <a href="#">Informations légales</a>
                                </li>                                                             
                                <li>
                                    <a href="{{ route('office') }}">Bureau</a>
                                </li>
                                 <li>
                                    <a href="{{route('location')}}">Localisation</a>
                                </li>
                                
                                
                            </ul>
                              <ul class="nav navbar-nav pull-right">
                                <li>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                    
                                </li> 
                                <li>
                                    <a href="#"><i class="fa fa-facebook-official"></i></i></a>
                                </li>  
                                @if (Auth::guest())
                                    <li><a href="{{ url('/login') }}">Connexion</a></li>
                                    <li><a href="{{ url('/register') }}">Inscription</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->firstname }} {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('user_dashboard') }}"><i class="fa fa-btn fa-user"></i>Profil</a></li>
                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a></li>
                                        </ul>
                                    </li>
                                @endif                                                          
                               
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            
            
            <!-- Navbar -->
            <div role="banner" class="navbar navbar-menu navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button data-toggle="collapse-side" data-target=".side-collapse" data-container="#main" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    </div>
                    <div class="side-collapse navbar-inverse in">
                        <nav role="navigation" class="navbar-collapse">
                            <ul class="nav navbar-nav navbar-brand">
                                <a href="{{route('home')}}">
                                    <img alt="Brand" src="{{Request::root()}}/assets/image/logo.jpg">
                                </a>
                            </ul>
                            
                            <ul class="nav navbar-nav navbar-right">
                                
                                <li>
                                    <a href="{{route('news')}}">Actualités</a>
                                </li>  
                                <li>
                                    <a href="{{route('calendar')}}">Calendrier</a>
                                </li>
                                <li>
                                    <a href="#">Cours</a>
                                </li>
                                
                            </ul>
                            <ul class="nav navbar-nav top-info">
                                <li>
                                    <a href="#">Informations légal</a>
                                </li>                                                             
                                <li>
                                    <a href="{{ route('office') }}">Bureau</a>
                                </li>
                                <li>
                                    <a href="{{route('location')}}">Localisation</a>
                                </li>
                                @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Connexion</a></li>
                                <li><a href="{{ url('/register') }}">Inscription</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->firstname }} {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('user_dashboard') }}"><i class="fa fa-btn fa-user"></i>Profil</a></li>
                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a></li>
                                        </ul>
                                    </li>
                                @endif
                                <li>
                                    <a href="#" class="social"><i class="fa fa-envelope"></i></a>
                                    <a href="#" class="social"><i class="fa fa-facebook-official"></i></a>
                                </li>  
                                
                                
                                
                                
                            
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    
           <!-- Main -->
        <section id="main" class="container xs-p0">
        
        
        @yield('content')
        
        </section>  
        <!-- End main --> 
        
            


   
        
        
        <footer>
            <div class="container">
                 <div class="col-sm-12 col-md-12">
                     <p class="text-muted">Copyright © : ASCII Nancy</p>
                 </div>   
                     
                
            </div>
        </footer>
        
        <!-- JQuery minified Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        
        
        <!-- Bootstrap minified Javascript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        <!-- Cropit Javascript -->
        <script src="{{Request::root()}}/vendor/cropit/cropit.js"></script>
        
        <script type="text/javascript">
            var baseURL='{{Request::root()}}/';
            $.ajaxSetup({ headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' } });
        </script>
        
        @yield('extra-js')
        
        <!-- Custom Javascript -->
        <script src="{{Request::root()}}/assets/js/style.js"></script>
    
    </body>
</html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

       