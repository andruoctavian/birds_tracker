$(document).ready(function () {
    var contentSwitcher  = function (clickEvent) {
       var linkBtn = clickEvent.target;
       var route = $(linkBtn).attr('data-toggle');

       $.get("/src/routes/" + route + ".php", function (webContent) {
          $('#content').html(webContent);
       });
    };

    $('.sidebar').on('click', '.menu-link', contentSwitcher);
});