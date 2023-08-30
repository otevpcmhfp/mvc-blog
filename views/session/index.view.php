<?php include('views/partials/header.php'); ?>
<h1>My Blog</h1>
<p>Sessions</p>

<div>
    Session: <?php var_dump($_SESSION)?>
</div>
<div>
    Session Status: <?php var_dump(session_status() === PHP_SESSION_ACTIVE)?>
</div>


<div>
    <form method="post" action="/session">
        <input type="hidden" name="action" value="populate" />
        <input type="submit" value="Populate Session" />
    </form>
</div>

<div>
    <form method="post" action="/session">
        <input type="hidden" name="action" value="destroy" />
        <input type="submit" value="Destroy Session" />
    </form>
</div>


<?php include('views/partials/footer.php'); ?>