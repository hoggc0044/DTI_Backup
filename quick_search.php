<?php

// retrieve search type..
$search_type = $_REQUEST['search_type']; 
$search_term = $_REQUEST['quick_search']; 

// set searches up
$breed_search = "c.BreedName LIKE '%$search_term%'";
$temp_search = "
t1.Temperament LIKE '%$search_term%'
OR t2.Temperament LIKE '%$search_term%'
OR t3.Temperament LIKE '%$search_term%'
OR t4.Temperament LIKE '%$search_term%'
OR t5.Temperament LIKE '%$search_term%'
";

if ($search_type == "breed") {
    $sql_conditions = "WHERE $breed_search";
}

elseif($search_type == "Temperament") {
    $sql_conditions = "WHERE $temp_search";
}

else {
    $sql_conditions = "
    WHERE $breed_search OR $temp_search
    ";}

$heading = "'$search_term' entries";

include (
    "results.php"
);

?>
