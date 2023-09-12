<?php include('views/partials/header.php'); ?>
<h1>My Blog</h1>
<p>We're going to add a new post.</p>

<form method="post" action="<?=$webRoot?>/blog">
    <?php if(isset($post)): ?>
        <input type="hidden" name="id" value="<?=$post->id; ?>" />
    <?php endif; ?>
    
    <input type="hidden" name="action" value="<?=$action?>" />

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?=$post->title ?? ''?>"><br />

    <label for="author">Author</label>
    <input type="text" id="author" name="author" value="<?=$post->author ?? ''?>"><br />

    <label for="excerpt">Excerpt</label>
    <input type="text" id="excerpt" name="excerpt" value="<?=$post->excerpt ?? ''?>"><br />

    <label for="contents">Contents</label>
    <textarea id="contents" name="contents" cols=20 rows=5><?=$post->contents ?? ''?></textarea><br />

    <input type="submit" value="Create"/>
</form>


<?php include('views/partials/footer.php'); ?>