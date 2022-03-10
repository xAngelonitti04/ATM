<?php
    require_once('../../open_php_user.php');
    $var = $_GET["id"];
    error_reporting(0);
    $sql="SELECT Nome FROM ATM WHERE  Id_ATM = $var"; 
    $result=mysqli_query($conn,$sql);
    $quantita_=array();
    while($row=mysqli_fetch_array($result))
    {
        array_push($quantita_,$row["Nome"]);
    }
    if (isset($_POST["value"])) {
        $a=$_POST["value"];
        echo $a;
       
        }
?>
<!DOCTYPE html>
<html lang="it">
<?php
require_once("../admin/head.php");
 $sql="SELECT Quantita FROM Contenere WHERE  IdDistributore = 1"; 
 $result=mysqli_query($conn,$sql);
 $quantita=array();
 while($row=mysqli_fetch_array($result))
 {
     array_push($quantita,$row["Quantita"]);
 }
 ?>
<body>
    <header class="ScriptHeader">
        <div class="rt-container">
            <div class="col-rt-12" style="float: left;">
                <h1 class="rt-heading" style="font-size:50px">ATM <?php echo $quantita_[0];?></h1>
            </div>
        </div>
    </header>
        <div class="schermo">
            <?php require_once("login_user.php"); ?>
        </div>
    <div class="container" style="position: absolute;top:467px;left: 1732px;">
        <form style="position: absolute;top: -81px;left: 56px;" method="Post" id="form">
            <input class="display-box" type="number" id="result" disabled>
            <input type="hidden" id="result_hidden" name="value">
        </form>

        <div id="bottoni">
        <input type="hidden" name="postvar" value="" />
            <input type="submit" value="7">
            <input type="submit" value="8">
            <input type="submit" value="9"><br>
            <input type="submit" value="4">
            <input type="submit" value="5">
            <input type="submit" value="6"><br>
            <input type="submit" value="1">
            <input type="submit" value="2">
            <input type="submit" value="3"><br>
            <input type="reset" value="C">
            <input style="text-align: center;" type="button" value="0">
            <input type="submit" value="OK"><br>
        </div>
        
    </div>
    <div style="position: absolute; top:3px; right:13px" >
    <a href="../index.html"><button class="button1">TORNA ALLA HOME</button></a>
    </div>
    
    <script>
        let input_principale = $("form input")
        let input_hidden = $("#result_hidden"); // questa è l'input che viene inviata al server php.
        let form = $("#form")
        $("div#bottoni input").click(function () {
            if ($(this).val() === 'C') {
                input_principale.val('')
                input_hidden.val('')
            } else if ($(this).val() === 'OK' && input_principale.val() !== '' && input_principale.val() !== null) {
                form.submit()
            } else {
                input_principale.val(input_principale.val()+$(this).val())
                input_hidden.val(input_hidden.val())
            }
        })
    </script>
</body>
</html>