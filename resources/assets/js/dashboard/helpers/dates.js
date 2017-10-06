/**
 *
 * ////////////////////////////
 * ////// * Datatables Functions * //////
 * ////////////////////////////
 *
 */

     export default {
         formatDateToInternational: formatDateToInternational,
         nextInspection: nextInspection,
     };

     /** 
      * Convert date from spanish format to international format
      */
     function formatDateToInternational( date ) {
         var formatDate = date.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$2-$1");
         return new Date( formatDate );
     };

     /** 
      * Calculate next inspection
      */
     function nextInspection( value, date ) {
         if( value ) {
             //Add days
             var futureDate = formatDateToInternational( date ) .addDays( value );
             // Add date
             $( '#machine_next_inspection_info' ).val( futureDate.getDate() + '/' + ("0" + ( futureDate.getMonth() + 1)).slice(-2) + '/' + futureDate.getFullYear() );
         }
     };