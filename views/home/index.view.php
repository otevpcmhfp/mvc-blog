<?php include('views/partials/header.php'); ?>
<h1>Welcome to my blog</h1>
<p>Welcome to my blog. Here's a list of my most recent blog posts.</p>

<?php if(count($recentPosts) > 0): ?>
    <ul>
        <?php foreach($recentPosts as $post): ?>
            <li>
                <a
                href="<?=$webRoot?>/blog?id=<?=$post->id;?>"
                ><?=$post->title;?></a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>


<?php include('views/partials/footer.php'); ?>