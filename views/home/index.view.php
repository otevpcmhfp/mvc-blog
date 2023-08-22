<?php include('views/partials/header.php'); ?>
<h1>Welcome to my blog</h1>
<p>Welcome to my blog. Here's a list of my most recent blog posts.</p>

<!-- <table>
  <thead>
    <tr>
      <th>Title</th>
      <th>A</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>The table body</td>
      <td>with two columns</td>
    </tr>
  </tbody>
</table> -->

<?php if(count($recentPosts) > 0): ?>
    <ul>
        <?php foreach($recentPosts as $post): ?>
            <li>
                <a
                href="/blog?id=<?=$post['id'];?>"
                ><?=$post['title'];?></a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>


<?php include('views/partials/footer.php'); ?>