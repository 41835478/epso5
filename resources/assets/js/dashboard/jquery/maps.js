 
 import maps from '../helpers/maps.js';

 /////////////////////
 // Map default variables
 /////////////////////    
 var lat        = window.currentLat;
 var lng        = window.currentLng;
 var zoon       = 18;
 var container  = 'simpleMap';
 var marker     = null;

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
}