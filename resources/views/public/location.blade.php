@extends('layouts.app')   
  
@section('content') 
<div class="row">
    <div class="col-sm-6 col-md-8"> 
        <div id="map"></div>
    </div>
    <div class="col-sm-6 col-md-4"> 
        <h2>Adresse :</h2>
        <p>Campus Aiguillettes, 54506 Vandœuvre-lès-Nancy</p>

        
    </div>
    
    
        
</div>
@section('extra-js')

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS927pdPElA80EbHiX5D2o-h1j7MYRYkU&sensor=false"></script>
    
@endsection
@endsection