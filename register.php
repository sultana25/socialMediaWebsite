<?php
require('config/config.php');
require('includes/form_handler/register_handler.php');
require('includes/form_handler/log_handler.php');
?>

<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <form action="register.php" method="post">
            <input type="email" name="log_email" placeholder="Your email address" value="<?php 
            if(isset($_SESSION['log_email'])){
            echo $_SESSION['log_email'];
        } ?>">
            <br>
            <input type="password" name="log_password" placeholder="password">
            <br>
            <?php if(in_array("Your email or password was incorrect.",$error_array)){
            echo "Your email or password was incorrect.<br>";}?>
            
            <input type="submit" name="log_button" value="Login">
        </form>
        <form action="register.php" method="post">
            <input type="text" name="reg_fname" placeholder="First Name" value="<?php
                if(isset($_SESSION['reg_fname'])){
                    echo $_SESSION['reg_fname'];
                }
            ?>" required>
            <br>
            <?php 
            if(in_array("Please type your first name",$error_array)){echo"Please type your first name<br>";}
            ?>
            <input type="text" name="reg_lname" placeholder="last Name" value="<?php
                if(isset($_SESSION['reg_lname'])){
                    echo $_SESSION['reg_lname'];
                }
            ?>" required>
            <br>
            <?php 
            if(in_array("Please type your last name",$error_array)){echo"Please type your last name<br>";}
            ?>
            <input type="email" name="reg_email" placeholder="Email Address" value="<?php
                if(isset($_SESSION['reg_email'])){
                    echo $_SESSION['reg_email'];
                }
            ?>" required>
            <br>
            <?php 
            if(in_array("email already exists",$error_array)){echo"email already exists<br>";}
            ?>
            <input type="password" name="reg_password" placeholder="Enter Password" required>
            <br>
            <input type="password" name="reg_password2" placeholder="Confirm Password" required>
            <br>
            <?php 
            if(in_array("Password do not match",$error_array)){echo"Password do not match<br>";}
            elseif(in_array("Your password only contain english character anr number.",$error_array)){echo"Your password only contain english character anr number.<br>";}
            elseif(in_array("Your password should be between 5 and 15",$error_array)){echo"Your password should be between 5 and 15<br>";}
            ?>
            <input type="submit" name="reg_button"  value="Register">
            <br>
            <?php if(in_array("You are all set please log in",$error_array)){echo "<span style='color:green;'>You are all set please log in<span><br>";} ?>
            
            
        </form>
    </body>
</html>