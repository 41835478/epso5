<?php 

namespace App\Services\DataTables\Javascript;

trait JqueryCallback {

    /**
     * Return the fnDrawCallback behavior function for the  datatables javascript
     * Basicly, call all the jquery method when its ready
     * @return array
     */
    protected function jqueryCallback()
    {
        return "
            //Hide (if no results) or show pagination
            function(){
                //Get the total pages 
                var pages = this.DataTable().page.info().pages;
                //Show hide pagination
                if(pages <= 1) {
                    $('#dataTableBuilder_paginate').hide();
                }
                else{
                    $('#dataTableBuilder_paginate').show();
                }
                $('[data-toggle=\"tooltip\"]').tooltip({container: 'body'}).css('cursor', 'pointer');
                //Filter exact search 
                $('.number').each(function(element, index) {
                    var filter = $(index).val().replace('^', '').replace('$', '');
                    $(index).val(filter);
                });
                {$this->customJqueryCallback()}
            }
        ";
    }
}