<?php

$all_results = get_data($dbconnect, $sql_conditions);

$find_query = $all_results[0];
$find_count = $all_results[1];

if($find_count == 1) {
    $result_s = "Result";
} 

else {
    $result_s = "Results";
}

// check that we have results
if ($find_count > 0) {

    if ($heading != "") {
        $heading = "<h2>$heading ($find_count $result_s)</h2>";
    } elseif ($heading_type == "Temperament") {
        $Temperament_name = ucwords($Temperament_name);
        $heading = "<h2>$Temperament_name Breeds ($find_count $result_s)</h2>";
    }

    echo $heading;

    while ($find_rs = mysqli_fetch_assoc($find_query)) {
        $Cat_Char_ID = $find_rs['Cat_Char_ID'];
        
        $breed_name = $find_rs['BreedName'];

        $alt_breed_name = $find_rs['AltBreedName'];

        $Temperament_1 = $find_rs['Temperament1'];
        $Temperament_2 = $find_rs['Temperament2'];
        $Temperament_3 = $find_rs['Temperament3'];
        $Temperament_4 = $find_rs['Temperament4'];
        $Temperament_5 = $find_rs['Temperament5'];

        $avg_kitten_price = $find_rs['AvgKittenPrice'];

        // put Temperaments into list to iterate through it
        $all_Temperaments = array($Temperament_1, $Temperament_2, $Temperament_3, $Temperament_4, $Temperament_5);

?>

        <div class="results">
            <?php echo '<span style="font-size: 20px; font-family: \'Roboto\', sans-serif; font-weight: bold;">' . $breed_name . '</span>'; ?> <br>
            <?php echo '<span style="font-size: 17px; font-family: \'Raleway\', sans-serif; font-style: italic;">Alt name: ' . $alt_breed_name . '</span>'; ?>





            <p>
                <?php

                // iterate through all Temperaments list and output if not blank

                foreach ($all_Temperaments as $Temperament) {
                    // ensure Temperament is not "n/a"
                    if ($Temperament != "n/a") {

                ?>
                        <span class="tag">
                            <a href="index.php?page=all_results&search=Temperament&Temperament_name=<?php echo $Temperament; ?>">
                                <?php echo $Temperament; ?>
                            </a>
                        </span>
                        &nbsp;&nbsp;

                    <?php

                    }
                }

                // if the user is logged in, show edit / delete options
                if (isset($_SESSION['admin'])) {
                    ?>
            <div class="tools">
                <a href="index.php?page=../admin/edit_entry&Cat_Char_ID=<?php echo $Cat_Char_ID; ?>"><i class="fa fa-edit fa-2x"></i></a> &nbsp; &nbsp;
                <a href="index.php?page=../admin/delete_confirm&Cat_Char_ID=<?php echo $Cat_Char_ID; ?>"><i class="fa fa-trash fa-2x"></i></a>
            </div>
        <?php
                }

        ?>
        </p>

        </div>

        <br />

    <?php

    } // while statement

} // check results

// if there are no results show an error message
else {

    ?>

    <h2> Oops...</h2>

    <div class="no-results">
        Doesn't look like we were able to find results for your search. Please check your search term and try again.
    </div>
    <br />

<?php

}


?>