<html>
<head>
    <title>Rimpa's Kitchen</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/foodlist.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>

.fa {
  padding: 10px;
  font-size: 20px;
  height: 40px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

.fa-skype {
  background: #00aff0;
  color: white;
}
</style>
</head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" id="header-logo" style="font-family:'Dancing Script'; font-size: 35px;">Rimpa's Kitchen</a>
        </div>
      <div class="collapse navbar-collapse " id="myNavbar">

      <?php
    session_start();
if(isset($_SESSION['login_user1'])){
?>

           <ul class="nav navbar-nav navbar-right">
            <li><a href=""><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <?php
              if(isset($_SESSION["cart"])){
              $count= count($_SESSION["cart"]);
              echo "$count"; 
            }
              else
                echo "0";
              ?>
               </a></li>
               
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>


  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="customersignup.php"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
        
            </li>

            <li><a href="customerlogin.php"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
            
            </li>

          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>

    <div id="myCarousel" class="carousel slide main-slider" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="item active">
      <img src="images/momoimage2.jpg" style="width:100%; height:493px;">
      <div class="carousel-caption">
      </div>
      </div>
       

      <div class="item">
      <img src="images/momo.jpg" style="width:100%; height: 75%;">
      <div class="carousel-caption">

      </div>
      </div>
      <div class="item">
      <img src="images/biriyani.jpg" style="width:100%; height:75%;">
      <div class="carousel-caption">
      </div>
      </div>
    
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
    </div>

<div class="jumbotron">
  <div class="container text-center hover_effect">
    <h1>Welcome To <span class="hover_effect2" style="font-family:'Dancing Script'; font-size: 60px; color:green;">Rimpa's Kitchen</span></h1>      
  </div>
</div>

<div class="container" style="width:90%;">

<?php
include 'connection.php';
error_reporting(0);
$sql = "SELECT * FROM foodlist";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    if ($count == 0)
      echo "<div class='row'>";

?>

<div class="col-md-3">

<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
<div class="mypanel" align="center";>
<img style="height:150px; " src="<?php echo $row["image"]; ?>" class="img-responsive">
<h4 class="text-dark"><?php echo $row["name"]; ?></h4>
<h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>
<h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
</div>
</form>
      
     
</div>

<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>

</div>
</div>
<?php
}
else
{
  ?>

  <?php

}

?>

<br><br>
<footer class="footer foot">
  <div class="container text-center">
  <a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-skype"></a>
      
  </div>
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © Contact Us:   
        <a class="text-dark" href="https://mdbootstrap.com/">  rimpadas309@gmail.cpm</a>
      </div>
</footer>
</body>
</html>