<?php

include('connection.php');

error_reporting(0);

if( isset( $_POST["add"] ) ) {
        
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }


    if( !$_POST["usn"] ) {
        $usnError = "Please enter usn ";
    } else {
        $usn = validateFormData( $_POST["usn"] );
    }

        
    if( !$_POST["tc"] ) {
        $tcError = "Please enter total-fees ";
    } else {
        $tc = validateFormData( $_POST["tc"] );
    }
    
    if( !$_POST["ca"] ) {
        $caError = "Please enter fees-paid ";
    } else {
        $ca = validateFormData( $_POST["ca"] );
    }

    if( $_POST["ta"] ) {
        $ta = validateFormData( $_POST["ta"] ); 
    }
    // check to see if each variable has data
    if( $usn && $tc && $ca && $ta) {
        $query = "UPDATE academic set tc='$tc',ca='$ca',ta='$ta' WHERE usn='$usn'";
        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>Record updated in database!</div>";
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
        
        <title>Attendence Edit Details</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <h2>Attendence Details</h2><hr>
            
               
            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                
                USN<small class="text-danger">* <?php echo $usnError; ?></small><br>
                <input type="text" placeholder="usn" name="usn"><br><br>
                
                
                
                    Total Classes<small class="text-danger">* <?php echo $tcError; ?></small><br>
                    <input type="text" id="txt1" name="tc" onkeyup="sub();"/><br><br>
                    Classes Attended<small class="text-danger">* <?php echo $tfError; ?></small><br>
                    <input type="text" id="txt2" name="ca" onkeyup="sub();"/><br><br>
                    Total <small class="text-danger">*</small><br>
                    <input type="text" id="txt3" name="ta" /><br><br>
        
               
                
                <input type="submit" class="btn btn-success " name="add" value="Add">
                <input type="reset"  class="btn btn-danger " value="Reset">
                <input type="button" class="btn btn-info" onclick="display()" value="Display Details"><br><br>
                <input type="button" class="btn btn-info" onclick="back()" value="Back Screen">
            </form>
             <script> 
             function sub()
                 {
            var TFees=document.getElementById('txt2').value;
            var RFees=document.getElementById('txt1').value;
            var PFees=parseInt(TFees) / parseInt(RFees) * 100;
            if(!isNaN(PFees))
                {
                    document.getElementById('txt3').value=PFees;
                }
                }
                function display(){
                    
                    location.replace("academicdisplay.php");
                }
                function back(){
                    location.replace("student.php")
                }
                
    </script>
        
        
        
        
        </div>
       
    </body>
</html>