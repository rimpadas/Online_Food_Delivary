<?php
session_start();
include "connection.php";
$username=mysqli_real_escape_string($conn,$_REQUEST['username']);
$password=mysqli_real_escape_string($conn,$_REQUEST['password']);
$remember=$_REQUEST['remember'];

if(isset($_POST['submit'])){

	if(isset($_POST['remember'])){
		setcookie('username',$username,time()+60*60*7);
		setcookie('password',$password,time()+60*60*7);
		setcookie('remember',$remember,time()+60*60*7);
	}

    else{
        setcookie('username',$username,time()-60*60*7);
		setcookie('password',$password,time()-60*60*7);
		setcookie('remember',$remember,time()-60*60*7);
    }

    $query= "select * from `customersignup`  where `username`='$username' and `password`='$password'";
    $result=mysqli_query($conn,$query);
    $found_num_rows=mysqli_num_rows($result);
    if($found_num_rows)
     {
        $_SESSION['login_user1']=$username;
        header("location: foodlist.php");
            }

    else{
       
        $_SESSION["unsuccessfull"]="INVALID USER DETAILS OR PASSWORD";
        header("location: customerlogin.php");
    }
}

?>