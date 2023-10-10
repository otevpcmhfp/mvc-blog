<h1><?=$pageTitle?></h1>
<p>Blog Entries</p>

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
                <form method="post" action="<?=href('/blog/delete')?>">
                    <input type="hidden" name="id" value="<?=$post->id?>" />
                    <input type="submit" value="Delete" />
                </form>
                <a href="<?=href("/blog/show?id=$post->id")?>">View</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?=href("/blog/create")?>">New Post</a>