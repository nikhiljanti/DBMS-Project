<?php

include('connection.php');

error_reporting(0);

if( isset( $_POST["add"] ) ) {
        
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    
    if( !$_POST["usn"] ) {
        $usnError = "Please enter a usn <br>";
    } else {
        $usn = validateFormData( $_POST["usn"] );
    }

    // check to see if each variable has data
    if( $usn ) {
        $query = "DELETE FROM student WHERE usn='$usn'";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>Record Deleted in database!</div>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
    
}

mysqli_close($conn);

?>

<!DOCTYPE html>

<html>

    <head>
        
        <title>Student Delete Details</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <h2>Student Delete Details</h2><hr>
            
               
            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                USN<small class="text-danger">* <?php echo $usnError; ?></small><br>
                <input type="text" placeholder="name" name="usn"><br><br>
                
                
                <input type="submit" class="btn btn-success " name="add" value="Delete">
                <input type="reset"  class="btn btn-danger " value="Reset">
                <input type="button" class="btn btn-info" onclick="display()" value="Display Details"><br><br>
                <input type="button" class="btn btn-info" onclick="back()" value="Back Screen"><br><br>
            </form>
            <script>
                function back(){
                    location.replace("student.php")
                }
                function display(){
                    
                    location.replace("studentdisplay.php");
                }
                </script>
        </div>
       
    </body>
</html>
