<?php

// if the user is logged in, show edit / delete options
if (isset($_SESSION['admin'])) {

// retrieve quote ID and sanitise it incase someone edits URL
$Cat_Char_ID = filter_var($_REQUEST['Cat_Char_ID'], FILTER_SANITIZE_NUMBER_INT);

// adjust heading and find quote
$heading_type = "delete_entry";
$heading = "";
$sql_conditions = "WHERE Cat_Char_ID = $Cat_Char_ID";

include("content/results.php");

//$authorID = $find_rs['Author_ID'];

?>

<p>
    <span class="tag white-tag">
    <a href="index.php?page=../admin/delete_entry&Cat_Char_ID=<?php echo $Cat_Char_ID; ?>">Yes, delete it!</a>
    </span>

    &nbsp;

    <span class="tag white-tag">
    <a href="javascript:history.back()">No, take me back</a>
    </span>  
</p>

<?php

} // end user logged in

else {
    $login_error = 'Please log in to access this page';
    header("Location: index.php?page=../admin/login& error=$login_error");
}



?>