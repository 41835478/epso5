/**
 *
 * ////////////////////////////
 * ////// * Jquery bootstrap  * //////
 * ////////////////////////////
 *
 */
    /** 
    * Tooltips
    */
    $( '[data-toggle="tooltip"]' )
        .tooltip( { container: 'body' } )
        .css( 'cursor', 'pointer' );

    /** 
    * Modals
    */
    $( '.trigger-modal' ).on( 'click', function() {
        var type = $( this ).data( 'type' );
        var form = $('#form-' + type);
        var modal = $('#modal-' + type);

        if ( $( '#checkbox:checked' ).length <= 0 ) {
            $( '#modal-error' ).modal();
        } else {
            //Get all the selected items
            var itemList = $( 'input[name="item[]"]:checked' )
                .map( function() {
                    return this.value;
                })
                .get()
                .join(',');

            //Add all the items to the list
            $( '#item-list' ).val( itemList );
            
            //Open the modal 
            modal.modal();
        }
    })