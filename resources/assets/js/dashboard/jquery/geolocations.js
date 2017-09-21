/**
 * ////////////////////////////
 * ////// * Default values  * //////
 * ////////////////////////////
 */
    var GEOLOCATION  = GEOLOCATION || {};
/**
 * ////////////////////////////
 * ////// * Geolocation functions  * //////
 * ////////////////////////////
 */

    /** 
    * Javascript version of sprinf()
    */
    String.prototype.sprintf = function() {
        var counter = 0;
        var args = arguments;
        return this.replace(/%s/g, function() {
            return args[counter++];
        });
    };

