<html>
<head>
<title>Add_food_items</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
  </head>

<body>

	<div class="container" style="margin-top: 10%;">
	<div class="col-xs-6 col-md-offset-3">
  <div class="panel panel-primary">
        <div class="panel-body">
      <div class="form-area" style="padding-left: 30px;">
        <form method="POST" enctype="multipart/form-data">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 25px;"> ADD FOOD ITEM HERE </h3>

          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="Your Food Price" required="">
          </div>

          <div class="form-group">
            <input type="file" class="form-control" name="filetoupload" placeholder="Select File" required="">
          </div>

          <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary pull-right"> ADD FOOD </button>    
      </div>
        </form>

        
        </div>
		</div>
      
    </div>
</div>

  </body>
</html>

<?php
include "connection.php";
error_reporting(0);
$name=$_POST['name'];
$price=$_POST['price'];
$target_path="images/";
$target_path = $target_path.basename($_FILES['filetoupload']['name']);
if(isset($_POST['submit'])){
if(move_uploaded_file($_FILES['filetoupload']['tmp_name'],$target_path )){
	
	$query="INSERT INTO `foodlist` (`id`, `name`, `price`, `image`) VALUES ('','$name','$price','$target_path')";
	mysqli_query($conn,$query);
	
	
	echo '<script>alert("FOOD ADDED SUCCESSFULLY")</script>';
   echo '<script>window.location.href="fooddetails.php"</script>';
}
else{
	echo"Sorry";
}

}
?>