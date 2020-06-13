<?php

include('connection.php');

error_reporting(0);

if( isset( $_POST["add"] ) ) {
        
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    
    if( !$_POST["name"] ) {
        $nameError = "Please enter a name <br>";
    } else {
        $name = validateFormData( $_POST["name"] );
    }

    // check to see if each variable has data
    if( $name ) {
        $query = "DELETE FROM nonteaching WHERE name='$name'";

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
        
        <title>Non-Teaching Staff Delete Details</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <h2>Non-Teaching Staff Delete Details</h2><hr>
            
               
            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                Name<small class="text-danger">* <?php echo $nameError; ?></small><br>
                <input type="text" placeholder="name" name="name"><br><br>
                
                
                <input type="submit" class="btn btn-success " name="add" value="Delete">
                <input type="reset"  class="btn btn-danger " value="Reset">
                <input type="button" class="btn btn-info" onclick="display()" value="Display Details"><br><br>
                <input type="button" class="btn btn-info" onclick="back()" value="Back Screen"><br><br>
            </form>
            <script>
                function back(){
                    location.replace("nonteaching.php")
                }
                function display(){
                    
                    location.replace("nonteachingdisplay.php");
                }
            </script>
        </div>
       
    </body>
</html>
