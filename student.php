<?php

include('connection.php');

error_reporting(0);

if( isset( $_POST["add"] ) ) {
        
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    
    if( !$_POST["name"] ) {
        $nameError = "Please enter a name ";
    } else {
        $name = validateFormData( $_POST["name"] );
    }

    if( !$_POST["usn"] ) {
        $usnError = "Please enter usn ";
    } else {
        $usn = validateFormData( $_POST["usn"] );
    }

    if( !$_POST["rollno"] ) {
        $rollnoError = "Please enter a rollno ";
    } else {
        $rollno = validateFormData( $_POST["rollno"] );
    }
    
    if( !$_POST["sem"] ) {
        $semError = "Please enter sem ";
    } else {
        $sem = validateFormData( $_POST["sem"] );
    }
    
        // check to see if each variable has data
    if( $name && $usn && $rollno && $sem) {
        $query = "INSERT INTO student (name, usn, rollno,sem)
        VALUES ('$name', '$usn', '$rollno','$sem')";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record in database!</div>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
            echo "<div class='alert alert-success'>The student is not still admitted to college!</div>";
        }
    }
    
}

mysqli_close($conn);

?>







<!DOCTYPE html>

<html>

    <head>
        
        <title>Student Details</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <h2>Student Details</h2><hr>
            
               
            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                Name<small class="text-danger">* <?php echo $nameError; ?></small><br>
                <input type="text" placeholder="name" name="name"><br><br>
                
                USN<small class="text-danger">* <?php echo $usnError; ?></small><br>
                <input type="text" placeholder="usn" name="usn"><br><br>
                
                ROLL NO<small class="text-danger">* <?php echo $rollnoError; ?></small><br>
                <input type="text" placeholder="rollno" name="rollno"><br><br>
                
                SEM<small class="text-danger">* <?php echo $semError; ?></small><br>
                <input type="text" placeholder="sem" name="sem"><br><br>
                
 
                <input type="submit" id="submit" class="btn btn-success " name="add" value="Add">
                <input type="reset"  class="btn btn-danger " value="Reset">
                <input type="button" class="btn btn-info" onclick="display()" value="Display Details"><br><br>
                <input type="button" class="btn btn-warning" onclick="edit()" value="Alt">
                <input type="button" class="btn btn-danger" onclick="del()" value="Del-Info">
                <input type="button" class="btn btn-info" onclick="home()" value="Home Screen"><br><br>
                <input type="button" class="btn btn-info" onclick="ac()" value="Attendence Details">
                <input type="button" class="btn btn-info" onclick="ia()" value="IA Details">
               
               
            </form>
            <script> 
                function display(){
                    
                    location.replace("studentdisplay.php");
                }
                function edit(){
                    location.replace("studentedit.php");
                }
                function home(){
                    location.replace("college.php")
                }
                function del(){
                    location.replace("studentdelete.php");
                }
                function ac(){
                    location.replace("academic.php");
                }
                function ia(){
                    location.replace("ia.php");
                }
            </script>
            
    </div>
</body>
</html>