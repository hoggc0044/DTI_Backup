<?php

// check iser is logged
if (isset($_SESSION['admin'])) {

    if(isset($_REQUEST['submit']))
{

// retrieve quote and author ID from form
// check they are integers (in case someone edits the URL)
$Cat_Char_ID = filter_var($_REQUEST['ID'], FILTER_SANITIZE_NUMBER_INT);
include("process_form.php");

		
$stmt = $dbconnect->prepare("UPDATE `Cat_Characteristics` SET `BreedName` = ?, `AltBreedName` = ?, `Fur_ID` = ?, `Lapcat_ID` = ?, `MaleWtKg` = ?, `AvgKittenPrice` = ?, `Temp1_ID` = ?, `Temp2_ID` = ?, `Temp3_ID` = ?, `Temp4_ID` = ?, `Temp5_ID` = ? WHERE Cat_Char_ID = ?;");
$stmt->bind_param("ssiiiiiiiiii", $BreedName, $AltBreedName, $Fur_ID, $Lapcat_ID, $MaleWtKg, $AvgKittenPrice, $Temp1_ID, $Temp2_ID, $Temp3_ID, $Temp4_ID, $Temp5_ID, $Cat_Char_ID);
$stmt->execute();
// Close stmt once everything has been inserted
$stmt -> close();

$heading = "";
$heading_type = "edit_success";
$sql_conditions = "WHERE ID = $Cat_Char_ID";

include("content/results.php");

}   // end pushing of the submit button

} // end user logged on it

else {
    $login_error = 'Please login to access this page';
    header("Location: index.php?page=../admin/login&error=$login_error");
}





?>