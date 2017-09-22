/**
 * ////////////////////////////
 * ////// * Libraries  * //////
 * ////////////////////////////
 */
    import autocomplete from '../helpers/autocomplete.js';
    import forms from '../helpers/forms.js';
    import geolocation from '../helpers/geolocation.js';
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
        if( !SEARCH.button.val() ) { 
            return SEARCH.button
                .prop( 'disabled', true ); 
        };
    }

    //Autocomplete: render item
    function renderItem( item ) {
        return '<div class="autocomplete-suggestion" data-id="' + item[ 'id' ] + '" data-title="' + item[ 'name' ] + '" data-lat="' + item[ 'lat' ] + '" data-lng="' + item[ 'lng' ] + '">'
            + '<span class="item-number">' + item[ 'id' ] + '</span> - ' + item[ 'name' ] + '</div>';
    };

    //Autocomplete: on select
    function onSelect( containerRoot, item ) {
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
        if(REGION.container.val() > 0) {
            $( '#city_name' ).prop( 'disabled', false );
        } else {
            $( '#city_name,#searchButton' ).prop( 'disabled', true ); 
            forms.form_status( CITY.containerName ); 
            removeGeolocationData();
        }
    });

    /** 
    * Autocomplete city
    */
    //Generate the autocomplete for cities
    $( CITY.containerName ).autoComplete({
        minChars: 3,
        source: function( query, response ) {
            try { xhr.abort(); } catch( e ){}
            xhr = $.getJSON( CITY.route, { query: query.toLowerCase(), region: REGION.container.val() }, function( data ) { 
                response( data ); 
            });
        },
        renderItem: function ( item, search ){
            $( autocomplete.container( 'city' ) ).removeClass( 'form-control-success' ).addClass('form-control-danger');
            return renderItem( item );
        },
        onSelect: function( e, term, item ) {
            SEARCH.button.prop( 'disabled', false );
            forms.form_status( CITY.containerName );
            onSelect( CITY.containerRoot, item );
        }
    });

    /** 
    * Empty city and disable search button if input has no value
    */
    $( CITY.containerName ).on( 'keyup', function() {
        if( !$( this ).val() ) {
            forms.form_status( CITY.containerName );
            SEARCH.button.prop( 'disabled', true );
            removeGeolocationData();
        }
    });
   
    /** 
    * Diseable search button if no city selected
    */
    SEARCH.button.on( 'click', function( e ) {
        e.preventDefault(); disableSearchButton();
    })
/**
 * ////////////////////////////
 * ////// * Maps  * //////
 * ////////////////////////////
 */
    // Dafault map
    var map = geolocation.generateMap();
