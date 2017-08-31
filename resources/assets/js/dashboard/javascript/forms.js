/**
 *
 * ////////////////////////////
 * ////// * Form Functions  * //////
 * ////////////////////////////
 *
 */
     export default {
         clear_form: clear_form,
         select_all: select_all,
         form_action: form_action,
         text_area: text_area,
     };

     /** 
      * Clear/Reset a form by ID
      */
     function clear_form( formID ) {
        //Form container
        var form = $( '#' + formID );

        //Reset all the input, select and textareas
        form.find( 'input:text, input:hidden, input:password, input:file, select, textarea' )
            .not( 'input[name="_token"]' ).val('');

        //Reset all the checkboxes and radio buttons
        form.find( 'input:radio, input:checkbox' )
            .removeAttr( 'checked' )
            .removeAttr( 'selected' );

        //Submit the form
        form.submit();
     }

     /** 
      * Select or unselect all the checkboxes
      */
     function select_all() {
        //Get the checkboxes
        var target = $( this );
        var checkboxes = target.closest( 'form' ).find( ':checkbox' );
        var flag = target.is( ':checked' );
        var table = target.closest( 'table' ).find( 'tbody tr' );

        //Toogle the checkboxes
        checkboxes.prop( 'checked', flag );

        //Add active class 
        table.removeClass('selected');

        if( flag ) {
            table.addClass('selected');
        }
     }

     /** 
      * Update the form action, with a link/item (using the data-url="value")
      */
     function form_action( formID, item ) {
        //The form #id
        var form = $( '#' + formID );

        //Submit the form
        return form.attr( 'action', item.data( 'url' ) )
            ? form.submit()
            : false;
     }

     /** 
      * Count the characters of a textarea and print the output
      */
     function text_area() {
         //Get the containers
         var textarea = $( this );
         var message = $( '#textareaAlert-' + textarea.attr( 'id' ) );

         //Max length for textarea 
         var maxlength = textarea.attr( 'maxlength' );

         //Get the limit from maxlength attribute  
         var limit = parseInt( maxlength );

         //get the current text inside the textarea  
         var text = textarea.val();

         //Output the text
         return ( text.length > 0 ) 
            ? message.html( 'Ha escrito <b>' + text.length + '</b> caracteres de los ' + maxlength + ' permitidos' )
            : message.html('');
     }