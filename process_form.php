<?php

// retrieve data from form
$BreedName = $_REQUEST['BreedName'];

$AltBreedName = $_REQUEST['AltBreedName'] ?: "n/a";  // Fallback if blank

$Fur_ID = $_REQUEST['FurType'];

$Lapcat_ID = $_REQUEST['LapcatType'];

$MaleWtKg = $_REQUEST['MaleWtKg'];

$AvgKittenPrice = $_REQUEST['AvgKittenPrice'];

$Temperament1 = $_REQUEST['Temperament1'];
$Temperament2 = $_REQUEST['Temperament2'];
$Temperament3 = $_REQUEST['Temperament3'];
$Temperament4 = $_REQUEST['Temperament4'];
$Temperament5 = $_REQUEST['Temperament5'];

// Initialise IDs
$Temp1_ID = $TempID_2 = $TempID_3 = $TempID_4 = $TempID_5 = $Fur_ID = $Lapcat_ID = $Cat_Char_ID = "";
$Fur_ID = 0;
$Lapcat_ID = 0;

// handle blank fields
if ($AltBreedName == "") {
    $AltBreedName = "n/a";
}

if ($Temperament2 == "") {
    $Temperament2 = "n/a";
}

if ($Temperament3 == "") {
    $Temperament3 = "n/a";
}

if ($Temperament4 == "") {
    $Temperament4 = "n/a";
}

if ($Temperament5 == "") {
    $Temperament5 = "n/a";
}


// check to see if Temperament is already in DB, if not, add it

$Temperaments = array($Temperament1, $Temperament2, $Temperament3, $Temperament4, $Temperament5);
$Temp_IDs = array();

// statement to insert Temperament/s
$stmt = $dbconnect -> prepare("INSERT INTO `Temperament` (`Temperament`) VALUES (?); ");

foreach ($Temperaments as $Temperament) {
    $Temp_ID = get_search_ID($dbconnect, $Temperament);

    if($Temp_ID == "no results") {

        // insert the Temperament
        $stmt -> bind_param("s", $Temperament);
        $stmt -> execute();

        // retrieve Temperament ID
        $Temp_ID = $dbconnect->insert_id;
    }

    echo "temperament ID: ".$Temp_ID."<br>";

    $Temp_IDs[] = $Temp_ID;
}

var_dump($_POST);

// retrieve Temperament IDs
$TempID_1 = $Temp_IDs[0];
$TempID_2 = $Temp_IDs[1];
$TempID_3 = $Temp_IDs[2];
$TempID_4 = $Temp_IDs[3];
$TempID_5 = $Temp_IDs[4];

?>
