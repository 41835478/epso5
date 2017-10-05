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
   // $( '[data-toggle="modal"]' ).on( 'click', function() {
   //      console.log( 'hello' );
   //      //$( $( this ).data( 'target' ) ).modal();
   // })

   $( '.button-inspection-click' ).on( 'click', function() {
        var item = $( this ).data( 'item' );
        $( '#form-inspection-update input[name=item]' ).val( item );
        $( '#modal-inspection' ).modal();
   });
       

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

    $('#modal-delete').on('hide.bs.modal', function() {
        $( '#item-list' ).val( '' );
    });