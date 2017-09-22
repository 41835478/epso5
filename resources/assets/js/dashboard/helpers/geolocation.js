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
    L.Icon.Default.imagePath    = '../../../../img';

    /////////////////////
    // Map functions
    /////////////////////    
    function generateMap() {
        var map = new L.Map( 'map' ).setView( new L.LatLng( lat, lng ), zoom, { animation: true } );
        //Remove options from the map
        map.dragging.disable();
        map.touchZoom.disable();
        map.doubleClickZoom.disable();
        map.scrollWheelZoom.disable();
        map.keyboard.disable();
        $( '.leaflet-control-zoom' ).css( 'visibility', 'hidden' );
        //Set OSM layer
        var mapabase = L.tileLayer( '//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution:    '© <a href="http://openstreetmap.org" target="_blank">OpenStreetMap</a>',
            opacity:        0,
            transparent:    true,
            crs:            L.CRS.EPSG4326
        }).addTo( map );
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