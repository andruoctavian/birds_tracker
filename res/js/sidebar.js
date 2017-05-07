$(document).ready(function () {
    var tabs =  $('.tab');
    $(tabs).hide();
    $('#news-feed').show();

    var contentSwitcher  = function (clickEvent) {
       var linkBtn = clickEvent.target;
       var content = $(linkBtn).attr('data-toggle');
       $(tabs).hide();
       $(content).show();
    };

    $('.sidebar').on('click', '.menu-link', contentSwitcher);
});