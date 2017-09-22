/**
 *
 * ////////////////////////////
 * ////// * Geolocation Functions  * //////
 * ////////////////////////////
 *
 */

    export default {
        generateMap: generateMap,
    };

    /////////////////////
    // Map variables
    /////////////////////            
    var zoom                    = 7;   
    var zoomSearch              = 15;
    var zoomPlots               = 17;
    var maxZoom                 = 18;
    var lat                     = 40.4469;
    var lng                     = -3.6914;
    var marker                  = null;
    //Icons
    L.Icon.Default.imagePath    = window.location.origin + '/images/';

    /////////////////////
    // Map functions
    /////////////////////    
    function generateMap(customLat, customLng, customZoon, mapContainer) {
        var map = new L.Map( mapContainer || 'map' ).setView( new L.LatLng( customLat || lat, customLng || lng ), customZoon || zoom, { animation: true } );
        //Remove options from the map
        map.dragging.disable();
        map.touchZoom.disable();
        map.doubleClickZoom.disable();
        map.scrollWheelZoom.disable();
        map.keyboard.disable();
        $( '.leaflet-control-zoom' ).css( 'visibility', 'hidden' );
        //Set PNOA layer
        var base = L.tileLayer.wms( '//www.ign.es/wms-inspire/pnoa-ma', {
            attribution:    '<a href="http://www.ign.es" target="_blank">© Instituto Geográfico Nacional</a>',
            layers:         'OI.OrthoimageCoverage',
            format:         'image/jpeg',
            transparent:    false,
            version:        '1.3.0',
            crs:            L.CRS.EPSG4326,
            maxZoom:        maxZoom
        }).addTo( map );
        //Return the map value
        return map;
    }