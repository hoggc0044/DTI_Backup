<?php
// check iser is logged
if (isset($_SESSION['admin'])) {

    // get all Temperaments from database
    $all_tags_sql = "SELECT * FROM Temperament ORDER BY Temperament ASC ";
    $all_Temperaments = autocomplete_list($dbconnect, $all_tags_sql, 'Temperament');

    // initialise Temperament variables
    $tag_1 = "";
    $tag_2 = "";
    $tag_3 = "";

    // initalise tag ID's
    $tag_1_ID = $tag_2_ID = $tag_3_ID = 0;

?>

    <div class="admin-form">
        <h1>Add an entry!</h1>


        <form action="index.php?page=../admin/insert_entry" method="post">

            <p>
                <textarea name="BreedName" placeholder="Breed Name (Required)" required></textarea>
            </p>

            <p>
                <textarea name="AltBreedName" placeholder="Alternate Breed Name"></textarea>
            </p>

            <!-- <br /><br /> -->

            <div class="dropdown">
                <select name="FurType" id="FurType" class="custom-dropdown" required>
                    <option value="" disabled selected>Select Fur Type (required)</option>
                    <option value="Short" id="Fur_ID_1">Short</option>
                    <option value="Medium" id="Fur_ID_2">Medium</option>
                    <option value="Long" id="Fur_ID_3">Long</option>
                    <option value="Long" id="Fur_ID_4">Bald</option>
                    <option value="None" id="Fur_ID_5">None</option>
                </select>
            </div>

            <!-- <br /><br /> -->

            <div class="dropdown">
                <select name="LapcatType" id="LapcatType" class="custom-dropdown" required>
                    <option value="" disabled selected>Select Type of Lapcat (required)</option>
                    <option value="Lap" id="Lapcat_ID_1">Lapcat</option>
                    <option value="Non Lap" id="Lapcat_ID_2">Non-Lapcat</option>
                    <option value="Rodent" id="Lapcat_ID_3">Rodent</option>
                    <option value="Generic" id="Lapcat_ID_4">Generic</option>
                    <option value="None" id="Lapcat_ID_5">None</option>
                </select>
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="MaleWtKg" id="MaleWtKg" placeholder="Male Weight in Kgs (required)" required />
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="AvgKittenPrice" id="AvgKittenPrice" placeholder="Average Kitten Price (required)" required />
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="Temperament1" id="Temperament1" placeholder="Temperament 1 (required)" required />
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="Temperament2" id="Temperament2" placeholder="Temperament 2" />
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="Temperament3" id="Temperament3" placeholder="Temperament 3" />
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="Temperament4" id="Temperament4" placeholder="Temperament 4" />
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="Temperament5" id="Temperament5" placeholder="Temperament 5" />
            </div>

            <!-- <br /><br /> -->

            <p><input class="form-submit" type="submit" name="submit" value="Submit Entry" /></p>

        </form>


        <script>
            <?php include("autocomplete.php"); ?>

            /* arrays containing lines. */
            var all_tags = <?php print("$all_Temperaments") ?>;
            autocomplete(document.getElementById("Temperament1"), all_tags);
            autocomplete(document.getElementById("Temperament2"), all_tags);
            autocomplete(document.getElementById("Temperament3"), all_tags);
            autocomplete(document.getElementById("Temperament4"), all_tags);
            autocomplete(document.getElementById("Temperament5"), all_tags);
        </script>

    </div>

<?php
} // end user logged on it

else {
    $login_error = 'Please login to access this page';
    header("Location: index.php?page=../admin/login&error=$login_error");
}

?>

<!-- index.php?page=../admin/insert_entry -->