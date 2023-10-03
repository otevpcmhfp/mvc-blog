<?php include view('partials/header.php'); ?>
    <h1>Sign In</h1>
    <p>Sign in to manage your posts</p>

    <form method="post" action="<?=$webRoot?>/sign-in">
        <input type="hidden" name="action" value="sign-in" />

        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br />

        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br />

        <input type="submit" value="Sign In"/>
    </form>


<?php include view('partials/footer.php'); ?>