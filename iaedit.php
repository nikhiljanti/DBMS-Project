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
    
    if( !$_POST["subc"] ) {
        $subcError = "Please enter Subject Code ";
    } else {
        $subc = validateFormData( $_POST["subc"] );
    }

        
    if( !$_POST["ia1"] ) {
        $ia1 = validateFormData( $_POST["ia1"] );
    }
    
    if( !$_POST["ia2"] ){ 
        $ia2 = validateFormData( $_POST["ia2"] );
    }

    if( $_POST["ia3"] ) {
        $ia3 = validateFormData( $_POST["ia3"] ); 
    }

    if( $_POST["ia"] ) {
        $ia = validateFormData( $_POST["ia"] ); 
    }
    // check to see if each variable has data
    if( $usn && $subc) {
        $query = "UPDATE ia set subc='$subc' ia1='$ia1',ia2='$ia2',ia3='$ia3',ia='$ia' WHERE usn='$usn'";

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
        
        <title>IA Details</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <h2>IA Details</h2><hr>
            
               
            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                
                USN<small class="text-danger">* <?php echo $usnError; ?></small><br>
                <input type="text" placeholder="usn" name="usn"><br><br>
                
                Subject Code<small class="text-danger">* <?php echo $subcError; ?></small><br>
                <input type="text" placeholder="subc" name="subc"><br><br>
                
                    IA-1<br>
                    <input type="text" id="txt1" name="ia1" onkeyup="sub();"/><br><br>
                    IA-2<br>
                    <input type="text" id="txt2" name="ia2" onkeyup="sub();"/><br><br>
                    IA-3<br>
                    <input type="text" id="txt3" name="ia3" onkeyup="sub();"/><br><br>
                    Average IA <br>
                    <input type="text" id="txt4" name="ia" /><br><br>
        
               
                
                <input type="submit" class="btn btn-success " name="add" value="Add">
                <input type="reset"  class="btn btn-danger " value="Reset">
                 <input type="button" class="btn btn-info" onclick="display()" value="Display Details"><br><br>
                <input type="button" class="btn btn-warning" onclick="edit()" value="Alt">
                <input type="button" class="btn btn-danger" onclick="del()" value="Del-Info">
                <input type="button" class="btn btn-info" onclick="back()" value="Back Screen">
            </form>
             <script> 
             function sub()
                 {
            var ia1=document.getElementById('txt1').value;
            var ia2=document.getElementById('txt2').value;
            var ia3=document.getElementById('txt3').value;         
            var ia=(parseInt(ia1) + parseInt(ia2) + parseInt(ia3) ) / 3;
            if(!isNaN(ia))
                {
                    document.getElementById('txt4').value=ia;
                }
                }
                function display(){
                    
                    location.replace("iadisplay.php");
                }
                function edit(){
                    location.replace("iaedit.php");
                }
                function back(){
                    location.replace("student.php")
                }
                function del(){
                    location.replace("iadelete.php");
                }
                
    </script>
        
        
        
        
        </div>
       
    </body>
</html>