<?php
session_start();
$id=$_SESSION["id"];
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
                <h1 class="rt-heading" style="font-size:50px">ATM <?php echo $_SESSION["nome"];?></h1>
            </div>
        </div>
    </header>
    <div class="schermo">
    <h1 class="rt-heading">Quanto desideri prelevare?</h1>
    <style>
        .tableang {
            caption-side: bottom;
            border-collapse: collapse;
            width: 100%;
            margin-left: 235px;
        }
    </style>
<table class="tableang">
<tbody>
<tr>
<td><input type="submit" value="20" OnClick='Preleva()'></td>
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
<td><input type="submit" value="50" OnClick='Versa()'></td>
</tr>
<tr>
<td><input type="submit" value="100" OnClick='EstrattoConto()'></td>
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
<td><input type="submit" value="200" OnClick='Esci()'></td>
</tr>
</tbody>
</table>

    
    
    
    </div>
    
    <div style="position: absolute; top:3px; right:13px">
        <a href="../index.html"><button class="button1">TORNA ALLA HOME</button></a>
    </div>

    <script>
        function Preleva()
        {
            // Creating a cookie after the document is ready
            const d = new Date();
            d.setTime(d.getTime() + (10*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = "valore" + "=" + 20 + ";" + expires + ";path=/";
            window.location.href='Prelievo.php'
        };
        function Versa()
        {
            const d = new Date();
            d.setTime(d.getTime() + (10*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = "valore" + "=" + 50 + ";" + expires + ";path=/";
            window.location.href='Prelievo.php'
        };
        function EstrattoConto()
        {
            const d = new Date();
            d.setTime(d.getTime() + (10*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = "valore" + "=" + 100 + ";" + expires + ";path=/";
            window.location.href='Prelievo.php'
        };
        function Esci()
        {
            const d = new Date();
            d.setTime(d.getTime() + (10*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = "valore" + "=" + 200 + ";" + expires + ";path=/";
            window.location.href='Prelievo.php'
        };
        let input_principale = $("form input")
        let input_hidden = $("#result_hidden"); // questa ?? l'input che viene inviata al server php.
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