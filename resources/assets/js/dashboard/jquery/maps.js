 
 import maps from '../helpers/maps.js';

 /////////////////////
 // Map default variables
 /////////////////////    
 var lat        = window.currentLat;
 var lng        = window.currentLng;
 var zoon       = 18;
 var container  = 'simpleMap';
 var marker     = null;
 var coordenates = coordenates || null;

 /**
  * Generate the map
  */
if( typeof( L ) !== 'undefined' && lat && lng) {
    /////////////////////
    // Dafault map
    /////////////////////  
    var map = maps.generateMap(lat, lng, zoon, container);
    //Generate the marker
    marker  = L.marker( new L.LatLng( lat, lng ) ).addTo( map );
    //Coordenadas 
    if(coordenates) {
        //Generate the marker
        for (var i = 0; i < coordenates.length; i++) {
            marker = new L.marker([coordenates[i][1],coordenates[i][2]])
                .bindPopup("Latitud: " + coordenates[i][1] + " - Longitud: " + coordenates[i][2])
                .addTo(map);
        }
    }
}