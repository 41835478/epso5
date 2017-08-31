/**
 *
 * ////////////////////////////////////
 * ////// * Configuration variables  * //////
 * ////////////////////////////////////
 *
 */

    "use strict";

    /** 
     * Default values
     */
    window._path = window.location.origin;

    /** 
     * DataTable cache for one week
     */
    window._dataTable_cache = 60 * 60 * 24 * 7; //One week

    /** 
     * Max decimals allowed
     */
    window._max_decimals = 2; 

    /** 
     * Minimun number of letters to start the ajax query
     */
    window._search_length = 1;