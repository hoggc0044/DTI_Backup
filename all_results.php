<?php

// retrieve search type..
$search_type = $_REQUEST['search']; 

if ($search_type == "all") {
    $heading = "All Results ";
    $sql_conditions = "";
}

elseif($search_type == "recent") {
    $heading = "Recent Entries";
    $sql_conditions = "ORDER BY c.Cat_Char_ID DESC LIMIT 15";
}

elseif($search_type == "random") {
    $heading = "Random Entries";
    $sql_conditions = "ORDER BY RAND() LIMIT 15";
}

elseif($search_type == "temperament") {
    // retrieve temrapment
    $Temperament_name = $_REQUEST['Temperament_name'];

    $heading = "";
    $heading_type = "temperament";

    $sql_conditions = "
    WHERE 
    t1.Temperament = '$Temperament_name'
    OR t2.Temperament = '$Temperament_name'
    OR t3.Temperament = '$Temperament_name'
    OR t4.Temperament = '$Temperament_name'
    OR t5.Temperament = '$Temperament_name'
    ";
}

else {
    $heading = "No Results";
    $sql_conditions = "WHERE c.Cat_Char_ID = 1000";
}

include (
    "results.php"
);

?>
