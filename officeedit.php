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
    
        if( !$_POST["tf"] ) {
        $tfError = "Please enter total-fees ";
    } else {
        $tf = validateFormData( $_POST["tf"] );
    }
    
    if( !$_POST["fp"] ) {
        $fpError = "Please enter fees-paid ";
    } else {
        $fp = validateFormData( $_POST["fp"] );
    }

    if( $_POST["pf"] ) {
        $pf = validateFormData( $_POST["pf"] ); ;
    }
    // check to see if each variable has data
    if( $name && $usn && $rollno && $sem && $tf && $fp) {
        $query = "UPDATE users set name='$name',rollno='$rollno',sem='$sem',total_fees='$tf',fees_paid='$fp',pending_fees='$pf' WHERE usn='$usn'";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record updated in database!</div>";
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
        
        <title>Office Edit Details</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <h2>Office Edit Details</h2><hr>
            
               
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
                
                    Total Fees<small class="text-danger">* <?php echo $tfError; ?></small><br>
                    <input type="text" id="txt1" name="tf" onkeyup="sub();"/><br><br>
                    Fees Paid<small class="text-danger">* <?php echo $tfError; ?></small><br>
                    <input type="text" id="txt2" name="fp" onkeyup="sub();"/><br><br>
                    Pending fees<small class="text-danger">*</small><br>
                    <input type="text" id="txt3" name="pf" /><br><br>
        
               
                
                <input type="submit" class="btn btn-success " name="add" value="Add">
                <input type="reset"  class="btn btn-danger " value="Reset">
                <input type="button" class="btn btn-info" onclick="back()" value="Back Screen"><br><br>
            </form>
             <script> 
             function sub()
                 {
            var TFees=document.getElementById('txt1').value;
            var RFees=document.getElementById('txt2').value;
            var PFees=parseInt(TFees) - parseInt(RFees);
            if(!isNaN(PFees))
                {
                    document.getElementById('txt3').value=PFees;
                }
                }
    
                function back(){
                    location.replace("office.php")
                }
    </script>
            
        
        
        
        
        </div>
       
    </body>
</html>