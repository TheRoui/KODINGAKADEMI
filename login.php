<?php
session_start();
if(isset($_POST['loggout'])){
    session_destroy();
}
else{}
if(isset( $_SESSION['user'])){
    // $user = $_SESSION['user'];
    // if($user=="123")
    header("location:index.php");
}
else{
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: montserrat;
    }
    .container {
        width: 25vw;
        height: 40vw;
        background-color: white;
        border-radius: 2vw;
        -webkit-box-shadow: -10px 12px 61px -28px rgba(0,0,0,0.5);
        -moz-box-shadow: -10px 12px 61px -28px rgba(0,0,0,0.5);
        box-shadow: -10px 12px 61px -28px rgba(0,0,0,0.5);
        margin-left: 37vw;
    }
    #login {
        padding-top: 3vw; 
    }
    .inp {
        border: none;
        background: none;
        outline: none;
        border-bottom: 1px solid black;
        margin-bottom: 2vw;
        padding-left: 0.2vw;
        padding-bottom: 0.2vw;
        width: 15vw;
        font-size: 16px;
    }
    .inp:nth-child(1) {
        margin-top: 8vw;
    }
    #reg {
        font-size: 12px;
        margin-top: 5vw;
    }
    #submit {
        background-color: #57E2E5;
        border: none;
        border-radius: 0.2vw;
        width: 8vw;
        height: 2.5vw;
        transition: 0.7s;
    }
    #submit:hover {
        cursor: pointer;
        background-color: #83EAEC;
    }
</style>
<body>
    <div class="container">
        <center>
        <h1 id="login" class="desc">Login</h1>
        <form method=GET>
            <input type="text" class="inp" name="user" placeholder="Username">
            <br>
            <input type="password" class="inp" name="pass" placeholder="Password">
            <br>
            <br>
            <p id="reg">Dont have an account? <a href="register.php">Register here</a></p>
            <br>
            <input type="submit" id="submit" name="simpan" id="submit" value="Submit">
        </form>
        </center>
    </div>
    <?php
    if (isset($_GET['simpan'])) {
        $user = $_GET['user'];
        $pass = $_GET['pass'];
        $mysqli = new mysqli("localhost", "root", "", "test");
        $sql = "SELECT * FROM login";
        $result=$mysqli->query($sql);
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $user1=$row['Nama'];
            $pass1 = $row['Password'];
            if($user1==$user && $pass1==$pass1) {
            
                $_SESSION['user'] = $user1;
                
                $i = 1;
                // $User = "Masuk";
                $cookie_name = "User"; //ini sama kayak $User
                $cookie_value = "Masuk";//ini isinya
                setcookie("User",$user, time() + 30 , "/"); // 86400 = 1 day
                header("location:index.php");
            }
        }
        if($i!=1){
            echo "salah";
        }
    }
    ?>
</body>
</html>