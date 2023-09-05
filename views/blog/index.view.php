<?php include('views/partials/header.php'); ?>
<h1>My Blog</h1>
<p>Blog Home</p>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
        <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            
            <td><?=$post->title?></td>
            <td><?=$post->created_at?></td>
            <td>
                <form method="post" action="/blog?id=<?=$post->id; ?>">
                    <input type="hidden" name="action" value="delete" />
                    <input type="submit" value="Delete" />
                </form>
                <a href="/blog?id=<?=$post->id; ?>">View</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/blog?action=add">New Post</a>

<?php include('views/partials/footer.php'); ?>