<?php define("title","Institute Information System") ?>

<html>
    <head>
        <title><?php print(title); ?></title>
        <link rel="stylesheet" type="text/css" href="college.css">
    </head>
    <body>
        <h1 id="head">INSTITUTE INFORMATION SYSTEM</h1>
        <div id="border">
            <input  class="button" type="button" onclick="officeInfo()" value="Office-Info">
            <input  class="button" type="button" onclick="student()" value="Student-Info" value="Office-Info"><br>
            <input  class="button" type="button" onclick="teaching()" value="Teaching-Info">
            <input  class="button" type="button" onclick="nonteaching()"value="Non-teaching">
            <div id="updates">
                <marquee>WELCOME TO INSTITUTE INFORMATION SYSTEM</marquee>
            </div>
            <footer>Designed &amp; Developed By Chandrashekhar &amp; Arun</footer>
        </div>
        <script>
            function student()
            {
                location.replace("student.php")
            }
            function officeInfo()
            {
                location.replace("office.php")
            }
             function teaching()
            {
                location.replace("teaching.php")
            }
            function nonteaching()
            {
                location.replace("nonteaching.php")
            }
        </script>>
    </body>
</html>
            