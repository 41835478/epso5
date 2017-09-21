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

    /** 
    * Javascript version of sprinf()
    * var text = 'This is %0, or %1.'.sprintf('great', 'something');
    */
    // String.prototype.sprintf = function() {
    //     var counter = 0, args = arguments;
    //     return this.replace(/%s/g, function() {
    //         return args[counter++];
    //     });
    // };