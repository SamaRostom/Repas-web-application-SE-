<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repas";
$conn = new mysqli($servername, $username, $password, $dbname);
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-ajax-live-search.php
if(isset($_POST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM `Meals` AND Username LIKE '%".$_POST["term"]."%'";
    if($stmt = mysqli_prepare($conn, $sql)){
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    <div>
                 <!-- <img src = "images/=$row['Profile_Picture']?>" class="img-circle" width = "40"/> -->
        <?=$row['Meal_Name']?>
        <a href="<?php echo URLROOT . 'users/allmeals'; ?>">Meal</a>
        </div>
                    <?php
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}

?>