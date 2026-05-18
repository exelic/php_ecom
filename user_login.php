<?php 
require('connection.inc.php');
require('functions.inc.php');
$email = get_safe_value($con,$_POST['email']);
$password = get_safe_value($con,$_POST['password']);

$check_email= mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
$check_user_email =mysqli_num_rows($check_email);
if($check_user_email > 0){
  $row=mysqli_fetch_assoc($check_email);
  $_SESSION['USER_LOGIN']='yes';
  $_SESSION['USER_ID']=$row['id'];
  $_SESSION['USER_NAME']=$row['name'];
  echo "valid";
}else{
   
    echo 'wrong';
}








?>