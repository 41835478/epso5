/**
 *
 * ////////////////////////////
 * ////// * Application sections  * //////
 * ////////////////////////////
 *
 */
    var loading = '<div class="col-md-12 text-center"><img src="../../../images/loading.gif"></div>';

    /** 
    * Select: State
    */
    if($( '#state_id' )) {
        $( '#state_id' ).on( 'change', function() {
            //Define the variable 
            var $container  = $( '#region_id' );
            var $state      = $( '#state_id' );
            //Add loading class 
            $container.empty().addClass( 'loading' );
            //Get the data via AJAX
            $.get( window.location.origin + '/dashboard/ajax/regions', { state: $state.val() }, 
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
        });
    }

    /** 
    * Select: users for plots (With module)
    */
    if($( '#client_id' )) {
        $( '#client_id' ).on( 'change', function() {
            //Define the variables
            var $clientID       = $('#client_id').val();
            var $container      = $('#user_id');
            var $module         = $('#load-module');
            //Add loading class 
            $container.empty().addClass('loading');
            $module.html( loading );
            //Get the data via AJAX
            $.get( window.location.origin + '/dashboard/ajax/users', { client: $clientID }, 
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
                    $container.prop( 'disabled', false ).removeClass( 'loading' );
                } else {
                    $container.prop( 'disabled', true ).removeClass( 'loading' );
                }
            });
            //Add módule value
            if($( '#crop_module' )) {
                $.get( window.location.origin + '/dashboard/ajax/modules', { client: $clientID }, 
                function( data ) {
                    //Only if there is data
                    if( data.module && data.id ) {
                        //Add values 
                        $( '#crop_module' ).val( data.module );
                        $( '#crop_id' ).val( data.id );
                        if(data.module.length > 0) {
                            //Load the module
                            $.get( window.location.origin + '/dashboard/ajax/modules/load', { module: data.module, cropName: data.name, cropId: data.id, client: $clientID }, 
                            function( output ) {
                                $module.html( output );
                            });  
                        }
                    } else {
                        $module.html( window.errorModule );
                    }
                });
            }
        });
    }

    /** 
    * Crops: Load the crops types
    */
    if( $( '#modal-crop-variety-types' ) ) {
        $( '#modal-crop-variety-types' ).on( 'shown.bs.modal', function( event ) {
            //Set variables
            var $modal      = $( this );
            var $button     = $( event.relatedTarget );
            var $cropName   = $button.attr( 'data-cropName' );
            var $cropId     = $button.attr( 'data-cropId' );
            var $container  = $( '#ajax-crop-variety-types' );
            //Loading
            $container.html( loading) ;
            //Add crop name to the title
            $( '#title-crop-variety-types' ).html( $cropName );
            //Load the form
            $.get( window.location.origin + '/dashboard/ajax/cropVarietyTypes', { crop: $cropId }, 
            function( data ) {
                $container.hide( ).html( data ).fadeIn( 'slow' );
            });
        });
    }