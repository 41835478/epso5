/**
 *
 * ////////////////////////////
 * ////// * Form Functions  * //////
 * ////////////////////////////
 *
 */
    export default {
        form_action: form_action,
        form_clear: form_clear,
        form_comboBox: form_comboBox,
        form_select_create: form_select_create,
        select_all: select_all,
        text_area: text_area,
    };

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
    * Clear/Reset a form by ID
    */
    function form_clear( formID ) {
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
    * Creating a select combo box
    */
    function form_comboBox( container, selected, routePath ) {
        //Add loading class 
        container.empty().addClass( 'loading' );
        //Get the data via AJAX
        $.get( window.location.origin + routePath, { search: selected }, 
        function( data ) {
            //Generate the form select
            form_select_create( data, container );
        });
    }

    /** 
    * Creating a new form
    */
    function form_select_create( data, container ) {
        if( data.length > 0 ) {
            //First empty option field
            container.append( $( '<option>', { value: '', text : '' } ) );
            //Built the select
            $.each( data, function( index, element ) {
                container.append( $( '<option>', { 
                    value: element.id,
                    text : element.name
                }));
            });
            //Remove loading class, and enable the container
            container
                .prop( 'disabled', false )
                .prop( 'required', true )
                .removeClass( 'loading' );
        } else {
            //Remove loading class, and disable the container
            container
                .prop( 'disabled', true )
                .prop( 'required', false )
                .removeClass( 'loading' );
        }
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