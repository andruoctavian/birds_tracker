<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
    <article>
        <header>
            <h3>Live Chat</h3>
        </header>
        <div class="chat-window">
            {foreach from=$messages item=message}
                {if $message->getUser()->getUsername() == $username}
                    {assign var='self_class' value='self-message'}
                {else}
                    {assign var='self_class' value=''}
                {/if}
                <div class="row">
                    <img src="{$message->getUser()->getProfilePictureLink()}" class="profile-thumbnail">
                    <div class="message {$self_class}" title="by {$message->getUser()->getUsername()} at {$message->getDateTime()}">{$message->getBody()}</div>
                    <div class="chat-timestamp">({$message->getDateTime()})</div>
                </div>
            {/foreach}
        </div>
        <div class="input-group">
            <input type="text" name="message" id="chat-input" class="form-control" placeholder="Write a message..." autofocus>
            <span class="input-group-addon" id="chat-send" title="Send Message"><i class="glyphicon glyphicon-send"></i></span>
        </div>
    </article>
</div>
<script type="application/javascript">
    $(document).ready(function () {
        var content = $('#content');
        $(content).undelegate('#chat-send', 'click').delegate('#chat-send', 'click', sendMessage);
        $(content).undelegate('#chat-input', 'keyup').delegate('#chat-input', 'keyup', function (event) {
            if (event.keyCode === 13) {
                sendMessage();
            }
        });
    });
</script>