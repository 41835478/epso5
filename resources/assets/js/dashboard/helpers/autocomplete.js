/**
 *
 * ////////////////////////////
 * ////// * Autocomplete Functions  * //////
 * ////////////////////////////
 *
 */

    export default {
        container: container,
        onSelect: onSelect,
        renderItem: renderItem,
    };

    function renderItem( item ) {
        // var search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&' );
        // var replace = new RegExp( "(" + search.split( ' ' ).join( '|' ) + ")", "gi" );
        return '<div class="autocomplete-suggestion" data-id="' + item[ 'id' ] + '" data-title="' + item[ 'name' ] + '">'
            //+ '<span class="item-number">' + item[ 'id' ] + '</span> - ' + item[itemName].replace(replace, "<b>$1</b>") 
            + '<span class="item-number">' + item[ 'id' ] + '</span> - ' + item[ 'name' ] + '</div>';
    };

    function onSelect( containerRoot, item ) {
        $(container( containerRoot )).val( item.data( 'title' ) );
        $(container( containerRoot, 'id' )).val( item.data( 'id' ) );
    }

    function container( name, type ) {
        if (type === undefined) {
            type = 'name';
        }
        if( type == 'id') {
            return '#' + name + '_id';
        }
        return '#' + name + '_name';
    }