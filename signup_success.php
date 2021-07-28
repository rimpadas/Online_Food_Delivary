<html>
 <head>
    <title> User Signup | Rimpa's Kitchen </title>
      </head>

  <body>

<?php

include 'connection.php';
error_reporting(0);
session_start();

$fullname = mysqli_real_escape_string($conn,$_REQUEST['fullname']);
$email = mysqli_real_escape_string($conn,$_REQUEST['email']);
$contact = mysqli_real_escape_string($conn,$_REQUEST['contact']);
$address = mysqli_real_escape_string($conn,$_REQUEST['address']);
$username = mysqli_real_escape_string($conn,$_REQUEST['username']);
$password = mysqli_real_escape_string($conn,$_REQUEST['password']);
$conpassword = mysqli_real_escape_string($conn,$_REQUEST['confirmpassword']);

if(isset($_REQUEST['submit']))
{

    if($password!==$conpassword)

    {
      $_SESSION['passnot']="PASSWORD NOT MATCHED";
	header("location: customersignup.php");
    }

    else {
        $sql="SELECT * from customersignup where username='$username'";
        $res=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($res)){
          $_SESSION['usernot']="USERNAME ALREADY EXISTS";
          header("location: customersignup.php");
        }

        else{
            $que = "INSERT INTO customersignup (`id`,`fullname`,`email`,`contact`,`address`,`username`,`password`) values ('','$fullname','$email','$contact','$address','$username','$password')";
            $data=mysqli_query($conn,$que);
}
       if($data){
        echo '<script>alert("New record created succesfully")</script>';
        echo '<script>window.location.href="customerlogin.php"</script>';
        }

else{
    echo '<script>alert("SOMETHING WENT WRONG")</script>';
   echo '<script>window.location.href="customersignup.php"</script>';
    
}
    }

}

?>

    </body>
</html>

