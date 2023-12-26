<?php
session_start();//start the session
//1. include connection file
include ('include/config.php');
$email = $_POST['email'];
$password= $_POST['password'];

//2. create query for perform operation
$qry="SELECT * FROM users where email='".$email."' && password='".md5($password)."'";
//3. execure query using function
$result = mysqli_query($conn,$qry) or die("error in select : ".mysqli_error($conn));
$count =mysqli_num_rows($result);
if($count>0){
    $_SESSION['email']= $email;
    header("Location:dashboard.php");
}else{
    $_SESSION['err'] ="username or password is incorrect";//store value in $_SESSION
    header("Location:index.php");
}
?>