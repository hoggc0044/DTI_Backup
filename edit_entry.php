<?php
// check iser is logged
if (isset($_SESSION['admin'])) {

    // retrieve Temperaments and authors to populate combo box
    include("sub_author.php");

    // retrieve current values for entry
    $Cat_Char_ID = $_REQUEST['Cat_Char_ID'];

    // get values from DB
    $edit_query = get_data($dbconnect, "WHERE c.Cat_Char_ID = $Cat_Char_ID");

    $edit_results_query = $edit_query[0];
    $edit_results_rs = mysqli_fetch_assoc($edit_results_query);

    $BreedName = $edit_results_rs['BreedName'];
    $AltBreedName = $edit_results_rs['AltBreedName'] ?: "n/a";  // Fallback if blank
    $Fur_ID = $edit_results_rs['Fur'];
    $Lapcat_ID = $edit_results_rs['Lapcat'];
    $MaleWtKg = $edit_results_rs['MaleWtKg'];
    $AvgKittenPrice = $edit_results_rs['AvgKittenPrice'];
    $Temperament1 = $edit_results_rs['Temperament1'];
    $Temperament2 = $edit_results_rs['Temperament2'];
    $Temperament3 = $edit_results_rs['Temperament3'];
    $Temperament4 = $edit_results_rs['Temperament4'];
    $Temperament5 = $edit_results_rs['Temperament5'];

    $all_Temperaments = array($Temperament1, $Temperament2, $Temperament3, $Temperament4, $Temperament5);
    ?>

    <div class="admin-form">
        <h1>EDIT SELECTED ENTRY</h1>

        <form
            action="index.php?page=../admin/change_entry&ID=<?php echo $Cat_Char_ID; ?>"
            method="post">

            <p>
                <textarea name="BreedName" placeholder="Breed Name (Required)" required><?php echo $BreedName; ?></textarea>
            </p>

            <p>
                <textarea name="AltBreedName" placeholder="Alternate Breed Name"><?php echo $AltBreedName; ?></textarea>
            </p>

            </br>
            
            <div class="important">
                If you EDIT an Breed, it will CHANGE THE BREED NAME for the entry being edited. It DOES NOT edit the BREED
                NAME on all entries attributed to that breed.
            </div> 

            </br>

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

            <div class="autocomplete">
                <input name="MaleWtKg" id="MaleWtKg" value="<?php echo $MaleWtKg ?>" required />
            </div>

            <!-- <br /><br /> -->

            <div class="autocomplete">
                <input name="AvgKittenPrice" id="AvgKittenPrice" value="<?php echo $AvgKittenPrice ?>" required />
            </div> </br>

            <div class="light_blue">
                Blank Temperaments appear as "N/A." You can either EDIT these / ADD a Temperament, or LEAVE them as N/A.
            </div> </br>

            <div class="autocomplete">
                <input name="Temperament1" id="Temperament1" value="<?php echo $Temperament1 ?>" required/>
            </div>
            <br /><br />
            <div class="autocomplete">
                <input name="Temperament2" id="Temperament2" value="<?php echo $Temperament2 ?>" />
            </div>
            <br /><br />
            <div class="autocomplete">
                <input name="Temperament3" id="Temperament3" value="<?php echo $Temperament3 ?>" />
            </div>
            <br /><br />
            <div class="autocomplete">
                <input name="Temperament4" id="Temperament4" value="<?php echo $Temperament4 ?>" />
            </div>
            <br /><br />
            <div class="autocomplete">
                <input name="Temperament5" id="Temperament5" value="<?php echo $Temperament5 ?>" />
            </div>

            <br /><br />

            <p><input calss="form-submit" type="submit" name="submit" value="Submit Edit" /></p>

        </form>


        <script>
            <?php include("autocomplete.php"); ?>

            /* arrays containing lines. */
            var all_tags = <?php print ("$Temperament") ?>;
            autocomplete(document.getElementById("Temperament1"), all_tags);
            autocomplete(document.getElementById("Temperament2"), all_tags);
            autocomplete(document.getElementById("Temperament3"), all_tags); h  
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