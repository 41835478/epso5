/**
 * ////////////////////////////
 * ////// * Libraries  * //////
 * ////////////////////////////
 */
    import autocomplete from '../helpers/autocomplete.js';
/**
 * ////////////////////////////
 * ////// * Default values  * //////
 * ////////////////////////////
 */
    var xhr;
    var SEARCH = SEARCH || {};
    var CITY = CITY || {};
    var GEO = GEO || {};
    var REGION = REGION || {};
/**
 * ////////////////////////////
 * ////// * Geolocation functions  * //////
 * ////////////////////////////
 */

 /**
  * ////////////////////////////
  * ////// * Geolocation jquery events  * //////
  * ////////////////////////////
  */
 
     /** 
     * Select region
     */
    REGION.container = $( '#region_id' );
    REGION.container.on('change', function(){
        if(REGION.container.val() > 0) {
            $( '#city_name' ).prop( 'disabled', false );
        } else {
            $( '#city_name,#searchButton' ).prop( 'disabled', true );
            $( '#city_id,#city_name,#geo_x,#geo_y,#geo_bbox,#geo_lat,#geo_lng,#frame_width,#frame_height' ).val( null );
        }
    });

    /** 
    * Autocomplete city
    */
    //Define the variables
    CITY.route           = '/dashboard/ajax/cities';
    CITY.containerRoot   = 'city';
    //Generate the autocomplete for cities
    $(autocomplete.container( CITY.containerRoot )).autoComplete({
        minChars: 3,
        source: function( query, response ) {
            try { xhr.abort(); } catch( e ){}
            xhr = $.getJSON( CITY.route, { query: query.toLowerCase(), region: REGION.container.val() }, function( data ) { 
                response( data ); 
            });
        },
        renderItem: function ( item, search ){
            return autocomplete.renderItem( item );
        },
        onSelect: function( e, term, item ) {
            $( '#searchButton' ).prop( 'disabled', false );
            autocomplete.onSelect( CITY.containerRoot, item );
        }
    });

    /** 
    * Diseable search button if no city selected
    */
    SEARCH.button = $( '#searchButton' );
    SEARCH.button.on( 'click', function( e ) {
        e.preventDefault(); if( !SEARCH.button.val() ) { SEARCH.button.prop( 'disabled', true ); };
    })
