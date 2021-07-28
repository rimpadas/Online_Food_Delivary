<html>
<head>
    <title> Guest Signup | Rimpa's Kitchen </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/signup.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="container">
    <div class="jumbotron">
     <h1>Hi Guest, <br> Welcome to <span class="edit" style="font-family:'Dancing Script';"> Rimpa's Kitchen </span></h1>
     <br>
   <p>Get started by creating your account</p>
    </div>
    </div>
    
    <div class="text-center text-danger font-weight-bold">
    <?php
error_reporting(0);
session_start();
echo $_SESSION['passnot'];

if($_SESSION['passnot']){
  unset($_SESSION['passnot']);
  }

  echo $_SESSION['usernot'];

  if($_SESSION['usernot']){
    unset($_SESSION['usernot']);
    }
  
?>
</div>

    <div class="container" style="margin-bottom: 5%;">
      <div class="col-md-5 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-heading"> Create Account </div>
        <div class="panel-body">
          
        <form action="signup_success.php" method="POST">
         
         <div class="row">
          <div class="form-group col-xs-12">
          
          <label for="fullname"><span style="margin-right: 5px;"></span> Full Name: </label>
            <div class="input-group">
              <input class="form-control" type="text" name="fullname" placeholder="Enter Your Full Name" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
  </span>
            </div>           
          </div>
        </div>


        <div class="row">
          <div class="form-group col-xs-12">
            <label for="email"><span style="margin-right: 5px;"></span> Email: </label>
            <div class="input-group">
              <input class="form-control" type="email" name="email" placeholder="Enter Your Email" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="contact"><span style="margin-right: 5px;"></span> Contact No: </label>
            <div class="input-group">
              <input class="form-control" type="number" name="contact" placeholder="Enter Your Contact No" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></label>
            </span>
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="address"><span style="margin-right: 5px;"></span> Address: </label>
            <div class="input-group">
              <input class="form-control" type="text" name="address" placeholder="Enter Your Address" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span style="margin-right: 5px;"></span> Username: </label>
            <div class="input-group">
              <input class="form-control" type="text" name="username" placeholder="Enter Username" required="">
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
              <input class="form-control" type="password" name="password" placeholder="Enter Password" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span style="margin-right: 5px;"></span> Confirm Password: </label>
            <div class="input-group">
              <input class="form-control" type="password" name="confirmpassword" placeholder="Enter Confirm Password" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
            </div>           
          </div>
        </div>

        

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" type="submit" name="submit" style="margin-left: 170px;">Submit</button>
          </div>

        </div>
        <label style="margin-left: 30px;">or</label> <br>
       <label style="margin-left: 5px;"><a href="customerlogin.php">Have an account? Login.</a></label>

        </form>

        </div>
        
      </div>
      
    </div>
    </div>
    
    </body>
</html>