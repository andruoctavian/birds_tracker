var sendMessage = function () {
    var chatWindow = $('.chat-window');
    var input = $('#chat-input');

    var message = $(input).val();
    $(input).val("");
    $(input).focus();

    $.post("/src/routes/chat.php", {msg: message}, function (data) {
        if (data) {
            var serverResponse = JSON.parse(data);
            var messageDiv = '<div class="row">' +
                    '<img src="' + serverResponse.profilePic + '" class="profile-thumbnail" alt="Profile picture">' +
                    '<div class="message self-message" title="' + serverResponse.title + '">' + serverResponse.body + '</div>' +
                    '<div class="chat-timestamp">(' + serverResponse.date + ')</div></div>';
            $(chatWindow).append(messageDiv);
        }
    });
};

var refreshMessage = function() {
    var chatWindow = $('.chat-window');

    $.get("/src/routes/chat.php", {refresh: true}, function (data) {
        if (data) {
           $(chatWindow).html("");
            var serverResponse = JSON.parse(data);
            serverResponse.messages.forEach(function (msg) {
                var isSelfMessage = (msg.user === serverResponse.userId) ? ' self-message' : '';
                var messageDiv = '<div class="row">' +
                    '<img src="' + msg.profilePic + '" class="profile-thumbnail" alt="Profile picture">' +
                    '<div class="message' + isSelfMessage + ' title="' + msg.title + '">' + msg.body + '</div>' +
                    '<div class="chat-timestamp">(' + msg.date + ')</div></div>';
                $(chatWindow).append(messageDiv);
            });
        }
    });
};

setInterval(function() {
    if ($('.chat-window').length > 0) {
        refreshMessage();
    }
}, 3000);