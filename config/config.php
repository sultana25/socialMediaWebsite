

<?php
ob_start();//turns on output buffering
session_start();
$timezone=date_default_timezone_set('Asia/Dhaka');
$conn=mysqli_connect('localhost','root','','db_socialweb');
if(mysqli_connect_errno()){
    echo 'Connection Failed '.mysqli_connect_errno();
}
?>