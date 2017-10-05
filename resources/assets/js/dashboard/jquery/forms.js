/**
 *
 * ////////////////////////////
 * ////// * Jquery Forms  * //////
 * ////////////////////////////
 *
 */
    import forms from '../helpers/forms.js';
    import numbers from '../helpers/numbers.js';

    /** 
    * Reset a form 
    */
    if( $( '#clear-form' ) ) {
        $( '#clear-form' )
            .on( 'click', forms.form_clear );
    }

    /** 
    * Select all checkboxes
    */
    if( $( '#select-all' ) ) {
        $( '#select-all' )
            .on( 'change', forms.select_all );
    }

    /** 
    * Limit the textareas length
    */
    if( $( 'textarea' ) ) {
        $( 'textarea' )
            .on( 'keyup', forms.text_area );
    }

    /** 
    * Configure the date, time, zip and numbers
    */
    if ( $.jMaskGlobals ) {
        if ( $( '.year') ) { 
            $( '.year' )
                .mask( '0000', { placeholder: 'YYYY' } );
        }

        if ( $( '.date') ) { 
            $( '.date' )
                .mask( '00/00/0000', { placeholder: '__/__/____' } );
        }

        if ( $( '.framework') ) { 
            $( '.framework' )
                .mask( '0x0', { placeholder: '_x_' } );
        }
    }

    /** 
    * Number format
    */
    if ( $( '.number') ) {
        $( '.number' ).keyup( function() {
            //Default variables
            var number = $( this ).val();
            var max = $( this ).attr( 'max' );
            var maxDecimals = $( this ).attr( 'maxDecimals' ) || window._max_decimals;
            //Decimal notation with dot (not comma)
            number = number.replace( ',', '.' );
            //Only numerics values are allowed
            if ( $.isNumeric( number ) === false ) {
                //chop off the last char entered
                number = number.slice( 0, -1 );
            }
            //The current decimals
            var currentDecimals = numbers.total_decimals( number );
            //Verify the decimals
            if ( currentDecimals > maxDecimals ) {
                //chop off the last char entered
                number = number.slice( 0, -1 );
            }
            //Verify max value
            if ( parseInt( number ) > max ) {
                //limit the max number
                number = max;
            }
            return $( this ).val( number );
        });
    }

    /** 
    * Number in american format
    */
    if ( $( '.numeric') ) {
        $( '.numeric' ).keyup( function() {
            //Default variables
            var number = $( this ).val();
            return $( this ).val( number.replace( ',', '.' ) );
        });
    }

    /**
     * Add required class if the required field is activated
     */
    $('form').not('#login').find('input, select, textarea').each(function() {
        if ($(this).prop('required')) {
            $(this).prev('label.control-label')
                .addClass('label-required');
            $(this).parent('div')
                .prev('label.control-label')
                .addClass('label-required');
        }
    });

    /**
     * Inspection dates
     */
    $( '#machine_next_inspection' ).on( 'change', function() {
        //Create date 
        var inspection = $( '#machine_inspection' ).val();
        if( $( this ).val() ) {
            //Add days
            var futureDate = formatDateToInternational( inspection) .addDays( $( this ).val() );
            // Add date
            $( '#machine_next_inspection_info' ).val( futureDate.getDate() + '/' + ("0" + ( futureDate.getMonth() + 1)).slice(-2) + '/' + futureDate.getFullYear() );
        }
    })

    $( '#machine_inspection' ).on( 'keyup', function() {
        $('#machine_next_inspection option:first-child').attr("selected", "selected");
    })

    var formatDateToInternational = function( date ) {
        var formatDate = date.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$2-$1");
        return new Date( formatDate );
    };