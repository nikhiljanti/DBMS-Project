<?php

include('connection.php');

$query = "SELECT * FROM users";
$result = mysqli_query( $conn, $query );

error_reporting(0);

?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Office Display</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


    </head>
    
    <body>
        <div class="container">
            <h1>Office Details</h1>
            
            <?php

            if( mysqli_num_rows($result) > 0 ) {


                echo "<table class='table table-bordered table-striped'><tr><th>Name</th><th>USN</th><th>Roll No</th><th>Total Fees</th><th>Fees Paid</th><th>Pending Fees</th></tr>";

                while( $row = mysqli_fetch_assoc($result) ) {
                    echo "<tr><td>". $row["name"] ."</td><td>". $row["usn"] ."</td><td>". $row["rollno"] ."</td><td>". $row["total_fees"] ."</td><td>". $row["fees_paid"] ."</td><td>". $row["pending_fees"] ."</td></tr>";
                }

                echo "</table>";

            } else {
                echo "Whoops! No records in Database.";
            }

            mysqli_close($conn);

            ?>
            
        </div>
        
        <input type="button" class="btn btn-info" onclick="back()" value="Back Screen"><br><br>
        
        <script>
                function back(){
                    location.replace("office.php")
                }
        
        </script>
       
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>