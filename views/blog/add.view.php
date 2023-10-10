<h1><?=$pageTitle?></h1>
<p>We're going to <?=isset($post) ? 'update an existing' : 'create a new'?> post.</p>

<a href="<?=href("/blog")?>">Back</a>

<form method="post" action="<?=href("/blog/" . (isset($post) ? 'show' : 'create'))?>">
    <?php if(isset($post)): ?>
        <input type="hidden" name="id" value="<?=$post->id; ?>" />
    <?php endif; ?>

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?=$post->title ?? ''?>"><br />

    <label for="author">Author</label>
    <input type="text" id="author" name="author" value="<?=$post->author ?? ''?>"><br />

    <label for="excerpt">Excerpt</label>
    <input type="text" id="excerpt" name="excerpt" value="<?=$post->excerpt ?? ''?>"><br />

    <label for="contents">Contents</label>
    <textarea id="contents" name="contents" cols=20 rows=5><?=$post->contents ?? ''?></textarea><br />

    <input type="submit" value="<?=isset($post) ? 'Update' : 'Create'?>"/>
</form>