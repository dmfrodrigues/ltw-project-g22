<form id="new-comment" class="answer" action="action_add_comment" method="post">
    <article class="comment">
        <span id="comment-user" class="user"><a href="profile.php?username=#">#</a></span>
        <a id="comment-profile-pic-a" class="profile-pic-a" href="profile.php?username?#"><img class="profile-pic" src="#"></a>
        <div id="comment-content">
            <textarea id="comment-text" class="comment-text" name="comment-text" placeholder="Write a comment..." rows="1"
                    oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
            <img id="comment-picture" class="comment-picture" src="">
        </div>
        <input type="submit" id="comment-submit" value="Submit">
    </article>
</form>
