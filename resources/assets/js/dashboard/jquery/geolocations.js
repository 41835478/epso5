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
    var REGION = REGION || {};
    var SEARCH = SEARCH || {};
    var TOOLTIP = '<div class="tooltip tooltip-message" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>';
    var marker, sigpac, zoom, zoomPlots;
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
            $( CITY.containerName ).prop( 'disabled', false ).tooltip( {template: TOOLTIP} ).focus();
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
            //Show the message and collet the data from the plot
            $( '#alert-zoom-success' ).show( 'slow' );
            $( '#map' ).css('cursor', 'progress');
            map.on( 'click', maps.getFeatureInfo );
            //Add the SIGPAC layer 
            sigpac = maps.sigPac( map );
            sigpac.addTo( map );
        }
        
        //Hide the message if the zoom is not enought
        if( zoom <= zoomPlots ) {
            $( '#alert-zoom-message' ).hide( 'fast' );
            $( '#map' ).css('cursor', 'auto');
            //Remove sigpac
            if( sigpac ) {
                map.removeLayer( sigpac );
            }
            //Remove marker if we zoom at it exits
            if( marker ) { 
                map.removeLayer( marker );
            }
        }; 
    });

    //Load the wms info
    map.on( 'click', maps.getFeatureInfo );

    //Geolocation allowed
    map.on( 'locationfound', maps.showPosition );  
