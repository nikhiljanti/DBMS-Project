<?php

include('connection.php');

error_reporting(0);

if( isset( $_POST["add"] ) ) {
        
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    
    if( !$_POST["name"] ) {
        $nameError = "Please enter a name";
    } else {
        $name = validateFormData( $_POST["name"] );
    }

    if( !$_POST["wa"] ) {
        $waError = "Please enter Work Assigned ";
    } else {
        $wa = validateFormData( $_POST["wa"] );
    }


    // check to see if each variable has data
    if( $name && $wa ) {
        $query = "INSERT INTO nonteaching (name,wa)
        VALUES ('$name','$wa')";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record in database!</div>";
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
        
        <title>Non-Teaching Staff Details</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <h2>Non-Teaching Staff Details</h2><hr>
            
               
            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                Name<small class="text-danger">* <?php echo $nameError; ?></small><br>
                <input type="text" placeholder="name" name="name"><br><br>
                
                Work Assigned<small class="text-danger">* <?php echo $waError; ?></small><br>
                <input type="text" placeholder="Work Assigned" name="wa"><br><br>
                
                
                <input type="submit" class="btn btn-success " name="add" value="Add">
                <input type="reset"  class="btn btn-danger " value="Reset">
                <input type="button" class="btn btn-info" onclick="display()" value="Display Details"><br><br>
                <input type="button" class="btn btn-warning" onclick="edit()" value="Alt">
                <input type="button" class="btn btn-danger" onclick="del()" value="Del-Info">
                <input type="button" class="btn btn-info" onclick="home()" value="Home Screen">
            </form>
            <script>
                function display(){
                    
                    location.replace("nonteachingdisplay.php");
                }
                function edit(){
                    location.replace("nonteachingedit.php");
                }
                function home(){
                    location.replace("college.php")
                }
                function del(){
                    location.replace("nonteachingdelete.php");
                }
            </script>
        
        </div>
       
    </body>
</html>