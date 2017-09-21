var message =   '<div id="geolocationMessage">' +
                    '<li>' + textError + '</li>' +
                    '<li>' + textConfirm + '</li><br>' + 
                    '<div class="text-center"><button type="submit" class="btn btn-danger">' + textButton + '</button></div>' +
                '</div>';
var searchButton = $( '#searchButton' );

/** 
 * Enable / Disable region field
 */
$( '#region_id' ).on( 'change' , function() {
    //Reset button by default
    $( '#searchButton' ).prop( 'disabled' , true);
    //reset regions and cities
    if( $( this ).val() == '' ) {
        //Remove values from the form fields
        clearGeolocation( true );
    } else {
        $( '#city' ).prop( 'disabled' , false ).val('').focus();
    }
});

/** 
 * Autocomplete city
 */
$( '#city' ).on( 'keydown', function() {
    //Reset the values by default
    searchButton.prop( 'disabled' , true ); fail();
    //If the input field is empty 
    if( !$( this ).val() ) {
        //Remove values from the form fields
        clearGeolocation( false );
    }
    //Autocomplete
    $( '#city' ).autocomplete({
        minLength: searchLength,
        source: path + '/dashboard/ajax/cities?region=' + $( '#region_id' ).val(), 
        select: function(event, ui){
            $( '#city_id' ).val( ui.item.id ), 
            $( '#city_lat' ).val( ui.item.lat ), 
            $( '#city_lng' ).val( ui.item.lng );
            //Insane verification
            if( $('#city_id' ).val() &&  $( '#city_lat' ).val() &&  $( '#city_lng' ).val() ) {
                searchButton.prop( 'disabled', false ), 
                success();
            }
        }
    });
});

/** 
 * Clear input fields for geolocation
 */
function clearGeolocation( disabledCity ) {
    //Remove values from the form fields
    if( disabledCity ) {
        $( '#city' ).prop( 'disabled', true ).val('');
    }
    clear();
    //Disable search button
    searchButton.prop( 'disabled', true );
    //Remove success
    fail();
}

/** 
 * Add success
 */
function success() {
    //Remove success
    $( '#city' ).parent( 'div' ).addClass( 'has-success' );
}

/** 
 * Remove success
 */
function fail() {
    //Remove success
    $( '#city' ).parent( 'div' ).removeClass( 'has-success' );
}

/** 
 * Remove success
 */
function clear() {
    //Remove success
    $( '#geo_x,#geo_y,#geo_bbox,#geo_lat,#geo_lng,#frame_width,#frame_height' ).val( null );
}

/////////////////////
// Map variables
/////////////////////  
var MapStartPointLatitud    = 40.4469;
var MapStartPointLongitud   = -3.6914;
var MapStartZoom            = 7;             
var zoom                    = MapStartZoom;
var zoomSearch              = 15;
var zoomPlots               = 17;
var maxZoom                 = 18;
var lat                     = MapStartPointLatitud;
var lng                     = MapStartPointLongitud;
var marker                  = null;
L.Icon.Default.imagePath    = '../../../../img';

/////////////////////
// Dafault map
/////////////////////  
///
var map = new L.Map( 'map' ).setView( new L.LatLng( lat, lng ), zoom, { animation: true } );

// Disable drag and zoom handlers.
map.dragging.disable();
map.touchZoom.disable();
map.doubleClickZoom.disable();
map.scrollWheelZoom.disable();
map.keyboard.disable();
$( '.leaflet-control-zoom' ).css( 'visibility', 'hidden' );

// // Set base Map (Mapbox from OpenStreetMap) 
// var mapid                   = 'mapbox.streets-satellite';
// var base_url                = '//api.tiles.mapbox.com/v4/' + mapid + '/{z}/{x}/{y}.png?access_token=' + token;
// var mapabase = L.tileLayer(base_url, {
//     attribution:  'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
//     transparent:  false,
//     crs:          L.CRS.EPSG4326,
//     maxZoom:      maxZoom
// });

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

// Set Sigpac layer (MAGRAMA)
var sigpac = L.tileLayer.wms( '//wms.magrama.es/wms/wms.aspx', {
    attribution:    '<a href="http://www.magrama.gob.es/es/" target="_blank">SIGPAC ©</a>',
    layers:         'PARCELA',
    format:         'image/png',
    transparent:    true,
    version:        '1.1.0',
    crs:            L.CRS.EPSG4326
});

/////////////////////
// Click on search button
/////////////////////   
$( '#searchButton' ).on( 'click', function() {
    //Get the data from the form
    searchMap($( '#city_lat' ).val(), $( '#city_lng' ).val());
    // Enable drag and zoom handlers.
    map.dragging.enable();
    map.touchZoom.enable();
    map.doubleClickZoom.enable();
    map.scrollWheelZoom.enable();
    map.keyboard.enable();
    $( '.leaflet-control-zoom' ).css( 'visibility', 'visible' );
});

/////////////////////
// Search Map
/////////////////////
function searchMap( lat, lng ){
    //Loading...
    Pace.restart();
    //If there is a place to locate...
    if( $( '#city_id' ).val() ) {
        //Set the new location
        map.setView( new L.LatLng( lat, lng ), zoomSearch, { animation: true } );
    } 
}

/////////////////////
// Behaviors
/////////////////////

//Load sigpac layer when zoom is right
map.on( 'zoomend', function( e ) {
    //Get the current map zoom
    zoom = map.getZoom();
    //If zoom is right to select a plot, we allow adding plots.
    if( zoom > zoomPlots ) {
        //Show the message and collet the data from the plot
        $( '#hideMessage' ).show( 'slow' );
        $( '#map' ).css('cursor', 'progress');
        map.on( 'click', getFeatureInfo );
        //Add sigpac
        //sigpac.addTo(map);
    }
    
    //Hide the message if the zoom is not enought
    if( zoom <= zoomPlots ) {
        $( '#hideMessage' ).hide( 'fast' );
        $( '#map' ).css('cursor', 'auto');
        clear();
        //Remove sigpac
        map.removeLayer( sigpac );
        //Remove marker if we zoom at it exits
        if( marker !== null ) { 
            map.removeLayer( marker );
        }
    }; 
});

//Load the wms info
map.on( 'click', getFeatureInfo );

//Geolocation allowed
map.on( 'locationfound', showPosition );  

/////////////////////
// Default functions
/////////////////////

// Get data from map
function getFeatureInfo( e ) {   
    //Show the button to add plot if the zoom is right
    if( zoom > zoomPlots ) {       
        //Show the marker
        showPosition( e );
    }
}

//Get the position of a point
function showPosition( e ) {    
    //Clean the map of markers
    if( marker !== null ) {
        map.removeLayer( marker );
    }
    //Set the position
    var point           = map.latLngToContainerPoint( e.latlng, map.getZoom() );
    //Defined variables for the bbox
    var pointLat        = e.latlng.lat;
    var pointLng        = e.latlng.lng;
    var bbox            = map.getBounds().toBBoxString();
    var x               = point.x;
    var y               = point.y; 
    var width           = map.getSize().x;
    var height          = map.getSize().y;
    //Generate the marker
    marker  = L.marker( e.latlng )
        .addTo( map )
        .bindPopup( message )
        .openPopup();
    //Get the lat, lng and bbox
    $( '#geo_x' ).val( x ), 
    $( '#geo_y' ).val( y ), 
    $( '#geo_bbox' ).val( bbox ), 
    $( '#geo_lat' ).val( pointLat ), 
    $( '#geo_lng' ).val( pointLng ),
    $( '#frame_width' ).val( width ),
    $( '#frame_height' ).val( height );
} 