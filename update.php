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

$id = $_GET['ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update order</title>
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
    <form method="POST" action="updatee.php">
        <?php
            $mysqli = new mysqli("localhost", "root", "", "test");
            $sql = "SELECT * FROM menu where ID='$id'";
            $conn = $mysqli->query($sql);
            while($row=$conn->fetch_assoc()) {
              echo "<center>";
              echo "<input type='hidden' name='ID' value='".$row['ID']."'> ";
              echo "<h1 class='desc'>Edit order form</h1>";
                echo "<p class='desc'>Customer name</p>";
                echo "<input type='text' name='cust' value='".$row['Customer']."' class='form'> ";
                echo "<br>";
                echo "<br>";
                echo "<label for='menu'>Menu:</label>";
                echo "<select name='menu' id='menu'>";
                  echo "<option value='Pizza'>Pizza</option>";
                  echo "<option value='Nasi goreng'>Nasi goreng</option>";
                  echo "<option value='Mie'>Mie</option>";
                  echo "<option value='Ayam'>Ayam</option>";
                echo "</select>";
                echo "<p class='desc'>Qty</p>";
                echo "<input type='number' name='qty' max='250' value='".$row['Qty']."' class='form' id='qty'>";
              echo "</center>";
            }
        ?>
        <br>
        <center><input type="submit" value="Update" name="send" id="submit"></center>
    </form>
</body>
</html>