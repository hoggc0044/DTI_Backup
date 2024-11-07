<?php 

// function to 'clean' data
function clean_input($dbconnect, $data) {
	$data = trim($data);	
	$data = htmlspecialchars($data); //  needed for correct special character rendering
	// removes dodgy characters to prevent SQL injections
	$data = mysqli_real_escape_string($dbconnect, $data);
	return $data;
}

function get_data($dbconnect, $more_condition=null) {
	// c => cat_char table
	// f => fur table
	// l => lapcat table
	// t1,t2, t3, t4, t5 => Temperament IDs (from cat_char table)

	$find_sql = "SELECT 

	c.*, 
	f.*, 
	l.*, 
	t1.Temperament AS Temperament1, 
	t2.Temperament AS Temperament2, 
	t3.Temperament AS Temperament3, 
	t4.Temperament AS Temperament4, 
	t5.Temperament AS Temperament5

	FROM 
	Cat_Characteristics c

	JOIN Fur f ON f.Fur_ID = c.Fur_ID
	JOIN Lapcat l ON l.Lapcat_ID = c.Lapcat_ID
	JOIN Temperament t1 ON c.Temp1_ID = t1.Temp_ID
	JOIN Temperament t2 ON c.Temp2_ID = t2.Temp_ID
	JOIN Temperament t3 ON c.Temp3_ID = t3.Temp_ID
	JOIN Temperament t4 ON c.Temp4_ID = t4.Temp_ID
	JOIN Temperament t5 ON c.Temp5_ID = t5.Temp_ID

	";
	// if we have a WHERE condition, add it to the sql
	if($more_condition != null) {
		// add some extra string onto find sql
		$find_sql .= $more_condition;
	}

	$find_query = mysqli_query($dbconnect, $find_sql);
//	$find_rs = mysqli_fetch_assoc($find_query);
	$find_count = mysqli_num_rows($find_query);

	return $find_query_count = array($find_query, $find_count);
//	return $find_rs_count = array($find_query, $find_rs, $find_count);
}

function get_item_name($dbconnect, $table, $column, $Cat_Char_ID)
{
	$find_sql = "SELECT * FROM $table WHERE $column = $Cat_Char_ID";
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_rs = mysqli_fetch_assoc($find_query);

	return $find_rs;
}

// get search ID
function get_search_ID($dbconnect, $search_term)
{
	$find_sql = "SELECT * FROM `Temperament` WHERE `Temperament` LIKE '$search_term'
";
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_rs = mysqli_fetch_assoc($find_query);

	// count results
	$find_count = mysqli_num_rows($find_query);

	if($find_count == 1) {
		return $find_rs['Temp_ID'];
	}
	else{
		return "no results";
	}
}

// entity is temperaments; breed / alt breed name
function autocomplete_list($dbconnect, $item_sql, $entity)    
{
// Get entity / topic list from database
$all_items_query = mysqli_query($dbconnect, $item_sql);
    
// Make item arrays for autocomplete functionality...
while($row=mysqli_fetch_array($all_items_query))
{
  $item=$row[$entity];
  $items[] = $item;
}

$all_items=json_encode($items);
return $all_items;
    
}

?>