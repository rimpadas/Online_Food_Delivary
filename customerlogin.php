<html>
<head>
    <title>Login | Rimpa's Kitchen </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/signup.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>

function show(){
    var pass =document.getElementById("passw");
    if(pass.type === "passw"){
        pass.type ="text";
    }
    else{
        pass.type="passw"
    }
}
</script>

  </head>

  <body>

    <div class="container">
    <div class="jumbotron">
     <h1>Welcome to <span class="edit" style="font-family:'Dancing Script';"> Rimpa's Kitchen </span></h1>
     <br>
   <p>Kindly LOGIN to continue.</p>
    </div>
    </div>
    
    <div class="text-center text-danger font-weight-bold">
    <?php
error_reporting(0);
session_start();

echo $_SESSION["unsuccessfull"];

if($_SESSION['unsuccessfull']){
  unset($_SESSION['unsuccessfull']);
  }
  
?>
</div>

    <div class="container" style="margin-bottom: 5%;">
      <div class="col-md-5 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-heading"> Login </div>
        <div class="panel-body">
          
        <form action="signin_success.php" method="POST">
          
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span style="margin-right: 5px;"></span> Username: </label>
            <div class="input-group">
              <input class="form-control" type="text" name="username" placeholder="Enter Your Username" required="" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="password"><span style="margin-right: 5px;"></span> Password: </label>

            <div class="input-group">
              <input class="form-control" type="password" name="password" id="passw" placeholder="Enter Your Password" required="" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
           </div>    
           <span style="margin-right: 30px;"> </span>show password:  <input type="checkbox" onclick="show()">       
          </div>
        </div>


        <div class="row">
          <div class="form-group col-xs-12">
          <span style="margin-right: 30px;"> </span>remember me:  <input type="checkbox" name="remember" <?php if(isset($_COOKIE['remember'])) {?>
 checked <?php } ?>> 

          <a href="forgetpassword.php" style="margin-left:80px;">forget password ??</a>
          </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="submit" type="submit" style="margin-left: 170px;" value=" Login ">Submit</button>
          </div>

        </div>
        <label style="margin-left: 30px;">or</label> <br>
       <label style="margin-left: 10px;"><a href="customersignup.php">Create a new account.</a></label>

        </form>

        </div>     
      </div>      
    </div>
    </div>


    </body>
</html>