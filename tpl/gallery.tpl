<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <header>
        <h3>Add a new post</h3>
    </header>
    <form class="form-post" method="post" action="/src/routes/gallery.php" enctype="multipart/form-data" target="upload_target" onsubmit="refreshPosts()">
        <input type="text" name="body" class="form-control" placeholder="Description" id="post-body-input" required>
        <input type="file" name="file" class="form-control-file" id="post-file-input">
        <input type="hidden" name="add" value="post">
        <button class="btn btn-danger" id="post_submit">Post</button>
    </form>
</article>
<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
{foreach from=$posts item=post}
    <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <header>
            <img src="{$post->getUser()->getProfilePictureLink()}" class="profile-thumbnail">
            <strong>{$post->getUser()->getUsername()}</strong>
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
                    </div>
                {/foreach}
            </div>
            <div class="input-group">
                <input type="text" name="comment" class="form-control comment-input" placeholder="Write a comment..." autofocus>
                <span class="input-group-addon comment-post" title="Post Comment"><i class="glyphicon glyphicon-comment"></i></span>
            </div>
        </div>
    </article>
{/foreach}

<script type="application/javascript">
    $(document).ready(function () {
        var content = $('#content');
        $(content).undelegate('.comment-post', 'click').delegate('.comment-post', 'click', function (event) {
            postComment(event);
        });
        $(content).undelegate('.comment-input', 'keyup').delegate('.comment-input', 'keyup', function (event) {
            if (event.keyCode === 13) {
                postComment(event);
            }
        });
    });
</script>