(function ($, DataTable) {
    "use strict";

    DataTable.ext.buttons.reset = {
        className: 'buttons-reset',

        text: function (dt) {
            return '<i class="fa fa-undo"></i>';
        },

        action: function (e, dt, button, config) {
            
            //Clear the inputs and selects
            $( 'select:not([name=dataTableBuilder_length])' ).val($( 'select option:first' ));
            if($( 'input,select' ).val( '' )){
                //Clear the table and the columns
                dt.columns().search('');
                dt.search('').draw();
            }
        }
    };

    DataTable.ext.buttons.reload = {
        className: 'buttons-reload',

        text: function (dt) {
            return '<i class="fa fa-refresh"></i>';
        },

        action: function (e, dt, button, config) {
            dt.draw(false);
        }
    };

    var org_buildButton = $.fn.DataTable.Buttons.prototype._buildButton;
    
    $.fn.DataTable.Buttons.prototype._buildButton = function(config, collectionButton) {
       var button = org_buildButton.apply(this, arguments);
       $(document).one('init.dt', function(e, settings, json) {
           if (config.container && $(config.container).length) {
              $(button.inserter[0]).detach().appendTo(config.container)
           }
       })    
       return button;
    }
})(jQuery, jQuery.fn.dataTable);
