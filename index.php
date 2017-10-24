<?php
$conn=mysqli_connect('localhost','root','','db_socialweb');
if(mysqli_connect_errno()){
    echo 'Connection Failed '.mysqli_connect_errno();
}
?>


<html>
    <head>
        <title>
            Social Media Website
        </title>
    </head>
    <body>
        <h2>Welcome to social media website.</h2>
    </body>
</html>