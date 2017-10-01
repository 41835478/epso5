 import maps from '../helpers/maps.js';

 /////////////////////
 // Map default variables
 /////////////////////    
 var lat            = window.currentLat;
 var lng            = window.currentLng;
 var zoon           = 17;
 var container      = 'simpleMap';
 var marker         = null;
 var coordenates    = window.coordenates || null; 

 /**
  * Generate the map
  */
if( typeof( L ) !== 'undefined' && lat && lng) {    
    /////////////////////
    // Dafault map
    /////////////////////  
    var map = maps.generateMap(lat, lng, zoon, container);
    //Coordenates 
    if(coordenates) {
        //Generate the marker
        for (var i = 0; i < coordenates.length; i++) {
            marker = new L.marker([coordenates[i][1], coordenates[i][2]])
                .bindPopup("Referencia: " + coordenates[i][0] + "<br>" + "Latitud: " + coordenates[i][1] + "<br>" + "Longitud: " + coordenates[i][2])
                .addTo(map);
            console.log(marker);
        }
    } else {
        //Generate the marker
        marker  = L.marker( new L.LatLng( lat, lng ) ).addTo( map );
    }
}