var postComment = function (event) {
    var input = event.target;
    var commentsWindow = $(input).parent().parent().find('.gallery-comments');

    var comment = $(input).val();
    var postId = $(commentsWindow).attr('id').split('post_').pop();
    $(input).val("");
    $(input).focus();

    $.post("/src/routes/gallery.php", {post_id: postId, body: comment, add: 'comment'}, function (data) {
        if (data) {
            var serverResponse = JSON.parse(data);
            var commentDiv = '<div class="comment-entry" title="' + serverResponse.username + '">' +
                '<img src="' + serverResponse.profilePic + '" class="profile-thumbnail" alt="Profile pic">' +
                '<div class="comment"><strong>' + serverResponse.username + ':</strong> ' + serverResponse.body + '</div>' +
                '<div class="comment-timestamp">(' + serverResponse.date + ')</div></div>';
            $(commentsWindow).append(commentDiv);
        }
    });
};

var refreshPosts = function () {
    setTimeout(function () {
        $.get("/src/routes/gallery.php", function (webContent) {
            $(content).html(webContent);
        });
    }, 1000);
};