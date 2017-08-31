/**
 *
 * ////////////////////////////
 * ////// * The jquery default code  * //////
 * ////////////////////////////
 *
 */

    $( document )
        .ready( function() {
            /**
             * Place the CSRF token as a header on all pages for access in AJAX requests
             */
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            require('./bootstrap.js');
            require('./forms.js');
            require('./tables.js');
        });