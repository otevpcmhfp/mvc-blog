**myblog.sql**

```sql
-- Create the database
DROP DATABASE IF EXISTS myblog;
CREATE DATABASE myblog;
USE myblog;

CREATE TABLE posts (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    author VARCHAR(50) NOT NULL,
    excerpt VARCHAR(100) NOT NULL,
    contents TEXT(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO mybloguser@localhost
IDENTIFIED BY 'myblogpw';
```

---

**models/db.php/**

```php
<?php
    $dsn = 'mysql:localhost;dbname=myblog';
    $username = 'mybloguser';
    $password = 'myblogpw';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e){
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
?>
```

---

**index.php**

```php
<?php
require 'models/db.php';

// Get the requested path
$route = parse_url($_SERVER['REQUEST_URI'])['path'];

// Our list of routes
$routes = [
    '/' => 'controllers/HomeController.php',
    '/blog' => 'controllers/BlogController.php',
];

// Check our routes map to see if we have a place to go
if(array_key_exists($route, $routes)) {
    require($routes[$route]);
} else {
    http_response_code(404);
    require('404.php');
}
```

---

**views/404.php**

```php
<?php include('views/partials/header.php'); ?>
<h1>Oops! Page Not Found</h1>
<p>Sorry, we could not find the page you were looking for.</p>
<a href="/">Back Home</a>
<?php include('views/partials/footer.php'); ?>

```

---

**views/home/index.view.php**

```php
<?php include('views/partials/header.php'); ?>
<h1>Welcome to my blog</h1>
<p>Welcome to my blog. Here's a list of my most recent blog posts.</p>

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
```

---

**views/blog/index.view.php**

```php
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
            
            <td><?=$post['title']?></td>
            <td><?=$post['created_at']?></td>
            <td>
                <form method="post" action="/blog?id=<?=$post['id']?>">
                    <input type="hidden" name="action" value="delete" />
                    <input type="submit" value="Delete" />
                </form>
                <a href="/blog?id=<?=$post['id']?>">View</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/blog?action=add">New Post</a>

<?php include('views/partials/footer.php'); ?>
```

---

**views/blog/add.view.php**

```php
<?php include('views/partials/header.php'); ?>
<h1>My Blog</h1>
<p>We're going to add a new post.</p>

<form method="post" action="/blog">
    <?php if(isset($post)): ?>
        <input type="hidden" name="id" value="<?=$post['id']?>" />
    <?php endif; ?>
    
    <input type="hidden" name="action" value="<?=$action?>" />

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?=$post['title'] ?? ''?>"><br />

    <label for="author">Author</label>
    <input type="text" id="author" name="author" value="<?=$post['author'] ?? ''?>"><br />

    <label for="excerpt">Excerpt</label>
    <input type="text" id="excerpt" name="excerpt" value="<?=$post['excerpt'] ?? ''?>"><br />

    <label for="contents">Contents</label>
    <textarea id="contents" name="contents" cols=20 rows=5><?=$post['contents'] ?? ''?></textarea><br />

    <input type="submit" value="Create"/>
</form>


<?php include('views/partials/footer.php'); ?>
```

---

**views/blog/details.view.php**

```php
<?php include('views/partials/header.php'); ?>
<h1><?=$post['title']?></h1>
<ul>
    <li><strong>Author:</strong> <?=$post['author']?></li>
    <li><strong>Excerpt:</strong> <?=$post['excerpt']?></li>
    <li><strong>Created At:</strong> <?=$post['created_at']?></li>
</ul>

<div>
<strong>Contents:</strong><br/>
<?=nl2br($post['contents'])?> 
</div>

<a href="/blog?id=<?=$post['id']?>&action=edit">Edit</a>

<?php include('views/partials/footer.php'); ?>
```

---

**views/partials/header.php**

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/partials/app.css" />
    <title><?=$pageTitle ?? 'Home'?> | My Blog</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/blog">Blog</a></li>
        </ul>
    </nav>
</header>
<body>
<main>
<div class="container">
```

---

**views/partials/footer.php**

```php
</div>
</main>
<footer>
    &copy; 2023 - My Blog
</footer>
</body>
</html>
```

---

**views/partials/app.css**

```css
:root {
    font-size: 14px;
    line-height: 1.75;
}

*,
*::before,
*::after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
    -webkit-text-size-adjust: 100%;
}
  
body {
    height: 100vh;
    width: 100%;
    max-width: 100%;
    display: grid;
    grid-template-rows: auto 1fr auto;
    grid-template-columns: 1fr;
    row-gap: 1rem;
}

header {
    padding: 1rem;
    grid-row: 1 / 2;
    margin: 0 auto;
}

main {
    grid-row: 2 / 3;
    padding: 1rem;
}

footer {
    grid-row: 3 / 4;
}

table, td, th {
    border: 1px solid;
}

td {
    padding: 0 .5rem;
}
  
table {
    /* width: 100%; */
    border-collapse: collapse;
}

.container {
    padding: 1rem;
    margin: 0 auto;
    width: 500px;
    border: 1px solid #000000;
}
```

---

**models/BlogModel.php/**

```php
<?php
require_once("db.php");

function allPosts() {
    global $db;

    $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts";

    $statement = $db->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll();
    $statement->closeCursor();
    return $posts;
}

function recentPosts() {
    global $db;

    $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts
    LIMIT 5";

    $statement = $db->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $posts;
}

function getPost($id) {
    global $db;

    $query = "SELECT id,title,author,excerpt,contents,created_at
    FROM myblog.posts
    WHERE id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $posts = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $posts;
}

function addPost($title,$author,$excerpt,$contents) {
    try {
        global $db;

        $query = 'INSERT INTO myblog.posts (title,author,excerpt,contents)
        VALUES (:title,:author,:excerpt,:contents)';
    
        $statement = $db->prepare($query);
        $statement->bindValue(':title',$title);
        $statement->bindValue(':author',$author);
        $statement->bindValue(':excerpt',$excerpt);
        $statement->bindValue(':contents',$contents);
        $statement->execute();
        $statement->closeCursor();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }

}

function updatePost($id,$title,$author,$excerpt,$contents) {
    global $db;

    $query = 'UPDATE myblog.posts
    SET title = :title,
    author = :author,
    excerpt = :excerpt,
    contents = :contents
    WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':title',$title);
    $statement->bindValue(':author',$author);
    $statement->bindValue(':excerpt',$excerpt);
    $statement->bindValue(':contents',$contents);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();
}

function deletePost($id) {
    global $db;

    $query = 'DELETE FROM myblog.posts
    WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();
}
```

---

**controllers/HomeController.php/**

```php
<?php
require('models/BlogModel.php');
$pageTitle = "Home";

$recentPosts = recentPosts();
require "views/home/index.view.php";
exit();


```

---

**controllers/BlogController.php/**

```php
<?php
require('models/BlogModel.php');

$id = $_GET['id'] ?? $_POST['id'] ?? null;
$method = $_SERVER["REQUEST_METHOD"];
$action = $_POST['action'] ?? $_GET['action'] ?? null;

// die("$id - $method - $action");

// GET
// /blog
if(!isset($action) && !isset($id) && $method === 'GET') {
    $posts = allPosts();
    require 'views/blog/index.view.php';
    exit();
}

// GET
// /blog?action=add
if($action === 'add' && $method === 'GET') {
    require 'views/blog/add.view.php';
    exit();
}

// POST
// /blog?action=add
if(!isset($id) && $action === 'add' && $method === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $excerpt = $_POST['excerpt'] ?? '';
    $contents = $_POST['contents'] ?? '';
    addPost($title,$author,$excerpt,$contents);
    header("Location: /blog");
    exit();
}


// GET
// /blog/id=[id]
if(!isset($action) && isset($id) && $method === 'GET') {
    $post = getPost($id);
    require "views/blog/details.view.php";
    exit();
}

// GET
// /blog/id=[id]&action=edit
if(isset($id) && $method === 'GET' && $action === 'edit') {
    $post = getPost($id);
    require "views/blog/add.view.php";
    exit();
}

// POST
// /blog/id=[id]&action=edit
if(isset($id) && $method === 'POST' && $action === 'edit') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $excerpt = $_POST['excerpt'] ?? '';
    $contents = $_POST['contents'] ?? '';
    updatePost($id,$title,$author,$excerpt,$contents);
    header("Location: /blog?id=$id&action=edit");
    exit();
}

// DELETE
// /blog/id=[id]
if(isset($id) && $method === 'POST' && $action === 'delete') {
    deletePost($id);
    header("Location: /blog");
}
```
