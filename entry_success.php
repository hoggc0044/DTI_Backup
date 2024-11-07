<?php
// check if the user is logged in
if (isset($_SESSION['admin'])) {
    ?>

    <h1>Successfully inserted entry!</h1>
    <p>The entry you've submitted has been inserted successfully!</p>
    <p>Would you like to submit another one?</p>
    <span class="tag">
        <a href="index.php?page=../admin/add_entry">
            <?php echo "Add new entry"; ?>
        </a>
    </span>
    <span class="tag">
        <a href="index.php?page=all_results&search=all">
            <?php echo "Home"; ?>
        </a>
    </span>


    <?php
} else {
    // If the user is not logged in, redirect to login page
    $login_error = 'Please login to access this page';
    header("Location: index.php?page=../admin/login&error=$login_error");
    exit();
}
?>