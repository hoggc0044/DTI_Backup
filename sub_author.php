<?php

// get all subjects from database
$all_tags_sql = "SELECT * FROM Temperament ORDER BY Temperament ASC ";
$all_Temperaments = autocomplete_list($dbconnect, $all_tags_sql, 'Temperament');

// initialise subject variables
$tag_1 = "";
$tag_2 = "";
$tag_3 = "";
$tag_4 = "";
$tag_5 = "";

// initalise tag ID's
$tag_1_ID = $tag_2_ID = $tag_3_ID = $tag_4_ID = $tag_5_ID = 0;

// get author full name from database

?>