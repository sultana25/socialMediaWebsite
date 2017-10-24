<?php
$fname="";
$lname="";
$email="";
$password="";
$password2="";
$date="";
$error_array=array();
if(isset($_POST['reg_button'])){
    $fname=strip_tags($_POST['reg_fname']);
    $fname=str_replace(' ','',$fname);
    $fname=ucfirst(strtolower($fname));
    $_SESSION['reg_fname']=$fname;
    
    $lname=strip_tags($_POST['reg_lname']);
    $lname=str_replace(' ','',$lname);
    $lname=ucfirst(strtolower($lname));
    $_SESSION['reg_lname']=$lname;
    
    $email=strip_tags($_POST['reg_email']);
    $email=str_replace(' ','',$email);
    $email=ucfirst(strtolower($email));
    $_SESSION['reg_email']=$email;
    
    $e_check=mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
    
    $num_rows=mysqli_num_rows($e_check);
    if($num_rows > 0)
    {
        array_push($error_array,"email already exists");
    }
       
    
    
    $password=strip_tags($_POST['reg_password']);
   
    
    $password2=strip_tags($_POST['reg_password2']);
    $date="Y-m-d";
    if($password!=$password2){
    
        array_push($error_array,"Password do not match");
    }
    else{
        if(preg_match('/[^A-Za-z0-9]/',$password)){
            array_push($error_array,"Your password only contain english character anr number.");
        }
    }
    if(strlen($password)>15||strlen($password)<5){
        array_push($error_array,"Your password should be between 5 and 15");
    }
    if(strlen($fname)>30||strlen($fname)<2){
        array_push($error_array,"Please type your first name");
    }
    
    if(strlen($lname)>30||strlen($lname)<2){
        array_push($error_array,"Please type your last name");
    }
    
    if(empty($error_array)){
        $password=md5($password);
        $username=$fname."_".$lname;
        $user_check=mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
        $user_nem_rows=mysqli_num_rows($user_check);
        $i=0;
        if($user_nem_rows!=0){
          $i++;
          $username=$username."_".$i;  
          $user_check=mysqli_query($conn,"SELECT username FROM users WHERE username='$username''");
        }
        $rand=rand(1,2);
        if($rand==1){$profile_pic="assets/images/profile_pic/default/IMG_2010.JPG";}
        if($rand==2){$profile_pic="assets/images/profile_pic/default/pic.jpg";}
        $query=mysqli_query($conn,"INSERT INTO users VALUES('','$fname','$lname','$username','$email','$password','$date','$profile_pic','0','0','no',',')");
        array_push($error_array,"You are all set please log in");
        
        $_SESSION['reg_fname']="";
        $_SESSION['reg_lname']="";
        $_SESSION['reg_email']="";
        
        
        
    }
}
?>