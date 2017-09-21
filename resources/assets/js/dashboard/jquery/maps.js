 /////////////////////
 // Map default variables
 /////////////////////    
 var zoom                    = 17;
 var lat                     = window.currentLat;
 var lng                     = window.currentLng;
 var marker                  = null;
 L.Icon.Default.imagePath    = '../../../../images/';

 /**
  * Generate the map
  */
if( typeof( L ) !== 'undefined' && lat && lng) {
    /////////////////////
    // Dafault map
    /////////////////////  
    var map = new L.Map( 'simpleMap' ).setView( new L.LatLng( lat, lng ), zoom, { animation: true } );
    // Disable drag and zoom handlers.
    map.dragging.disable();
    map.touchZoom.disable();
    map.doubleClickZoom.disable();
    map.scrollWheelZoom.disable();
    map.keyboard.disable();
    //Set PNOA layer
    var base = L.tileLayer.wms( '//www.ign.es/wms-inspire/pnoa-ma', {
        attribution:    '<a href="http://www.ign.es" target="_blank">© Instituto Geográfico Nacional</a>',
        layers:         'OI.OrthoimageCoverage',
        format:         'image/jpeg',
        transparent:    false,
        version:        '1.3.0',
        crs:            L.CRS.EPSG4326,
    }).addTo( map );
    //Generate the marker
    marker  = L.marker( new L.LatLng( lat, lng ) ).addTo( map );
}