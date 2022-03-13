<?php
require_once('../open_php.php');
session_start();
$sql = "SELECT FlagAttivo FROM atm";
$result = mysqli_query($conn, $sql);
$flag = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($flag, $row["FlagAttivo"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributori Automatici</title>
    <meta name="author" content="Codeconvey" />

    <link rel="stylesheet" href=".css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href=".css/demo.css" />

</head>

<body>
    <header class="ScriptHeader">
        <div class="rt-container">
            <div class="col-rt-12" style="float: left;">
                <h1 class="rt-heading" style="font-size:50px">Seleziona il distributore più vicino a te</h1><br>
                <img src=".images/mappa.png" style="width:110%;position: absolute;left:-50px;">
                <div>
                    <?php if ($flag[0] != 0) {
                        $_SESSION["id"]=1;
                        echo '<a href="user/atm.php?id=' . $_SESSION["id"] . '">';
                    } ?> <img src=".images/loghi/atm_dsu.png" class="animated zoomIn" style="width:12%; position: absolute;top: 570px;left: 410px;<?php if ($flag[0] == 0) {
                                                                                                                                                                                                                           echo ';opacity:0%;"';
                                                                                                                                                                                                                            } ?>"></a>
                    <?php if ($flag[4] != 0) {
                        $_SESSION["id"]=5;
                        echo '<a href="user/atm.php?id=' . $_SESSION["id"] . '">';
                    } ?><img src=".images/loghi/atm_apulia.png" class="animated zoomIn" style="width:12%;position: absolute;left: 400px;top:160px;<?php if ($flag[4] == 0) {
                                                                                                                                                                                                                                echo ';opacity:0%;"';
                                                                                                                                                                                                                            } ?>"></a>
                    <?php if ($flag[1] != 0) {
                        $_SESSION["id"]=2;
                        echo '<a href="user/atm.php?id=' . $_SESSION["id"] . '">';
                    } ?><img src=".images/loghi/atm_virtual.png" class="animated zoomIn" style="width:12%; position: absolute;top: 570px;left: 110px;<?php if ($flag[1] == 0) {
                                                                                                                                                                                                                                echo ';opacity:0%;"';
                                                                                                                                                                                                                            } ?>"></a>
                    <?php if ($flag[5] != 0) {
                        $_SESSION["id"]=6;
                        echo '<a href="user/atm.php?id=' . $_SESSION["id"] . '">';
                    } ?><img src=".images/loghi/atm_center.png" class="animated zoomIn" style="width:12%;position: absolute;left: 800px; top:275px;<?php if ($flag[5] == 0) {
                                                                                                                                                                                                                                echo ';opacity:0%;"';
                                                                                                                                                                                                                            } ?>"></a>
                    <?php if ($flag[3] != 0) {
                        $_SESSION["id"]=4;
                        echo '<a href="user/atm.php?id=' . $_SESSION["id"] . '">';
                    } ?><img src=".images/loghi/atm_udi.png" class="animated zoomIn" style="width:12%; position: absolute;top: 400px;left: 60px;<?php if ($flag[3] == 0) {
                                                                                                                                                                                                                            echo ';opacity:0%;"';
                                                                                                                                                                                                                        } ?>"></a>
                    <?php if ($flag[2] != 0) {
                        $_SESSION["id"]=3;
                        echo '<a href="user/atm.php?id=' . $_SESSION["id"] . '">';
                    } ?><img src=".images/loghi/atm_super.png" class="animated zoomIn" style="width:12%;position: absolute;left: 800px; top:175px;<?php if ($flag[2] == 0) {
                                                                                                                                                                                                                                echo ';opacity:0%;"';
                                                                                                                                                                                                                            } ?>"></a>
                </div>

            </div>
        </div>
    </header>
    <div id="transition"></div>
    <script src=".js/transition.js"></script>
</body>

</html>