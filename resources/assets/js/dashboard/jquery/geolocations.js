/**
 * ////////////////////////////
 * ////// * Libraries  * //////
 * ////////////////////////////
 */
    import alerts from '../helpers/alerts.js';
    import autocomplete from '../helpers/autocomplete.js';
    import forms from '../helpers/forms.js';
    import maps from '../helpers/maps.js';
/**
 * ////////////////////////////
 * ////// * Default values  * //////
 * ////////////////////////////
 */
    var xhr;
    var CITY = CITY || {};
    var GEO = GEO || {};
    var marker  = null;
    var message =  '<div id="geolocationMessage">' + '<li>' + textError + '</li>' + '<li>' + textConfirm + '</li><br>' + '<div class="text-center"><button type="submit" class="btn btn-danger">' + textButton + '</button></div>' + '</div>';    
    var REGION = REGION || {};
    var SEARCH = SEARCH || {};
    var TOOLTIP = '<div class="tooltip tooltip-message" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>';
    var sigpac, zoom, zoomPlots;
    //------------------------//
    CITY.containerRoot  = 'city';
    CITY.containerId    = autocomplete.container( CITY.containerRoot, 'id' );
    CITY.containerName  = autocomplete.container( CITY.containerRoot );
    CITY.route          = '/dashboard/ajax/cities';
    REGION.container    = $( '#region_id' );
    SEARCH.button       = $( '#searchButton' );
/**
 * ////////////////////////////
 * ////// * Geolocation functions  * //////
 * ////////////////////////////
 */
    //Remove all the geolocation data
    function removeGeolocationData() {
        return $( '#city_id,#city_name,#geo_x,#geo_y,#geo_bbox,#geo_lat,#geo_lng,#frame_width,#frame_height' )
            .val( null );
    }

    //Disable de search button
    function disableSearchButton() {
        if( !$( CITY.containerName ).val() ) { 
            return SEARCH.button
                .prop( 'disabled', true ); 
        };
    }

    //Autocomplete: render item
    function renderItem( item ) {
        $( CITY.containerName ).removeClass( 'form-control-success' ).addClass('form-control-danger');
        return '<div class="autocomplete-suggestion" data-id="' + item[ 'id' ] + '" data-title="' + item[ 'name' ] + '" data-lat="' + item[ 'lat' ] + '" data-lng="' + item[ 'lng' ] + '">'
            + '<span class="item-number">' + item[ 'id' ] + '</span> - ' + item[ 'name' ] + '</div>';
    };

    //Autocomplete: on select
    function onSelect( containerRoot, item ) {
        SEARCH.button.prop( 'disabled', false );
        forms.form_status( CITY.containerName );
        $( CITY.containerName ).val( item.data( 'title' ) );
        $( CITY.containerId ).val( item.data( 'id' ) );
        $( '#geo_lat' ).val( item.data( 'lat' ) );
        $( '#geo_lng' ).val( item.data( 'lng' ) );
    }

    //Show info alert
    function showAlert( container ) {
        $( '.alert-message' ).hide(), $( container ).fadeIn('slow');
    }

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
        if( marker !== null ) { map.removeLayer( marker ); }
        //Set the position
        var point = map.latLngToContainerPoint( e.latlng, map.getZoom() );
        //Defined variables for the bbox
        var pointLat = e.latlng.lat, pointLng = e.latlng.lng, bbox = map.getBounds().toBBoxString(), x = point.x, y = point.y, 
            width = map.getSize().x, height = map.getSize().y;
        //Generate the marker
        marker = L.marker( e.latlng ).addTo( map ).bindPopup( message ).openPopup();
        //Get the lat, lng and bbox
        $( '#geo_x' ).val( x ), 
        $( '#geo_y' ).val( y ), 
        $( '#geo_bbox' ).val( bbox ), 
        $( '#geo_lat' ).val( pointLat ), 
        $( '#geo_lng' ).val( pointLng ),
        $( '#frame_width' ).val( width ),
        $( '#frame_height' ).val( height );
    } 
 /**
  * ////////////////////////////
  * ////// * Geolocation jquery events  * //////
  * ////////////////////////////
  */
 
     /** 
     * Select region
     */
    REGION.container.on('change', function(){
        //Reset all data...
        removeGeolocationData();
        //Add error by default to the input field for city
        $( CITY.containerName ).addClass('form-control-danger').removeClass('form-control-success');
        if(REGION.container.val() > 0) {
            //Enable city field and add success!!
            $( CITY.containerName ).prop( 'disabled', false ).focus();
            //Show instructions
            showAlert('#alert-city-info');
        } else {
            //Error and fail...
            $( '#city_name,#searchButton' ).prop( 'disabled', true ); 
            forms.form_status( CITY.containerName, false ); 
        }
    });

    /** 
    * Autocomplete city
    */
    //Generate the autocomplete for cities
    $( CITY.containerName ).autoComplete({
        minChars: 3,
        source: function( query, response ) {
            //Reset the tooltips 
            $('.tooltip-message').tooltip('hide');
            //Get ajax response with cache
            try { xhr.abort(); } catch( e ){}
            xhr = $.getJSON( CITY.route, { query: query.toLowerCase(), region: REGION.container.val() }, function( data ) { 
                response( data ); 
            });
        },
        renderItem: function ( item, search ){
            return renderItem( item );
        },
        onSelect: function( e, term, item ) {
            onSelect( CITY.containerRoot, item );
            //Show instructions
            showAlert('#alert-push-info');
        }
    });

    /** 
    * Empty city and disable search button if input has no value
    */
    $( CITY.containerName ).on( 'keyup', function() {
        if( !$( this ).val() ) {
            //Show or hide class for success or fail
            forms.form_status( CITY.containerName );
            //Disable search button
            SEARCH.button.prop( 'disabled', true );
            //Reset all data...
            removeGeolocationData();
        }
    });
   
    /** 
    * Search city by GPS
    */
    SEARCH.button.on( 'click', function() {
        maps.searchMap( map, $( '#geo_lat' ).val(), $( '#geo_lng' ).val() );
        //Show instructions
        showAlert('#alert-zoom-info');
    })
/**
 * ////////////////////////////
 * ////// * Maps  * //////
 * ////////////////////////////
 */
    // Dafault map
    var map = maps.generateMap();

    //Load sigpac layer when zoom is right
    map.on( 'zoomend', function( e ) {
        //Get the current map zoom
        zoom = map.getZoom();
        zoomPlots = maps.getVariable('zoomPlots');
        //If zoom is right to select a plot, we allow adding plots.
        if( zoom > zoomPlots ) {
            //Show the instructions and collet the data from the plot
            showAlert('#alert-zoom-success');
            $( '#map' ).css('cursor', 'progress');
            map.on( 'click', getFeatureInfo );
        }
        
        //Hide the message if the zoom is not enought
        if( zoom <= zoomPlots ) {
            $( '#alert-zoom-message' ).hide( 'fast' );
            $( '#map' ).css('cursor', 'auto');
            //Remove marker if we zoom at it exits
            if( marker ) { 
                map.removeLayer( marker );
            }
        }; 
    });

    //Load the wms info
    map.on( 'click', getFeatureInfo);

    //Geolocation allowed
    map.on( 'locationfound', showPosition);  
