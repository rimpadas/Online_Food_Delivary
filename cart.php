<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['login_user1'])){
header("location: customerlogin.php"); 
}

?>

<html>
<head>
    <title> Cart | Rimpa's Kitchen </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/cart.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
  </head>

  <body>

    
<?php
error_reporting(0);
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container" id="image">
        <h1>Your Cart</h1>
        <p>Looks tasty...!!!</p>
      
    </div>
    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;">
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="25%">Food Name</th>
<th width="10%">Quantity</th>
<th width="10%">Price</th>
<th width="15%">Order Total</th>
<th width="5%">Action</th>
</tr>
</thead>


<?php

foreach($_SESSION["cart"] as $keys => $values)
{
  
?>

<tr>
<td><?php echo $values["food_name"]; ?></td>
<td><?php echo $values["food_quantity"] ?></td>
<td><?php echo $values["food_price"]; ?></td>
<td><?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
<td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>
</tr>
<?php

$_SESSION["gtotal"]=$total = $total + ($values["food_quantity"] * $values["food_price"]);
}

?>

<tr> 
<td colspan="3" align="right">Total:</td>
<td>&#8377; <?php echo number_format($total, 2); ?></td>
</tr>
</table>

<?php
  echo '<a href="foodlist.php"><button class="btn btn-warning">Add more</button></a>  &nbsp;<a href="confirmpage.php"><button class="btn btn-success pull-right"> Order Now</button></a>';
?>

</div>

<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container" id="img">
      <div class="jumbotron">
        <h1>Your Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="foodlist.php">order now.</a></p>
        
      </div>
      
    </div>

    <?php
}
?>


<?php

if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "food_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'food_quantity' => $_POST["quantity"]
);

$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="foodlist.php"</script>';
}

else
{
echo '<script>alert("Products already added to cart")</script>';
echo '<script>window.location="cart.php"</script>';
}
}

else
{
$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'food_quantity' => $_POST["quantity"]
);

$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["food_id"] == $_GET["id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Food has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}


?>
<footer>
<hr>
</footer>

    </body>
</html>