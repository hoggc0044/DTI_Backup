<div class = "admin-form">

<h2>Login</h2>

<form action="index.php?page=../admin/adminlogin" method="post">
    <p><input name="username" placeholder="Username" /></p>
    <p><input name="password" placeholder="Password" type="password" /></p>

    <?php

    if (isset($_GET['error'])) {
        ?>
        <span class="error">
            <?php echo $_GET['error'] ?>
        </span>

        <?php
    } // end of get error if 

    ?>

    <p><input class="form-submit" type="submit" name="login" value="Log In" /></p>
</form>

<p> Site Administrator? </p>

<p> Easy! All you need to do is log in with the password you've been given </p>

<p> Once you've logged in, all the administrative tools you need will be enabled, allowing you to add, edit, and remove entires on this site.</p>

</div>