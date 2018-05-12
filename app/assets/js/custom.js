/**
 * Created by Rashad on 10-May-18.
 */
(function   ($) {
    $(document).ready(function () {
        $(".pagination").customPaginate(
        {
            itemsToPaginate : ".question"
        });
    });
})(jQuery);