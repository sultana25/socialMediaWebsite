<?php
if(isset($_POST['log_button'])){
   $email=filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL);
    $_SESSION['log_email']=$email;
    $password=md5($_POST['log_password']);
    $check_log_user=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    $log_num_rows=mysqli_num_rows($check_log_user);
    if($log_num_rows==1){
        $row=mysqli_fetch_array($check_log_user);
        $username=$row['username'];
        $user_closed_query=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
        if($user_closed_num_rows=mysqli_num_rows($user_closed_query)==1){
            $reopen_account=mysqli_query($conn,"UPDATE users SET user_closed='no' WHERE email='$email'");
        }
        $_SESSION['username']=$username;
        header("Location:index.php");
        exit();
    }
    else{
        array_push($error_array,"Your email or password was incorrect.");
    }
}
?>