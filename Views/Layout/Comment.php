<select id="pub-type" name="rate">
    <option>5 - Loved it!</option>
    <option>4 - So good!</option>
    <option>3 - So-So...</option>
    <option>2 - Didn't Like</option>
    <option>1 - Hated it</option>
    <option>0 - Worst Content Ever</option>
</select>
<br/><br/><br/><br/>
<textarea name="comment-content" style="min-height: 200px; min-width: 100%"></textarea>
<input type="hidden" name="post_username" value="<?php echo $post_username; ?>">
<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
<button type="submit" name="submit-comment" value="create">Submit Comment</button>
<br/>
<hr>
<br/>
<?php

// $commenting = $db->GetAllCommentsForPost($post_id);

foreach ($comments as $comment) {

    echo "<h3>rated: ". $comment->getRating() . "</h3>";
    echo "<h3>". $comment->getAuthorId() . " said...</h3><br/>";
    echo "<p>" . $comment->getComment() . "</p><br/><br/>";
    echo "<hr><br/><br/>";
}

?>