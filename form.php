<?php
session_start();
if(isset( $_SESSION['user'])){
   if(isset($_COOKIE["User"])){
        echo "ada cookie";
   }
   else{
    session_destroy();
    header("location:login.php");
   }
}
else{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add order</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<style>
  * {
    font-family: montserrat;
  }
  .desc {
    text-align: center;
    font-weight: bold;
  }
  form {
    margin-top: 10vw;
  }
  .form {
    border: none;
    border-bottom: 1px solid black;
    background: none;
    outline: none;
    width: 20vw;
    padding-left: 0.2vw;
    padding-bottom: 0.2vw;
  }
  #qty {
    width: 10vw;
    text-align: center;
  }
  .form:focus {
    border-bottom: 1px solid #B2EEE8;
  }
  #submit {
    width: 10vw;
    height: 3vw;
    border-radius: 0.2vw;
    background-color: #7854C4;
    color: white;
    border: none;
    transition: 0.7s
  }
  #submit:hover {
    cursor: pointer;
    background-color: #9376D0;
  }
</style>
<body>
  <center>
    <form method="GET | POST">
        <h1 class="desc">Order form</h1>
        <p id="cust" class="desc">Customer name:</p>
        <input type="text" name="cust" class="form">
        <!-- order menu -->
        <br>
        <br>
        <label for="cars">Menu:</label>
        <select name="menu" id="menu">
          <option value="Pizza">Pizza</option>
          <option value="Nasi goreng">Nasi goreng</option>
          <option value="Mie">Mie</option>
          <option value="Ayam">Ayam</option>
        </select>
        <!-- qty -->
        <p id="qty-desc" class="desc">Qty:</p>
        <input type="number" name="qty" max="250" class="form" id="qty">
        <br>
        <br>
        <input type="submit" name="simpan" id="submit">
    </form>
  </center>
    <?php
    if(isset($_GET['simpan'])){
      $tgl=date("Y-m-d");
      $menu=$_GET['menu'];
      echo $menu;
      $harga=0;
      $qty=$_GET['qty'];
      if($menu="Pizza"){
        $harga=20000;
      }
      else if($menu="Nasi goreng") {
        $harga=25000;
      }
      else if($menu="Mie") {
        $harga=15000;
      }
      else if($menu="Ayam") {
        $harga=20000;
      }
      else {
        echo "Error";
      }
      $total=$harga*$qty;
      echo $harga;
      echo $total;

      $mysqli= new mysqli("localhost", "root", "", "test");
      $sql="INSERT INTO `menu`(`Customer`, `Date`, `Order`, `Qty`, `Price`, `Total`) VALUES (?,?,?,?,?,?)";
      $hasil = $mysqli->prepare($sql);
      $hasil->bind_param("sssiii", $_GET['cust'], $tgl, $menu, $qty, $harga, $total);
      $hasil->execute();
      header("location: index.php");
    }
    
    ?>
</body>
</html>