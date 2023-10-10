<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=css("app.css")?>" />
    <title><?=$pageTitle ?? ''?> | My Blog</title>
</head>
<header>
    <nav class="nav">
        <ul>
            <li><a href="<?=href('/')?>">Home</a></li>
            <li><a href="<?=href('/blog')?>">Blog</a></li>

            <?php if(Auth::isLoggedIn()):?>
                <li><a href="<?=href('/sign-out')?>">Sign Out</a></li>
            <?php else: ?>
                <li><a href="<?=href('/sign-in')?>">Sign In</a></li>
                <li><a href="<?=href('/register')?>">Register</a></li>
            <?php endif; ?>
        </ul>
        <?php if(Auth::isLoggedIn()):?>
            <h3>Welcome back <?=Auth::currentUser()?>!</h3>
        <?php endif; ?>

    </nav>
</header>
<body>
<main>
<div class="container">