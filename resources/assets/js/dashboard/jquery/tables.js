/**
 *
 * ////////////////////////////
 * ////// * Jquery Tables / DataTables  * //////
 * ////////////////////////////
 *
 */
    /** 
    * Select row
    */
    // Removed click from the action column
    $( '#dataTableBuilder' ).on( 'click', 'tbody tr td:last-child', function( e ) {
        e.stopPropagation();
    });

    // Handle click on checkbox
    $( '#dataTableBuilder' ).on( 'click', 'tbody tr', function( event ) {
        //Set variables
        var checkbox = $( this ).find( ':checkbox' );
        checkbox.prop( 'checked', !checkbox.is( ':checked' ) );
        //If checked and is not selected -> then select
        if( checkbox.is( ':checked' ) ) {
            $( this ).addClass( 'selected' );
        } else {
            $( this ).removeClass( 'selected' );
        }
        //Stop the action
        event.stopPropagation();
    });

    $( '.buttons-select-all,.buttons-select-none' ).on( 'click', function( event ) {
        var tr = $( '#dataTableBuilder tbody tr');
        var checkbox = tr.find( ':checkbox' );
        if( tr.hasClass( 'selected' ) ) {
            checkbox.prop( 'checked', true );
        } else {
            checkbox.prop( 'checked', false );
        }
        //Stop the action
        event.stopPropagation();
    });