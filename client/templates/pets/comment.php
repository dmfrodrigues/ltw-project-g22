<div id="comment" class="comment">
    <article class="comment">
        <span id="comment-user" class="user">
            <a href="profile.php?username="></a>
        </span>
        <a id="comment-profile-pic-a" class="profile-pic-a" href="profile.php?username=">
            <img class="profile-pic" src="">
        </a>
        <span id="comment-date" class="date">2020-31-12 00:00:00</span>
        <div id="comment-content">
            <p id="comment-text" class="comment-text"></p>
            <img id="comment-picture" class="comment-picture" src="">
        </div>
        <div id="comment-actions" class="actions" style="display: none;">
            <img id="action-edit"  class="icon" src="resources/img/edit.svg"  onclick="clickedCommentEdit (this.parentNode.parentNode.parentNode)" style="display: none;">
            <img id="action-reply" class="icon" src="resources/img/reply.svg" onclick="clickedCommentReply(this.parentNode.parentNode.parentNode)">
        </div>
    </article>
    <details id="comment-answers" class="comment-details" open>
        <summary></summary>
    </details>
</div>
