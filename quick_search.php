<?php

// retrive search type
$search_type = $_POST['search_type'];
$search_type = $_POST['quick_search'];

// set up searches
$quote_search = "q.Quote LIKE '%search_term&'";

$subject_search = "
s1.Subject LIKE '%search_term%'
OR s2.Subject LIKE '%search_term%'
OR s3.Subject LIKE '%search_term%'
";

if ($search_type == "quote") {
    $sql_conditions = "WHERE $quote_search";
}

elseif ($search_type=="author") {
    $sql_conditions = "";
}

elseif ($search_type=="subject") {
    $sql_conditions = "WHERE $subject_search";
}

else {
    $sql_conditions = "";

}

include ("results.php")
?>