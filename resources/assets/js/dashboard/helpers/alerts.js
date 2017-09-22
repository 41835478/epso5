/**
 *
 * ////////////////////////////
 * ////// * Helpers Functions  * //////
 * ////////////////////////////
 *
 */

     export default {
        showAlert: showAlert,
     };
     
    function showAlert( containerRoot ) {
        $( '.alert-message' ).hide();
        $( '#' + containerRoot ).fadeIn();
    };