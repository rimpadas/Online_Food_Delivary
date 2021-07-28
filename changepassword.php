<?php
error_reporting(0);
session_start();
include "connection.php";
if(!$_SESSION['searchname']){
    header("location: forgetpassword.php");
    }

?>

<html>
    <head>
    <title> CHANGE YOUR PASSWORD | Rimpa's Kitchen </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
  </head>

  <body>


    <div class="container" style="margin-top: 10%; margin-bottom: 5%;">
      <div class="col-md-5 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-body">
          
        <form method="POST">
          
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span style="margin-right: 5px;"></span> New password: </label>
            <div class="input-group">
              <input class="form-control" type="text" name="newpassword" placeholder="enter new password" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span style="margin-right: 5px;"></span> Confirm password: </label>
            <div class="input-group">
              <input class="form-control" type="text" name="changepassword" placeholder="re-enter password" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="updatepass" type="submit" style="margin-left: 110px;">CHNAGE PASSWORD</button>
          </div>
</div>

</form>

</div>     
      </div>      
    </div>
    </div>
</body>
</html>

<?php
$searchvalue=$_SESSION['searchname'];
if(isset($_POST['updatepass']))
{
    $newpassword=$_POST['newpassword'];
    $changepassword=$_POST['changepassword'];

    if($newpassword!=$changepassword){
        echo '<script>alert("PASSWORD NOT MATCHED")</script>';
        echo '<script>window.location.href="forgetpassword.php"</script>';
    }

    else{
        $updatequery="update customersignup set password='$newpassword' where username='$searchvalue'";
        $updateres=mysqli_query($conn,$updatequery);
        if($updateres){
        echo '<script>alert("PASSWORD UPDATED SUCCESSFULLY")</script>';
        echo '<script>window.location.href="customerlogin.php"</script>';
        }
   
else{
    echo '<script>alert("SOMETHING WENT WRONG")</script>';
    echo '<script>window.location.href="customerlogin.php/"</script>';
}
}
}
?>
