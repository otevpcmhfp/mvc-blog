<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/partials/css/app.css" />
    <title><?=$pageTitle ?? 'Home'?> | My Blog</title>
</head>
<header>
    <nav class="nav">
        <ul>
            <li><a href="<?=$webRoot?>/">Home</a></li>
            <li><a href="<?=$webRoot?>/blog">Blog</a></li>
            <li><a href="<?=$webRoot?>/session">Session</a></li>

            <?php if($isLoggedIn):?>
                <li><a href="<?=$webRoot?>/sign-in?action=sign-out">Sign Out</a></li>
            <?php else: ?>
                <li><a href="<?=$webRoot?>/sign-in">Sign In</a></li>
            <?php endif; ?>
        </ul>
        <?php if($isLoggedIn):?>
            <h3>Welcome back <?=$_SESSION['currentUser'];?>!</h3>
        <?php endif; ?>

    </nav>
</header>
<body>
<main>
<div class="container">