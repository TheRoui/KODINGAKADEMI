<?php
session_start();
if(isset( $_SESSION['user'])){
   if(isset($_COOKIE["User"])){
        echo $_COOKIE["User"];
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
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: montserrat;
        padding: 0;
        margin: 0;
    }
    a {
        text-decoration: none;
        color: white;
    }
    table {
        width: 100%;
        border: 0px;
    }
    table, td, th {
        text-align:center;
        border-collapse: collapse;
    }
    td {
        border-right: 1px solid #F3F3F3;
        font-size: 12px;
        height: 8vw;
    }
    th {
        font-size: 14px;
    }
    .ganjil {
        background-color: #F3F3F3;
    }
    .heading {
        height: 3vw;
        border: none;
        background-color: #B2EEE8;
    }
    .act-btn {
        width: 8vw;
        height: 3vw;
        border-radius: 0.3vw;
        border: none;
        margin-top: 1vw;
        margin-bottom: 1vw;
        background-color: #7854C4;
    }
    .act-btn:hover {
        cursor: pointer;
    }
    .dbl {
        width: 30vw;
        color: white;
        margin-left: 35vw;
    }
</style>
<body>
    <table>
        <tr class="heading">
            <th>Customer</th>
            <th>Order</th>
            <th>Date</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "test");
    $sql = "SELECT * FROM menu";
    $conn = $mysqli->query($sql);

    while($row=$conn->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='ganjil'>".$row['Customer']."</td>";
        echo "<td>".$row['Order']."</td>";
        echo "<td class='ganjil'>".$row['Date']."</td>";
        echo "<td>".$row['Qty']."</td>";
        echo "<td class='ganjil'>Rp.".number_format($row['Price'], 0, ',','.')."</td>";
        echo "<td>Rp.".number_format($row['Total'], 0)."</td>";
        echo "<td class='ganjil'>";
        if($row['Order'] == "Nasi goreng") {
            echo "<img width=75 height=100 src='https://upload.wikimedia.org/wikipedia/commons/3/3e/Nasi_goreng_indonesia.jpg'>";
        }
        else if($row['Order'] == "Pizza") {
            echo "<img width=75 height=100 src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg/800px-Eq_it-na_pizza-margherita_sep2005_sml.jpg'>";
        }
        else if($row['Order'] == "Mie") {
            echo "<img width=75 height=100 src='https://upload.wikimedia.org/wikipedia/commons/f/f0/Mi_Goreng_GM.jpg'>";
        }
        else if($row['Order'] == "Mie") {
            echo "<img width=75 height=100 src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Javanese_fried_chicken.JPG/270px-Javanese_fried_chicken.JPG'>";
        } 
        else {
            echo "<img alt='Error' width=75 height=100 src='https://upload.wikimedia.org/widia/commons/thumb/9/96/Javanese_fried_chicken.JPG/270px-Javanese_fried_chicken.JPG'>";
        } 
        echo "</td>";
        echo "<td><button class='act-btn'><a href='update.php?ID=".$row['ID']."'>Edit</a></button><br><button class='act-btn'><a href='delete.php?ID=".$row['ID']."'>Delete</button></td>";
        echo "</tr>";
    }
    ?>
    </table>
    <form method="post" action="login.php" >
        <input type="submit" name="loggout" value="Log out" class="act-btn dbl">
    </form>
    <form method="POST" action="form.php">
        <input type="submit" name="add" value="Add menu" class="act-btn dbl">
    </form>
</body>
</html>