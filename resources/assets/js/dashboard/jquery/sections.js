/**
 *
 * ////////////////////////////
 * ////// * Application sections  * //////
 * ////////////////////////////
 *
 */

     /** 
     * Select: State
     */
    if($( '#state_id' )) {
        $( '#state_id' ).on( 'change', function() {
            //Define the variable 
            var $container = $('#region_id');
            //Add loading class 
            $container.empty().addClass('loading')
            //Get the data via AJAX
            $.get( window.location.origin + '/dashboard/ajax/regions', { state: $('#state_id').val() }, 
            function( data ) {
                //Only if there is data
                if( data.length > 0 ) {
                    //First empty option field
                    $container.append( $( '<option>', { value: '', text : '' } ) );
                    //Built the select
                    $.each( data, function( index, element ) {
                        $container.append( $( '<option>', { 
                            value: element.id,
                            text : element.name
                        }));
                    });
                    $container.prop( 'disabled', false ).prop( 'required', true ).removeClass('loading');
                } else {
                    $container.prop( 'disabled', true ).prop( 'required', false ).removeClass('loading');
                }
            });
        });
    }