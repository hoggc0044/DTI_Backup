<?php

// retrive search type
$search_Type = clean_input($dbconnect, $_REQUEST['search']);

echo "Search type = ".$search_Type;

if ($search_Type == "all") {
    $heading = "All Entries";
    $sql_conditions = "";
}

elseif($search_Type == "recent") {
    $heading = "Recent Entries";
    $sql_conditions = "ORDER BY q.ID DESC LIMIT 10";
}

elseif($search_Type == "random") {
    $heading = "Random Entries";
    $sql_conditions = "ORDER BY RAND() LIMIT 10";
}

elseif ($search_Type=="cat_char") {
    // retrieve author ID
    $author_ID = $_REQUEST['Cat_Char_ID'];

    $heading = "";
    $heading_type = "cat_char";

    $sql_conditions = "WHERE q.Cat_Char_ID = $cat_char_ID";
}

elseif ($search_Type=="Temperament") {
    // retrieve subject
    $Temperament_name = $_REQUEST['Temperament_name'];

    $heading = "";
    $heading_type = "Temperament";

    $sql_conditions = "
    WHERE
    s1.Temperament LIKE '$Temperament_name'
    OR s2.Temperament LIKE '$Temperament_name'
    OR s3.Temperament LIKE '$Temperament_name'
    OR s4.Temperament LIKE '$Temperament_name'
    OR s5.Temperament LIKE '$Temperament_name'
    ";
}

else {
    $heading = "No results test";
    $sql_conditions = "WHERE q.ID = 1000";
}

include ("results.php")

?>