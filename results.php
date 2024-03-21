<?php

$all_results = get_data($dbconnect, $sql_conditions);

$find_query = $all_results[0];
$find_count = $all_results[2];

if($find_count == 1) {
    $result_s = "Result";
}

else {$result_s = "Results";}

// Check that we have results
 if($find_count > 0) {

// }

// q => quotes table
// a => author table
// s => s1, s2, ad s3 are subjects

// $find_sql = "SELECT 

// 	q.*,
// 	a.*

// 	FROM Quotes q
// 	JOIN Author a ON a.Author_ID = q.Author_ID
// 	JOIN All_Subjects s1 ON q.Subject1_ID = s1.Subject_ID
// 	JOIN All_Subjects s2 ON q.Subject2_ID = s2.Subject_ID
// 	JOIN All_Subjects s3 ON q.Subject3_ID = s3.Subject_ID



// ";
// $find_query = mysqli_query($dbconnect, $find_sql);
// $find_rs = mysqli_fetch_assoc($find_query);
// $find_count = mysqli_num_rows($find_query);

if($heading != "" ) {
    $heading = "<h2>$heading ($find_count $result_s)</h2>";
}

elseif ($heading_Type=="author"){
    // retrieve author name
    $author_rs = get_item_name($dbconnect, 'author', 'Author_ID',
    $author_ID);

    $author_name = $author_rs['First']." ".$author_rs['Middle']." ".
    $author_rs['Last'];

    $author_name = "Someone";
    $heading = "<h2>$author_name Quotes ($find_count $result_s)</h2>";
}

elseif ($heading_type=="subject") {
    $subject_name = ucwords($subject_name);
    $heading = "<h2>$subject_name Quotes ($find_count $result_s)</h2>";
}



echo $heading;

while($find_rs = mysqli_fetch_assoc($find_query)) {
    $quote = $find_rs['Quote'];

    $author_first = $find_rs['First'];
    $author_middle = $find_rs['Middle'];
    $author_last = $find_rs['Last'];

    // Create full name of author
    $author_full = $find_rs['Full_Name']

    // get author ID for clickable author link


    ?>

    <div class="results">
        <?php echo $quote; ?>

        <p><i>
            <a href="index.php?page=all_results&search=author>
            Author_ID=<?php echo $author_ID; ?>">
                <?php echo $author_full; ?>
            </a>
        </i></p>

        <p>
        <?php
        // iterate through all_subjects list and output subject if it is not blank

        // Set up subject array!!

        // Get subject ID's
        $sub1_ID = $find_rs['Subject1_ID'];
        $sub2_ID = $find_rs['Subject2_ID'];
        $sub3_ID = $find_rs['Subject3_ID'];

        $all_subjects = array($sub1_ID, $sub2_ID, $sub3_ID);

        // You need to look up the subjects associated with each ID.

        foreach ($all_subjects as $subject) {
            // check the subject is not "n/a"
            if ($subject != "n/a") {
                
                ?>
                <span class="tag">
                    <a href="index.php?page=all_results&search=subject&
                    subject_name=<?php echo $subject; ?>">
                        <?php echo $subject;?>
                    </a>
                </span>
                &nbsp; &nbsp;

                <?php
            }

        }
        ?>
        </p>

    </div>

    <br />
    <?php

} // end of while loop

} // end of 'have results'


// we have not results!
else{
?>
    <p>Oops - nothing to see here.</p>
<?php

}


?>