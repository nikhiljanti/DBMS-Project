<?php

include('connection.php');

$query = "SELECT * FROM ia";
$result = mysqli_query( $conn, $query );

?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IA Details</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


    </head>
    
    <body>
        <div class="container">
            <h1>IA Details</h1>
            
            <?php

            if( mysqli_num_rows($result) > 0 ) {


                echo "<table class='table table-bordered table-striped'><tr><th>USN</th><th>Subject Code</th><th>IA-1</th><th>IA-2</th><th>IA-3</th><th> Average IA</th></tr>";

                while( $row = mysqli_fetch_assoc($result) ) {
                    echo "<tr><td>". $row["usn"] ."</td><td>". $row["subc"] ."</td><td>". $row["ia1"] ."</td><td>". $row["ia2"] ."</td><td>". $row["ia3"] ."</td><td>". $row["ia"] ."</td></tr>";
                }

                echo "</table>";

            } else {
                echo "Whoops! No results.";
            }

            mysqli_close($conn);

            ?>
            
        </div>
        <input type="button" class="btn btn-info" onclick="back()" value="Back Screen"><br><br>
        
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script>
                function back(){
                    location.replace("ia.php");
                }
       </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>