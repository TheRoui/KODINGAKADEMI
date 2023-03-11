<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    #register {
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
    #login    {
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
        <h1 id="register" class="desc">Register</h1>
        <form method=GET>
            <input type="text" class="inp" name="user" placeholder="Username">
            <br>
            <input type="password" class="inp" name="pass" placeholder="Password">
            <br>
            <br>
            <p id="login">Already have an account? <a href="login.php">Login here</a></p>
            <br>
            <input type="submit" id="submit" name="simpan" id="submit" value="Submit">
        </form>
        </center>
    </div>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "test");
        $sql = "SELECT * FROM login";
        $conn = $mysqli->prepare($sql);
        if (isset($_GET['simpan'])) {
            $usern = $_GET['user'];
            $passn = $_GET['pass'];

            $sql = "INSERT INTO login(Nama, Password) VALUES (?,?)";
            $conn = $mysqli->prepare($sql);
            $conn->bind_param("ss", $usern, $passn);
            $conn->execute();
        }
        ?>
    </div>
</body>
</html>