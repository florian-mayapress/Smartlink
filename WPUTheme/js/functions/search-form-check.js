/* ----------------------------------------------------------
  Search form
---------------------------------------------------------- */

var search_form_check = function() {
    var input = jQuery('#s');
    if (input.length > 0) {
        jQuery('#header-search').on('submit', function(e) {
            if (input.val().trim() === '') {
                e.preventDefault();
            }
        });
    }
};
jQuery(document).ready(search_form_check);