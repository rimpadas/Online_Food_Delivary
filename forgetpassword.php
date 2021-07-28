<html>
    <head>
    <title> SEARCH YOUR ACCOUNT | Rimpa's Kitchen </title>

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
            <label for="username"><span style="margin-right: 5px;"></span> ENTER YOUR USERNAME: </label>
            <div class="input-group">
              <input class="form-control" type="text" name="acname" placeholder="Enter Your Username" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="acsearch" type="submit" style="margin-left: 110px;">SEARCH YOUR ACCOUNT</button>
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
error_reporting(0);
session_start();
include "connection.php";
$searchname=$_POST['acname'];
if(isset($_POST['acsearch']))
{
    $sql="SELECT * from customersignup where username='$searchname'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res))
    {
        $_SESSION['searchname']=$searchname;
        header("location: changepassword.php");
    }
}
?>

