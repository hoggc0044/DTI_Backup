<?php

$find_sq1 = "SELECT * FROM `quotes`";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);
$find_count = mysqli_num_rows($find_query);

?>

<h2>All Results (<?php echo $find_count; ?>)</h2>

<?php

while($find_rs = mysqli_fetch_assoc($find_query)) {

    ?>

    <div class="results">
        <?php echo $quote; ?>

    </div>

    <?php
}

?>