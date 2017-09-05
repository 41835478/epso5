/**
 *
 * ////////////////////////////
 * ////// * Application sections  * //////
 * ////////////////////////////
 *
 */
     var loading = '<div class="col-md-12 text-center"><img src="../../images/loading.gif"></div>';

    /** 
    * Select: State
    */
    if($( '#state_id' )) {
        $( '#state_id' ).on( 'change', function() {
            //Define the variable 
            var $container = $('#region_id');
            //Add loading class 
            $container.empty().addClass('loading');
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

    /** 
    * Crops: Load the crops types
    */
    if($('#modal-crop-variety-types')) {
        $('#modal-crop-variety-types').on('shown.bs.modal', function(event) {
            //Set variables
            var $modal      = $(this);
            var $button     = $(event.relatedTarget);
            var $cropName   = $button.attr('data-cropName');
            var $cropId     = $button.attr('data-cropId');
            var $container  = $('#ajax-crop-variety-types');
            //Loading
            $container.html(loading);
            //Add crop name to the title
            $('#title-crop-variety-types').html($cropName);
            //Load the form
            $.get( window.location.origin + '/dashboard/ajax/cropVarietyTypes', { crop: $cropId }, 
            function( data ) {
                $container.html(data);
            });
        });
    }