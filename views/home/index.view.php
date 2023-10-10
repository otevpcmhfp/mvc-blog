<h1><?=$pageTitle?></h1>
<p>Welcome to my blog. Here's a list of my most recent blog posts.</p>

<?php if(count($recentPosts) > 0): ?>
    <ul>
        <?php foreach($recentPosts as $post): ?>
            <li>
                <a
                href="<?=href("/blog/show?id=$post->id")?>"><?=$post->title;?></a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

