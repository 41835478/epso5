/**
 *
 * ////////////////////////////
 * ////// * Helpers Functions  * //////
 * ////////////////////////////
 *
 */

     export default {
         regex_escape: regex_escape,
     };
     
    function regex_escape( text ) {
        return text
            .replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
    };