<?php
error_reporting(0);
    # read contents from json file contained in $_POST['file']
    $json = file_get_contents("E:\gennaro.json");
    if(isset($json)){
        $data = json_decode($json, true);
    
$errore = 0;
session_start();
$a = $_SERVER['REQUEST_URI'];
if (strpos($a, '1') !== false) {
    $_SESSION["id"] = 1;
    $_SESSION["nome"]="DSU";
}
if (strpos($a, '2') !== false) {
    $_SESSION["id"] = 2;
    $_SESSION["nome"]="Virtual Bank";
}
if (strpos($a, '3') !== false) {
    $_SESSION["id"] = 3;
    $_SESSION["nome"]="Super";
}
if (strpos($a, '4') !== false) {
    $_SESSION["id"] = 4;
    $_SESSION["nome"]="Udi";
}
if (strpos($a, '5') !== false) {
    $_SESSION["id"] = 5;
    $_SESSION["nome"]="Apulia";
}
if (strpos($a, '6') !== false) {
    $_SESSION["id"] = 6;
    $_SESSION["nome"]="Center";
}
require_once("../../open_php_user.php");
    require_once("../admin/head.php");


    $_SESSION['card'] = $data["codice_bancomat"];
    $sql = "SELECT Codice FROM Bancomat";
    $result = mysqli_query($conn, $sql);
}
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $Codice = $row['Codice'];
         if(isset($_POST["gommaso"])){
            if ($Codice == $_SESSION['card']) {

                echo '<div class="spinner-sopra">
                        <div class="spinner">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>
                        <div>
                        Benvenuto '.$data["nome"].' '.$data["cognome"].'</div>
                        </div>';
                        
                        echo "<script>window.location.href='ATM1.php'</script>";
                } else {
                $errore = 1;
                }
        }
        }
    } else {
        echo "0 results";
    }
    //FINE CONTROLLO CARTA
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="it">
<?php
require_once("../admin/head.php");
?>
<style>
    input[type="submit"] {
  color: #fff;
  background: #b47500;
  border-color: #b47500;
  padding: 7px 17px;
  font-size: 40px;
  font-weight: 400;
  border-radius: 10px;
  text-decoration: none;
  transition: all 0.3s ease;
}
input[type="submit"]:hover {
  background: #ffa600ec;
  border-color: #ffa600ec;
}
</style>
<body>
    <header class="ScriptHeader">
        <div class="rt-container">
            <div class="col-rt-12" style="float: left;">
                <h1 class="rt-heading" style="font-size:50px">ATM <?php echo $_SESSION["nome"];?></h1>
            </div>
        </div>
    </header>
       
    <div class="schermo">
        <h1 class="rt-heading">Inserisci la tua carta</h1>

        <form method="Post" id="form" style="justify-content:center;display:flex;width:100%;flex-direction:column">
        <?php
                    
                    
            ?>
            <div style="justify-content: center;display:flex;width:100%;flex-direction:column;align-items:center">
            <img src="..\.images\insert-card.gif" alt="" width="200px">
            <input  type="submit" value="Verifica" name="gommaso" style="width:30%">
                </div>
                <br>
                
                
            
            <?php if ($errore == 1) {
                echo '<h1 class="rt-heading">Codice Bancomat non registrato</h1>';
            } ?>
        </form>
                   
    </div>
   
        <div style="position: absolute; top:3px; right:13px">
            <a href="../index.html"><button class="button1">TORNA ALLA HOME</button></a>
        </div>


</body>
</html>