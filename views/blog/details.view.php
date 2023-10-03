<?php include('../views/partials/header.php'); ?>
<h1><?=$post->title; ?></h1>
<ul>
    <li><strong>Author:</strong> <?=$post->author; ?></li>
    <li><strong>Excerpt:</strong> <?=$post->excerpt; ?></li>
    <li><strong>Created At:</strong> <?=$post->created_at; ?></li>
</ul>

<div>
<strong>Contents:</strong><br/>
<?=nl2br($post->contents)?>
</div>

<a href="<?=$webRoot?>/blog?id=<?=$post->id; ?>&action=edit">Edit</a>

<?php include('../views/partials/footer.php'); ?>