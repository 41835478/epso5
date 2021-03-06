/**
 *
 * ////////////////////////////
 * ////// * Application modules  * //////
 * Customized javascript for this module. It's auto-minify.
 * ////////////////////////////
 *
 */
 $( function() {
    /** 
    * Select: Crop Type
    */
    if($( '#crop_variety_type' )) {
        $( '#crop_variety_type' ).on( 'change', function() {
            //Define the variable 
            var $container  = $( '#crop_variety_id' );
            var $type      = $( this );
            var $crop      = $( '#crop_id' );
            //Add loading class 
            $container.empty().addClass( 'loading' );
            if($type.val() > 0) {
                //Get the data via AJAX
                $.get( window.location.origin + '/dashboard/ajax/varieties', { type: $type.val(), crop: $crop.val() }, 
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
                            $container.prop( 'disabled', false ).prop( 'required', true ).removeClass( 'loading' );
                        } else {
                            $container.prop( 'disabled', true ).prop( 'required', false ).removeClass( 'loading' );
                        }
                });
            } else {
                $container.removeClass( 'loading' );
            }
        });
    }
});
