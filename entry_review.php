<?php
// check if the user is logged in
if (isset($_SESSION['admin'])) {

    // Query to get the most recent entry (highest Cat_Char_ID)
    $sql = "SELECT c.*, t1.Temperament AS Temp1, t2.Temperament AS Temp2, 
                    t3.Temperament AS Temp3, t4.Temperament AS Temp4, t5.Temperament AS Temp5 
            FROM `Cat_Characteristics` c
            JOIN Temperament t1 ON c.Temp1_ID = t1.Temp_ID
	        JOIN Temperament t2 ON c.Temp2_ID = t2.Temp_ID
	        JOIN Temperament t3 ON c.Temp3_ID = t3.Temp_ID
	        JOIN Temperament t4 ON c.Temp4_ID = t4.Temp_ID
	        JOIN Temperament t5 ON c.Temp5_ID = t5.Temp_ID
            ORDER BY c.Cat_Char_ID DESC 
            LIMIT 1"; // Fetch the latest entry (highest Cat_Char_ID)

    $result = $dbconnect->query($sql);


    ?>
    <h1> Submitted an entry? Review it here!</h1>
    <p>
    <h4>Once you have submitted an entry, you are taken here to review your entry. </h4>

    </p>
    <p>
    <h4>Below are the contents of the entry. </h4>

    </p>
    <p>
    <h4> If you are happy with the contents of the entry, you can then simply click on "Submit New Entry", or "Home." If you
        are unhappy, you can click on "Edit Entry" or "Delete Entry."</h4>

    </p>

    <h2> ENTRY CONTENTS:</h2>

    <div class="review" <?php

    // Check if an entry is found
    if ($result->num_rows > 0) {
        // Fetch the row as an associative array
        $row = $result->fetch_assoc();
        echo "<p><strong>Breed Name:</strong> " . $row['BreedName'] . "</p>";
        echo "<p><strong>Alternative Breed Name:</strong> " . $row['AltBreedName'] . "</p>";
        echo "<p><strong>Male Weight (Kg):</strong> " . $row['MaleWtKg'] . "</p>";
        echo "<p><strong>Average Kitten Price:</strong> " . $row['AvgKittenPrice'] . "</p>";
        echo "<p><strong>Fur Type ID:</strong> " . $row['Fur_ID'] . "</p>";
        echo "<p><strong>Lapcat Type ID:</strong> " . $row['Lapcat_ID'] . "</p>";
        echo "<p><strong>Temperaments:</strong></p>";
        echo "<ul>";
        echo "<li>" . $row['Temp1'] . "</li>";
        echo "<li>" . $row['Temp2'] . "</li>";
        echo "<li>" . $row['Temp3'] . "</li>";
        echo "<li>" . $row['Temp4'] . "</li>";
        echo "<li>" . $row['Temp5'] . "</li>";
        echo "</ul>";


    } else {
        // If no entry found
        echo "<p>No entries found.</p>";
    }


    ?> </div>
        </br>
        <span class="white-tag">
            <a href="index.php?page=../admin/add_entry">
                Add New Entry
            </a>
        </span> | 
        <span class="white-tag">
            <a href="index.php?page=all_results&search=all">
                Home
            </a>
        </span> | 
        <span class="white-tag">
            <a href="index.php?page=../admin/edit_entry">
                Edit Entry
            </a>
        </span> | 
        <span class="white-tag">
            <a href="index.php?page=../admin/delete_entry">
                Delete Entry
            </a>
        </span>
        </br>
        <?php

} else {
    // If the user is not logged in, redirect to login page
    $login_error = 'Please login to access this page';
    header("Location: index.php?page=../admin/login&error=$login_error");
    exit();
}
?>