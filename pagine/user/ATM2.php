<?php
session_start();
require_once("../../open_php_user.php");
if (isset($_POST["value"])) {
    $a = $_POST["value"];
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
    <h1 class="rt-heading">Cosa desideri fare?</h1>
    <style>
        .tableang {
            caption-side: bottom;
            border-collapse: collapse;
            width: 100%;
            margin-left: 50px;
        }
    </style>
<table class="tableang">
<tbody>
<tr>
<td><input type="submit" value="Preleva" OnClick='Preleva()'></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
</tr>
<tr>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><input type="submit" value="Versa" OnClick='Versa()'></td>
</tr>
<tr>
<td><input type="submit" value="EstrattoConto" OnClick='EstrattoConto()'></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
</tr>
<tr>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><br><br><br></td>
<td><input type="submit" value="Esci" OnClick='Esci()'></td>
</tr>
</tbody>
</table>

    
    
    
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
    <div style="position: absolute; top:3px; right:13px">
        <a href="../index.html"><button class="button1">TORNA ALLA HOME</button></a>
    </div>

    <script>
        function Preleva()
        {
            window.location.href='Preleva.php'
            
        };
        function Versa()
        {
            window.location.href='Versa.php'
        };
        function EstrattoConto()
        {
            window.location.href='EstrattoConto.php'
        };
        function Esci()
        {
            window.location.href='Atm.php'
        };
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