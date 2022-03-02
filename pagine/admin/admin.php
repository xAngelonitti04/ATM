<?php
 $url = "database.php";
 $msg = "";
 if(isset($_POST["invia"]))
 {
     if($_POST["nome"]=="admin"&&$_POST["password"]=="admin")
     {
        header('Location: ' . $url, true, 301);
     }
     else{
         $msg = "<br><br>LOGIN ERRATO";
     }
 }
?>

<!DOCTYPE html>
<html>
<?php
require_once("head.php");
?>
<body>
    <div class="login-box">
        <h2>LOGIN</h2>
        <form action="admin.php" method="POST">
            <div class="user-box">
                <input type="text" name="nome" required="">
            <label>Username</label>    
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <center>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input type="submit" value="Invia" name="invia" style= "background-color:transparent ; border-color:transparent ; color:white;font-size: 20px;font-weight:bold">
            </a>
            <span style="color:white;font-size: 20px;font-weight:bold"><?php echo $msg; ?></span>
            </center>
            <!--That's all-->
        </form>
    </div>
</body>
<div id="transition"></div>
<script src="../.js/transition.js"></script>
</html> 
