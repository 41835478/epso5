/**
 *
 * ////////////////////////////
 * ////// * Application sections  * //////
 * ////////////////////////////
 *
 */
    import forms from '../javascript/forms.js';

    var loading = '<div class="col-md-12 text-center"><img src="../../../images/loading.gif"></div>';

    /** 
    * Select: State
    */
    if($( '#state_id' )) {
        $( '#state_id' ).on( 'change', function( e ) {
            e.preventDefault();
            //Define the variables
            var $container = $( '#region_id' ), $state = $( '#state_id' ).val(), $route = '/dashboard/ajax/regions';
            //Generate the combobox: states > regions
            forms.form_comboBox( $container, $state, $route );
        });
    }

    /** 
    * Select: users for plots (With module)
    */
    if($( '#client_id' )) {
        $( '#client_id' ).on( 'change', function( e ) {
            e.preventDefault();
            //Define the variables
            var $container = $('#user_id'), $clientID = $('#client_id').val(), $route = '/dashboard/ajax/users', $module = $('#load-module');
            //Add loading class 
            $module.html( loading );
            //Generate the combobox: clients > users
            forms.form_comboBox( $container, $clientID, $route );
            //Add módule value
            if($( '#crop_module' )) {
                $.get( window.location.origin + '/dashboard/ajax/modules', { search: $clientID }, 
                function( data ) {
                    //Only if there is data
                    if( data.module && data.id ) {
                        //Add values 
                        $( '#crop_module' ).val( data.module ), $( '#crop_id' ).val( data.id );
                        if(data.module.length > 0) {
                            //Load the module
                            $.get( window.location.origin + '/dashboard/ajax/modules/load', { 
                                module: data.module, cropName: data.name, cropId: data.id, client: $clientID, type: data.type 
                            }, 
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
            var $modal = $( this ), $button = $( event.relatedTarget ), $cropName = $button.attr( 'data-cropName' ), 
                $cropId = $button.attr( 'data-cropId' ), $container  = $( '#ajax-crop-variety-types' );
            //Loading
            $container.html( loading) ;
            //Add crop name to the title
            $( '#title-crop-variety-types' ).html( $cropName );
            //Load the form
            $.get( window.location.origin + '/dashboard/ajax/cropVarietyTypes', { search: $cropId }, 
            function( data ) {
                $container.hide( ).html( data ).fadeIn( 'slow' );
            });
        });
    }