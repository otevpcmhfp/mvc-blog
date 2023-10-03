<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css" />
    <title><?=$pageTitle ?? 'Home'?> | My Blog</title>
</head>
<header>
    <nav class="nav">
        <ul>
            <li><a href="<?=$webRoot?>/">Home</a></li>
            <li><a href="<?=$webRoot?>/blog">Blog</a></li>

            <?php if($auth->isLoggedIn()):?>
                <li><a href="<?=$webRoot?>/sign-out">Sign Out</a></li>
            <?php else: ?>
                <li><a href="<?=$webRoot?>/sign-in">Sign In</a></li>
                <li><a href="<?=$webRoot?>/register">Register</a></li>
            <?php endif; ?>
        </ul>
        <?php if($auth->isLoggedIn()):?>
            <h3>Welcome back <?=$auth->currentUser()?>!</h3>
        <?php endif; ?>

    </nav>
</header>
<body>
<main>
<div class="container">