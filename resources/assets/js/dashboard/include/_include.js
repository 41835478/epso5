/**
 * Place the CSRF token as a header on all pages for access in AJAX requests
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

/**
 * Avoid using enter with forms
 */
$(window).keydown(function(event){
    if(event.keyCode == 13) {
        event.preventDefault();
        return false;
    }
});

/**
 * Extend date propiety
 */
Date.prototype.addDays = function(days) {
    this.setDate(this.getDate() + parseInt(days));
    return this;
};