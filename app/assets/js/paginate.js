/**
 * Created by Rashad on 10-May-18.
 */
(function($) {

    $.fn.customPaginate = function (options)
    {

        var paginationContainer = this;
        var itemsToPaginate;

        var defaults ={
            itemsPerPage : 1
        };
        var settings = {};

        $.extend(settings,defaults,options);

        itemsToPaginate = $(settings.itemsToPaginate);

        var numberOfPaginationLinks = Math.ceil((itemsToPaginate.length / settings.itemsPerPage));
        paginationContainer.prepend("<ul></ul>");

        for(var index=0;index<numberOfPaginationLinks;index++)
        {
            paginationContainer.find("ul").append("<li>"+ (index+1) + "</li>");
        }

        itemsToPaginate.filter(":gt("+(settings.itemsPerPage-1)+")").hide();

        paginationContainer.find("ul li").on('click',function () {
            var linkNumber = $(this).text();

            var itemsToHide = itemsToPaginate.filter(":lt("+((linkNumber-1)*settings.itemsPerPage)+")");
            $.merge(itemsToHide,itemsToPaginate.filter(":gt("+((linkNumber*settings.itemsPerPage)-1)+")"));
            itemsToHide.hide(1000);

            var itemsToShow = itemsToPaginate.not(itemsToHide);
            itemsToShow.show(1000);
        })
    }
}(jQuery));