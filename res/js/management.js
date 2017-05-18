var removePost = function (event) {
    var id = $(event.target).attr('id').split('post_remove_').pop();
    $.post("/src/routes/management.php", {remove: "post", id: id}, function (event) {
        $.get("/src/routes/management.php", function (webContent) {
            $(content).html(webContent);
        });
    });
};

var removeComment = function (event) {
    var id = $(event.target).attr('id').split('comment_remove_').pop();
    $.post("/src/routes/management.php", {remove: "comment", id: id}, function (event) {
        $.get("/src/routes/management.php", function (webContent) {
            $(content).html(webContent);
        });
    });
};