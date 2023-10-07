<!DOCTYPE html>
<html>
<head>
	<title>Fashion</title>
	<meta charset="UTF-8">
    <meta name="description" content="test">
    <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
    <meta name="author" content="Anik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha256-MBffSnbbXwHCuZtgPYiwMQbfE7z+GOZ7fBPCNB06Z98=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link rel="favicon" type="text/css" href="#favicon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

</head>

<body>

  <header>
    <div class="container">
    <div class="header-top">
      
        <div class="row">
          <div class="col-md-12 text-center">
            <a href=""><img src="img/logo.png"></a>
          </div>
        </div>
    
    </div>
    </div>
  </header>
  <div class="line">

    
  </div>
<?php 
  SESSION_START();
  include "lib/connection.php";
  $id=$_SESSION['userid'];
 $sql = "SELECT * FROM cart where userid='$id'";
 $result = $conn -> query ($sql);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Clothing.php"> Clothing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Trends.php">Trends</a>
        </li>
      </ul>
      <form class="form-inline"  action="search(1).php" method="post">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="name">
        <button class="btn btn-outline-dark" type="submit" style="margin-left:7px;margin-right:7px;"><img src="img/search.png"></button>
        </form>
        <?php
          $total=0;
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $total++;
            }
          }
              ?>
        <a href="cart(1).php"><img src="img/cart.png"><?php echo $total?></a>
        <?php 

if(isset($_SESSION['auth']))
{
   if($_SESSION['auth']==1)
   {
    echo $_SESSION['username']; ?>
    <a href="profile.php">(My Orders)</a>
    <a href="logout.php">(logout)</a>
<?php
   }
}
else
{
?>
  <a href="login.php">Login</a>
  <a href="Register.php">Signup</a>
<?php
}
?>
        

    </div>
  </div>
</nav>
