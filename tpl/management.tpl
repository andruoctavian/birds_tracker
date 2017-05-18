{foreach from=$posts item=post}
    <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <header>
            <img src="{$post->getUser()->getProfilePictureLink()}" class="profile-thumbnail">
            <strong>{$post->getUser()->getUsername()}</strong>
            <i class="glyphicon glyphicon-remove post-remove pull-right m-5" id="post_remove_{$post->getId()}"></i>
        </header>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p>{$post->getBody()}</p>
            {if $post->getType() == Post::IMG_TYPE}
                <p>
                    <img src="{$post->getMediaLink()}" class="img-rounded img-responsive">
                </p>
            {/if}
            {if $post->getType() == Post::VIDEO_TYPE}
                <p>
                    <video width="480" height="360" controls>
                        <source src="{$post->getMediaLink()}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </p>
            {/if}
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="gallery-comments" id="post_{$post->getId()}">
                {foreach from=$post->getComments() item=comment}
                    <div title="{$comment->getUser()->getUsername()}" class="comment-entry">
                        <img src="{$comment->getUser()->getProfilePictureLink()}" class="profile-thumbnail">
                        <div class="comment"><strong>{$comment->getUser()->getUsername()}:</strong> {$comment->getBody()}</div>
                        <div class="comment-timestamp">({$comment->getDateTime()})</div>
                        <i class="glyphicon glyphicon-remove comment-remove pull-right m-5" id="comment_remove_{$comment->getId()}"></i>
                    </div>
                {/foreach}
            </div>
        </div>
    </article>
{/foreach}

<script type="application/javascript">
    $(document).ready(function () {
        var content = $('#content');
        $(content).undelegate('.post-remove', 'click').delegate('.post-remove', 'click', function (event) {
            removePost(event);
        });
        $(content).undelegate('.comment-remove', 'click').delegate('.comment-remove', 'click', function (event) {
            removeComment(event);
        });

    });
</script>