/**
 *
 * ////////////////////////////
 * ////// * The jquery default code  * //////
 * ////////////////////////////
 *
 */
$( function() {
    /**
     * Place the CSRF token as a header on all pages for access in AJAX requests
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    require('../jquery/bootstrap.js');
    require('../jquery/forms.js');
    require('../jquery/geolocations.js');
});