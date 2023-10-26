function posicionamiento(pos){
    
    let latitud = pos.coords.latitude;
    let longitud = pos.coords.longitude;
    
    $("#mapita").html("<p>Hola como estas</p>");
}   //$("#mapita").html("<img src='https://maps.googleapis.com/maps/api/staticmap?center="+latitud+","+longitud+"&zoom=14&size=800x600&key=AIzaSyDda5G_ijspiZyQ5tIpNzgn7TH1kZWgcyk' width='800' height='600' />");

$(function(){
   
    if(navigator.geolocation){
        
        navigator.geolocation.getCurrentPosition(posicionamiento);
    }else {
        alert("No soporta geolocalizacion"); 
    }

    

});