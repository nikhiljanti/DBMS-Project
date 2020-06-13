<?php

include('connection.php');

$query = "SELECT * FROM teaching";
$result = mysqli_query( $conn, $query );

?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teaching Staff Details</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


    </head>
    
    <body>
        <div class="container">
            <h1>Teaching Staff Details</h1>
            
            <?php

            if( mysqli_num_rows($result) > 0 ) {


                echo "<table class='table table-bordered table-striped'><tr><th>Name</th><th>email</th><th>quali</th><th>desig</th></tr>";

                while( $row = mysqli_fetch_assoc($result) ) {
                    echo "<tr><td>". $row["name"] ."</td><td>". $row["email"] ."</td><td>". $row["quali"] ."</td><td>". $row["desig"] ."</td></tr>";
                }

                echo "</table>";

            } else {
                echo "Whoops! No Records in Database";
            }

            mysqli_close($conn);

            ?>
            
        </div>
        <input type="button" class="btn btn-info" onclick="back()" value="Back Screen"><br><br>
        <script>
                function back(){
                    location.replace("teaching.php")
                }
            </script>
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
       
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>