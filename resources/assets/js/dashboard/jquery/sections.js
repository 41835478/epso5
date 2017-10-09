/**
 *
 * ////////////////////////////
 * ////// * Application sections  * //////
 * ////////////////////////////
 *
 */
    import forms from '../helpers/forms.js';

    var loading = '<div class="col-md-12 text-center"><img src="../../../images/loading.gif"></div>';

    /** 
    * Select: State
    */
    if( $( '#state_id' ).length ) {
        $( '#state_id' ).on( 'change', function( e ) {
            e.preventDefault();
            //Define the variables
            var $container = $( '#region_id' ), $value = $( '#state_id' ).val(), $route = '/dashboard/ajax/regions';
            //Generate the combobox: states > regions
           if( $container.length ) {
               forms.form_comboBox( $container, $value, $route );
           }
        });
    }

    /** 
    * Select: users for plots (With module)
    */
    if( $( '#client_id' ).length ) {
        $( '#client_id' ).on( 'change', function( e ) {
            e.preventDefault();
            //Load module 
            if( $( this ).data('module') ) {
                //Add loading class
                var $module = $('#load-module');
                $module.html( loading );
            } else {
                //Not load the modules
                var $module = null;
            }
            //Define the variables
            var $container = $('#user_id'), $value = $('#client_id').val(), $route = '/dashboard/ajax/users';
            //Generate the combobox: clients > users
            forms.form_comboBox( $container, $value, $route );
            //Add module value if needed
            if( $( '#crop_module' ) && $module ) {
                $.get( window.location.origin + '/dashboard/ajax/modules', { search: $value }, 
                function( data ) {
                    //Only if there is data
                    if( data.module && data.id ) {
                        //Add values 
                        $( '#crop_module' ).val( data.module ), $( '#crop_id' ).val( data.id );
                        if(data.module.length > 0) {
                            //Load the module
                            $.get( window.location.origin + '/dashboard/ajax/modules/load', { 
                                module: data.module, cropName: data.name, cropId: data.id, client: $value, type: data.type 
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
    * Select: plot by user
    */
    if( $( '#user_id' ).length ) {
        $( '#user_id' ).on( 'change', function( e ) {
            e.preventDefault();
            //Define the variables
            var $container = $( '#plot_id' ), $value = $( '#user_id' ).val(), $route = '/dashboard/ajax/plots';
            //Generate the combobox: users > plots
            if( $container.length ) {
                forms.form_comboBox( $container, $value, $route );
            }
        });
    }

    /** 
    * Select: crop using the client id
    */
    if( $( '#plot_id' ).length ) {
        $( '#plot_id' ).on( 'change', function( e ) {
            e.preventDefault();
            //Get the data via AJAX
            var $client = $( '#client_id' ).val();
            $.get( window.location.origin + '/dashboard/ajax/crops', { search: $client }, 
            function( data ) {
                $( '#crop_id' ).val( data );
            });
        });
    }

    /**
     * Search by date
     */
     $( '.advancedSearch' ).on( 'click', function() {
        $( '#modal-search-date' ).modal( 'show' )
     })

     $( '#button-date-search' ).on( 'click', function() {
        $( '#start_date' ).val( $('#modal_start_date').val() );
        $( '#end_date' ).val( $('#modal_end_date').val() );
        $( '#modal-search-date' ).modal( 'hide' );
     })