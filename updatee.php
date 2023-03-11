
<?php
if (isset($_POST['send'])) {
    $mysqli = new mysqli("localhost", "root", "", "test");
    $customer = $_POST['ID'];
    $menu = $_POST['menu'];
    $qty = $_POST['qty'];
    $harga=0;
    if($menu=="Pizza"){
      $harga=20000;
    }
    else if($menu=="Nasi goreng") {
      $harga=25000;
    }
    else if($menu=="Mie") {
      $harga=15000;
    }
    else if($menu=="Ayam") {
      $harga=20000;
    }
    else {
      echo "Error";
    }
    $total=$harga*$qty;
    $sql = "UPDATE `menu` SET `Order`='$menu',`Qty`=$qty, `Price`=$harga,`Total`=$total WHERE ID=$customer";

    $conn = $mysqli->query($sql);
    header("location: index.php");
   
}
?>
