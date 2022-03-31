<?php
$errore=0;
session_start();
require_once("../../open_php_user.php");
if (isset($_POST["value"])) {
    $a = $_POST["value"];
    require_once("../admin/head.php");
echo'<div style="position: relative;top: 24em;left: 54em">
<div class="spinner">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
<div style="position: relative;top: -1em;left: -2em">
PIN CORRETTO</div>
</div>';
 
    //CONTROLLO CARTA
    $Cod = $_SESSION['card'];
    $sql = "SELECT PIN FROM Bancomat where Codice='$Cod'";
    $result = mysqli_query($conn, $sql);
     
    if (mysqli_num_rows($result) > 0) {
        
        while($row = mysqli_fetch_assoc($result)) {
            $PIN = $row['PIN'];
            
            if($PIN==$a)
            {

                echo"<script>window.location.href='ATM2.php'</script>";
            }
            else
            {
                $errore=1;
            }
        }
    } 
    else 
    {
        echo "0 results";
    }
    //FINE CONTROLLO CARTA
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="it">
<?php
require_once("../admin/head.php");
?>

<body>
    <header class="ScriptHeader">
        <div class="rt-container">
            <div class="col-rt-12" style="float: left;">
                <h1 class="rt-heading" style="font-size:50px">ATM</h1>
            </div>
        </div>
    </header>
    <div class="schermo">
        <h1 class="rt-heading">Inserisci il PIN del tuo Bancomat</h1>

            <form method="Post" id="form">
                <input class="display-box" type="password" id="result" disabled>
                <?php if($errore==1){echo'<h1 class="rt-heading">Codice Pin Errato</h1>';} ?>
                <input type="hidden" id="result_hidden" name="value">
            </form>
    </div>
    <div class="container" style="position: absolute;top:467px;left:2017px;">
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
    <div style="position: absolute; top:3px; right:13px">
        <a href="../index.html"><button class="button1">TORNA ALLA HOME</button></a>
    </div>

    <script>
        
        let input_principale = $("form input")
        let input_hidden = $("#result_hidden"); // questa è l'input che viene inviata al server php.
        let form = $("#form")
        $("div#bottoni input").click(function() {
            if ($(this).val() === 'C') {
                input_principale.val('')
                input_hidden.val('')
            } else if ($(this).val() === 'OK' && input_principale.val() !== '' && input_principale.val() !== null) {
                form.submit()
            } else {
                input_principale.val(input_principale.val() + $(this).val())
                input_hidden.val(input_hidden.val())
            }
        })
    </script>
</body>

</html>