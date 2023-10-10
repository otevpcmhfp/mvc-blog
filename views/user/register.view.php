<h1><?=$pageTitle?></h1>
<p>Register a new account</p>

<form method="post" action="<?=href("/register")?>">
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name"><br />

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name"><br />

    <label for="email">Email</label>
    <input type="email" id="email" name="email"><br />

    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br />

    <input type="submit" value="Register"/>
</form>