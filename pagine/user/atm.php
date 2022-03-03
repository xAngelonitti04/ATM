<?php
    require_once('../../open_php_user.php');
    $sql="SELECT Quantita FROM Contenere WHERE  IdDistributore = 1"; 
    $result=mysqli_query($conn,$sql);
    $quantita_=array();
    while($row=mysqli_fetch_array($result))
    {
        array_push($quantita_,$row["Quantita"]);
    }
    if (isset($_POST["value"])) {
        $a=$_POST["value"];
        if($a==1){
            if($quantita_[0]!=0){
            $decremento="UPDATE gestiredistributori.contenere SET Quantita=Quantita-1 WHERE contenere.IdContenere =1";
            $resultd=mysqli_query($conn,$decremento);
            }
        }
        if ($a==2){
            if($quantita_[1]!=0){
                $decremento="UPDATE gestiredistributori.contenere SET Quantita=Quantita-1 WHERE contenere.IdContenere =2";
                $resultd=mysqli_query($conn,$decremento);
                }
        }
        if ($a==3){
            if($quantita_[2]!=0){
                $decremento="UPDATE gestiredistributori.contenere SET Quantita=Quantita-1 WHERE contenere.IdContenere =3";
                $resultd=mysqli_query($conn,$decremento);
                }
        }
        if ($a==4){
            if($quantita_[3]!=0){
                $decremento="UPDATE gestiredistributori.contenere SET Quantita=Quantita-1 WHERE contenere.IdContenere =4";
                $resultd=mysqli_query($conn,$decremento);
                }
        }
        if ($a==5){
            if($quantita_[4]!=0){
                $decremento="UPDATE gestiredistributori.contenere SET Quantita=Quantita-1 WHERE contenere.IdContenere =5";
                $resultd=mysqli_query($conn,$decremento);
                }
        }
        if ($a==6){
            if($quantita_[5]!=0){
                $decremento="UPDATE gestiredistributori.contenere SET Quantita=Quantita-1 WHERE contenere.IdContenere =6";
                $resultd=mysqli_query($conn,$decremento);
                }
        }
        if ($a==7){
            if($quantita_[6]!=0){
                $decremento="UPDATE gestiredistributori.contenere SET Quantita=Quantita-1 WHERE contenere.IdContenere =7";
                $resultd=mysqli_query($conn,$decremento);
                }
        }

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
                <h1 class="rt-heading" style="font-size:50px">Seleziona il codice del prodotto</h1>
            </div>
        </div>
    </header>
        <div class="schermo">
    </div>
    <div class="container" style="position: absolute;top:467px;left: 1732px;">
        <form action="1h24.php" style="    position: absolute;top: -81px;left: 56px;" method="Post" id="form">
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
                input_principale.val($(this).val())
                input_hidden.val($(this).val())
            }
        })
    </script>
</body>
</html>