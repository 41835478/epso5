/**
 *
 * ////////////////////////////
 * ////// * Application sections  * //////
 * ////////////////////////////
 *
 */
    import autocomplete from '../helpers/autocomplete.js';
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
            //get module 
            var $thisModule = $( this ).data('module');
            //Load module 
            if( $thisModule ) {
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
                        //Add values: module and crop
                        $( '#crop_module' ).val( data.module ), $( '#crop_id' ).val( data.id );
                        if(data.module.length > 0) {
                            //Load harvests 
                            if( $thisModule == 'harvests' ) {
                                //Load the harvests module
                                $.get( window.location.origin + '/dashboard/ajax/harvests', { 
                                    module: data.module
                                }, 
                                function( harvest ) {
                                    $module.html( harvest );
                                });  
                            //Load the crop module
                            } else {
                                //Load the module
                                $.get( window.location.origin + '/dashboard/ajax/modules/load', { 
                                    module: data.module, cropName: data.name, cropId: data.id, client: $value, type: data.type 
                                }, 
                                function( output ) {
                                    $module.html( output );
                                });  
                            }
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
    * Select: crop and pests using the client id
    */
    if( $( '#plot_id' ).length ) {
        $( '#plot_id' ).on( 'change', function( e ) {
            e.preventDefault();
            //Get the data via AJAX
            var $client = $( '#client_id' ).val();
            $.get( window.location.origin + '/dashboard/ajax/crops', { search: $client }, 
            function( crop ) {
                $( '#crop_id' ).val( crop[0] );
                //If there is pests 
                if( $('#pest_id').data('combobox') == true ) {
                    $.get( window.location.origin + '/dashboard/ajax/pests', { search: crop[0] }, 
                        function( pest ) {
                            var container = $('#pest_id');
                            //Reset values 
                            container.empty();
                            //Generate the form select
                            forms.form_select_create( pest, container );
                        });
                }
            });
        });
    }

    /**
     * Search by date
     */
    if( $( '.advancedSearch' ).length ) {
         $( '.advancedSearch' ).on( 'click', function() {
            $( '#modal-search-date' ).modal( 'show' );
            $( '#modal_start_date' ).val( $( '#search_dateStart' ).val() );
            $( '#modal_end_date' ).val( $( '#search_dateEnd' ).val() );
         })
    }

    /**
     * Biocides
     */
    $( '#biocide' ).autoComplete({
        minChars: 3,
        source: function( query, response ) {
            //Reset the fields 
            $( '#biocide_id,#biocide_company,#biocide_num,#biocide_formula' ).val( '' );
            //Get ajax response with cache
            try { xhr.abort(); } catch( e ){}
            xhr = $.getJSON( window.location.origin + '/dashboard/ajax/biocides', { biocide: $( '#biocide' ).val() }, function( data ) { 
                response( data ); 
            });
        },
        renderItem: function ( item, search ){
            return '<div class="autocomplete-suggestion" id="biocide-' + item[ 'id' ] + '" data-num="' + item[ 'num' ] + '" data-id="' + item[ 'id' ] + '" data-name="' + item[ 'name' ] + '" data-company="' + item[ 'company' ] + '" data-formula="' + item[ 'formula' ] +'">'
                        + item[ 'name' ] + 
                    '</div>';
        },
        onSelect: function( e, term, item ) {
            $( '#biocide' ).val( item.data( 'name' ) );
            $( '#biocide_id' ).val( item.data( 'id' ) );
            $( '#biocide_num' ).val( item.data( 'num' ) );
            $( '#biocide_company' ).val( item.data( 'company' ) );
            $( '#biocide_formula' ).val( item.data( 'formula' ) );
        }
    });