<!DOCTYPE html>
<html lang="it">
<?php
require_once("../../open_php.php");



if (isset($_POST["salva"])) {
    if (isset($_POST["cb1"])) {
        $cb1 = $_POST["cb1"];
        $sqlcb1 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 1 WHERE `atm`.`Id_ATM` = 1";
        $resultcb1 = mysqli_query($conn, $sqlcb1);
    } else {
        $cb1 = null;
        if ($cb1 == null) {
            $sqlcb1 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 0 WHERE `atm`.`Id_ATM` = 1";
            $resultcb1 = mysqli_query($conn, $sqlcb1);
        }
    }
    if (isset($_POST["cb2"])) {
        $cb2 = $_POST["cb2"];
        $sqlcb2 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 1 WHERE `atm`.`Id_ATM` = 2";
        $resultcb2 = mysqli_query($conn, $sqlcb2);
    } else {
        $cb2 = null;
        if ($cb2 == null) {
            $sqlcb2 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 0 WHERE `atm`.`Id_ATM` = 2";
            $resultcb2 = mysqli_query($conn, $sqlcb2);
        }
    }
    if (isset($_POST["cb3"])) {
        $cb3 = $_POST["cb3"];
        $sqlcb3 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 1 WHERE `atm`.`Id_ATM` = 3";
        $resultcb3 = mysqli_query($conn, $sqlcb3);
    } else {
        $cb3 = null;
        if ($cb3 == null) {
            $sqlcb3 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 0 WHERE `atm`.`Id_ATM` = 3";
            $resultcb3 = mysqli_query($conn, $sqlcb3);
        }
    }
    if (isset($_POST["cb4"])) {
        $cb4 = $_POST["cb4"];
        $sqlcb4 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 1 WHERE `atm`.`Id_ATM` = 4";
        $resultcb4 = mysqli_query($conn, $sqlcb4);
    } else {
        $cb4 = null;
        if ($cb4 == null) {
            $sqlcb4 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 0 WHERE `atm`.`Id_ATM` = 4";
            $resultcb4 = mysqli_query($conn, $sqlcb4);
        }
    }
    if (isset($_POST["cb5"])) {
        $cb5 = $_POST["cb5"];
        $sqlcb5 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 1 WHERE `atm`.`Id_ATM` = 5";
        $resultcb5 = mysqli_query($conn, $sqlcb5);
    } else {
        $cb5 = null;
        if ($cb5 == null) {
            $sqlcb5 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 0 WHERE `atm`.`Id_ATM` = 5";
            $resultcb5 = mysqli_query($conn, $sqlcb5);
        }
    }
    if (isset($_POST["cb6"])) {
        $cb6 = $_POST["cb6"];
        $sqlcb6 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 1 WHERE `atm`.`Id_ATM` = 6";
        $resultcb6 = mysqli_query($conn, $sqlcb6);
    } else {
        $cb6 = null;
        if ($cb6 == null) {
            $sqlcb6 = "UPDATE `atm`.`atm` SET `FlagAttivo` = 0 WHERE `atm`.`Id_ATM` = 6";
            $resultcb6 = mysqli_query($conn, $sqlcb6);
        }
    }
}
//PASSAGGIO ID
$sqlid = "SELECT `Id_ATM` FROM `atm` WHERE 1";
$id = mysqli_query($conn, $sqlid);
$idhref = array();
while ($row = mysqli_fetch_array($id)) {
    array_push($idhref, $row["Id_ATM"]);
}


$sql = "SELECT `Nome`,`FlagAttivo`,`Id_ATM` FROM atm order by Id_ATM ASC";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql);
$result3 = mysqli_query($conn, $sql);
// output data of each row
require_once("head.php");
?>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-shield-quarter'></i>
            <span class="logo_name">Admin Page</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../index.html">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
            </div>

            <?php
            /* Qui avrete i dati presi dal db in un array
                <table>
                    for(){
                        qui stampo le singole righe con i singoli campi. come ultimo campo devo avere un link dinamico
                        <a href="edit-distributore.php?id=" $item->id ">Modifica</a>
                    }
                </table>
                */
            ?>


            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title" style="text-align:center">Distributori</div>
                    <div class="sales-details">
                        <ul class="details">
                            <li class="topic"><?php while ($row = mysqli_fetch_assoc($result)) {
                                                    echo  '<li><a href="#">' . $row["Nome"] . '</a></li>';
                                                }
                                                ?>
                        </ul>
                        <ul class="details">
                            <center>
                                <form action="database.php" method="post">
                                    <li class="topic">Acceso/Spento</li>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result2)) {


                                        while ($row = mysqli_fetch_assoc($result3)) {
                                            echo  '<li><label class="switch"><input type="checkbox" name="cb' . $row["Id_ATM"] . '"';
                                            echo 'value="' . $row["Nome"] . '"';

                                            if ($row["FlagAttivo"] == 1) {
                                                echo "checked>";
                                            } else {
                                                echo "unchecked>";
                                            }

                                            echo '<span class="slider"></span> </label></li>';
                                        }
                                    }
                                    ?>

                                    <div class="button">
                                        <input type="submit" name="salva" value="Salva">
                                    </div>

                                </form>

                            </center>
                        </ul>
                        <ul class="details">
                            <center>
                                <li class="topic">Visualizza</li>
                                <li><a href="view_atm.php?id=<?php echo $idhref[0]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M107.4312,99.32427c19.36911,-23.68897 16.76075,-58.40478 -5.93065,-78.93355c-22.6914,-20.52877 -57.49418,-19.65859 -79.1313,1.97853c-21.63712,21.63712 -22.5073,56.4399 -1.97853,79.1313c20.52877,22.6914 55.24458,25.29976 78.93355,5.93065l57.1556,57.1556c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709zM17.2,63.06667c0,-25.33146 20.53521,-45.86667 45.86667,-45.86667c25.33146,0 45.86667,20.53521 45.86667,45.86667c0,25.33146 -20.53521,45.86667 -45.86667,45.86667c-25.31967,-0.02844 -45.83823,-20.54699 -45.86667,-45.86667z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                                <li><a href="view_atm.php?id=<?php echo $idhref[1]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M107.4312,99.32427c19.36911,-23.68897 16.76075,-58.40478 -5.93065,-78.93355c-22.6914,-20.52877 -57.49418,-19.65859 -79.1313,1.97853c-21.63712,21.63712 -22.5073,56.4399 -1.97853,79.1313c20.52877,22.6914 55.24458,25.29976 78.93355,5.93065l57.1556,57.1556c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709zM17.2,63.06667c0,-25.33146 20.53521,-45.86667 45.86667,-45.86667c25.33146,0 45.86667,20.53521 45.86667,45.86667c0,25.33146 -20.53521,45.86667 -45.86667,45.86667c-25.31967,-0.02844 -45.83823,-20.54699 -45.86667,-45.86667z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                                <li><a href="view_atm.php?id=<?php echo $idhref[2]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M107.4312,99.32427c19.36911,-23.68897 16.76075,-58.40478 -5.93065,-78.93355c-22.6914,-20.52877 -57.49418,-19.65859 -79.1313,1.97853c-21.63712,21.63712 -22.5073,56.4399 -1.97853,79.1313c20.52877,22.6914 55.24458,25.29976 78.93355,5.93065l57.1556,57.1556c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709zM17.2,63.06667c0,-25.33146 20.53521,-45.86667 45.86667,-45.86667c25.33146,0 45.86667,20.53521 45.86667,45.86667c0,25.33146 -20.53521,45.86667 -45.86667,45.86667c-25.31967,-0.02844 -45.83823,-20.54699 -45.86667,-45.86667z"></path>
                                                </g>
                                            </g>
                                        </svg></i></a></li>
                                <li><a href="view_atm.php?id=<?php echo $idhref[3]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M107.4312,99.32427c19.36911,-23.68897 16.76075,-58.40478 -5.93065,-78.93355c-22.6914,-20.52877 -57.49418,-19.65859 -79.1313,1.97853c-21.63712,21.63712 -22.5073,56.4399 -1.97853,79.1313c20.52877,22.6914 55.24458,25.29976 78.93355,5.93065l57.1556,57.1556c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709zM17.2,63.06667c0,-25.33146 20.53521,-45.86667 45.86667,-45.86667c25.33146,0 45.86667,20.53521 45.86667,45.86667c0,25.33146 -20.53521,45.86667 -45.86667,45.86667c-25.31967,-0.02844 -45.83823,-20.54699 -45.86667,-45.86667z"></path>
                                                </g>
                                            </g>
                                        </svg></i></a></li>
                                <li><a href="view_atm.php?id=<?php echo $idhref[4]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M107.4312,99.32427c19.36911,-23.68897 16.76075,-58.40478 -5.93065,-78.93355c-22.6914,-20.52877 -57.49418,-19.65859 -79.1313,1.97853c-21.63712,21.63712 -22.5073,56.4399 -1.97853,79.1313c20.52877,22.6914 55.24458,25.29976 78.93355,5.93065l57.1556,57.1556c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709zM17.2,63.06667c0,-25.33146 20.53521,-45.86667 45.86667,-45.86667c25.33146,0 45.86667,20.53521 45.86667,45.86667c0,25.33146 -20.53521,45.86667 -45.86667,45.86667c-25.31967,-0.02844 -45.83823,-20.54699 -45.86667,-45.86667z"></path>
                                                </g>
                                            </g>
                                        </svg></i></a></li>
                                <li><a href="view_atm.php?id=<?php echo $idhref[5]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M107.4312,99.32427c19.36911,-23.68897 16.76075,-58.40478 -5.93065,-78.93355c-22.6914,-20.52877 -57.49418,-19.65859 -79.1313,1.97853c-21.63712,21.63712 -22.5073,56.4399 -1.97853,79.1313c20.52877,22.6914 55.24458,25.29976 78.93355,5.93065l57.1556,57.1556c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709zM17.2,63.06667c0,-25.33146 20.53521,-45.86667 45.86667,-45.86667c25.33146,0 45.86667,20.53521 45.86667,45.86667c0,25.33146 -20.53521,45.86667 -45.86667,45.86667c-25.31967,-0.02844 -45.83823,-20.54699 -45.86667,-45.86667z"></path>
                                                </g>
                                            </g>
                                        </svg></i></a></li>
                            </center>
                        </ul>
                        <ul class="details">
                            <center>
                                <li class="topic">Modifica</li>
                                <li><a href="edit-distributore.php?id=<?php echo $idhref[0]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M144.31875,5.73333c-5.82465,-0.01829 -11.41409,2.29653 -15.52031,6.4276l-75.51875,75.51875c-0.6246,0.63117 -1.09584,1.39741 -1.37734,2.23958l-11.46667,34.4c-0.58275,1.74714 -0.29068,3.66786 0.78506,5.16281c1.07574,1.49495 2.80417,2.38209 4.64593,2.38459c0.6163,-0.00028 1.22863,-0.09856 1.81406,-0.29114l34.4,-11.46667c0.84421,-0.28269 1.61099,-0.75809 2.23958,-1.38854l75.51875,-75.51875c6.27846,-6.27683 8.15701,-15.71797 4.75948,-23.92007c-3.39753,-8.20211 -11.40186,-13.5495 -20.27979,-13.54816zM22.93333,17.2c-9.4993,0 -17.2,7.7007 -17.2,17.2v114.66667c0,9.4993 7.7007,17.2 17.2,17.2h103.2c9.4993,0 17.2,-7.7007 17.2,-17.2v-57.33333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333v57.33333c0,3.16643 -2.5669,5.73333 -5.73333,5.73333h-103.2c-3.16643,0 -5.73333,-2.5669 -5.73333,-5.73333v-114.66667c0,-3.16643 2.5669,-5.73333 5.73333,-5.73333h68.8c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333zM144.47552,17.23359c5.71313,0.08812 10.30412,4.73389 10.32448,10.44766c0.00666,2.78128 -1.09791,5.45 -3.06823,7.41302l-74.53333,74.53333l-22.27266,7.44661l7.41302,-22.25026l74.56692,-74.53333c2.00673,-1.99971 4.73718,-3.10239 7.56979,-3.05703z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                                <li><a href="edit-distributore.php?id=<?php echo $idhref[1]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M144.31875,5.73333c-5.82465,-0.01829 -11.41409,2.29653 -15.52031,6.4276l-75.51875,75.51875c-0.6246,0.63117 -1.09584,1.39741 -1.37734,2.23958l-11.46667,34.4c-0.58275,1.74714 -0.29068,3.66786 0.78506,5.16281c1.07574,1.49495 2.80417,2.38209 4.64593,2.38459c0.6163,-0.00028 1.22863,-0.09856 1.81406,-0.29114l34.4,-11.46667c0.84421,-0.28269 1.61099,-0.75809 2.23958,-1.38854l75.51875,-75.51875c6.27846,-6.27683 8.15701,-15.71797 4.75948,-23.92007c-3.39753,-8.20211 -11.40186,-13.5495 -20.27979,-13.54816zM22.93333,17.2c-9.4993,0 -17.2,7.7007 -17.2,17.2v114.66667c0,9.4993 7.7007,17.2 17.2,17.2h103.2c9.4993,0 17.2,-7.7007 17.2,-17.2v-57.33333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333v57.33333c0,3.16643 -2.5669,5.73333 -5.73333,5.73333h-103.2c-3.16643,0 -5.73333,-2.5669 -5.73333,-5.73333v-114.66667c0,-3.16643 2.5669,-5.73333 5.73333,-5.73333h68.8c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333zM144.47552,17.23359c5.71313,0.08812 10.30412,4.73389 10.32448,10.44766c0.00666,2.78128 -1.09791,5.45 -3.06823,7.41302l-74.53333,74.53333l-22.27266,7.44661l7.41302,-22.25026l74.56692,-74.53333c2.00673,-1.99971 4.73718,-3.10239 7.56979,-3.05703z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                                <li><a href="edit-distributore.php?id=<?php echo $idhref[2]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M144.31875,5.73333c-5.82465,-0.01829 -11.41409,2.29653 -15.52031,6.4276l-75.51875,75.51875c-0.6246,0.63117 -1.09584,1.39741 -1.37734,2.23958l-11.46667,34.4c-0.58275,1.74714 -0.29068,3.66786 0.78506,5.16281c1.07574,1.49495 2.80417,2.38209 4.64593,2.38459c0.6163,-0.00028 1.22863,-0.09856 1.81406,-0.29114l34.4,-11.46667c0.84421,-0.28269 1.61099,-0.75809 2.23958,-1.38854l75.51875,-75.51875c6.27846,-6.27683 8.15701,-15.71797 4.75948,-23.92007c-3.39753,-8.20211 -11.40186,-13.5495 -20.27979,-13.54816zM22.93333,17.2c-9.4993,0 -17.2,7.7007 -17.2,17.2v114.66667c0,9.4993 7.7007,17.2 17.2,17.2h103.2c9.4993,0 17.2,-7.7007 17.2,-17.2v-57.33333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333v57.33333c0,3.16643 -2.5669,5.73333 -5.73333,5.73333h-103.2c-3.16643,0 -5.73333,-2.5669 -5.73333,-5.73333v-114.66667c0,-3.16643 2.5669,-5.73333 5.73333,-5.73333h68.8c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333zM144.47552,17.23359c5.71313,0.08812 10.30412,4.73389 10.32448,10.44766c0.00666,2.78128 -1.09791,5.45 -3.06823,7.41302l-74.53333,74.53333l-22.27266,7.44661l7.41302,-22.25026l74.56692,-74.53333c2.00673,-1.99971 4.73718,-3.10239 7.56979,-3.05703z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                                <li><a href="edit-distributore.php?id=<?php echo $idhref[3]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M144.31875,5.73333c-5.82465,-0.01829 -11.41409,2.29653 -15.52031,6.4276l-75.51875,75.51875c-0.6246,0.63117 -1.09584,1.39741 -1.37734,2.23958l-11.46667,34.4c-0.58275,1.74714 -0.29068,3.66786 0.78506,5.16281c1.07574,1.49495 2.80417,2.38209 4.64593,2.38459c0.6163,-0.00028 1.22863,-0.09856 1.81406,-0.29114l34.4,-11.46667c0.84421,-0.28269 1.61099,-0.75809 2.23958,-1.38854l75.51875,-75.51875c6.27846,-6.27683 8.15701,-15.71797 4.75948,-23.92007c-3.39753,-8.20211 -11.40186,-13.5495 -20.27979,-13.54816zM22.93333,17.2c-9.4993,0 -17.2,7.7007 -17.2,17.2v114.66667c0,9.4993 7.7007,17.2 17.2,17.2h103.2c9.4993,0 17.2,-7.7007 17.2,-17.2v-57.33333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333v57.33333c0,3.16643 -2.5669,5.73333 -5.73333,5.73333h-103.2c-3.16643,0 -5.73333,-2.5669 -5.73333,-5.73333v-114.66667c0,-3.16643 2.5669,-5.73333 5.73333,-5.73333h68.8c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333zM144.47552,17.23359c5.71313,0.08812 10.30412,4.73389 10.32448,10.44766c0.00666,2.78128 -1.09791,5.45 -3.06823,7.41302l-74.53333,74.53333l-22.27266,7.44661l7.41302,-22.25026l74.56692,-74.53333c2.00673,-1.99971 4.73718,-3.10239 7.56979,-3.05703z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                                <li><a href="edit-distributore.php?id=<?php echo $idhref[4]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M144.31875,5.73333c-5.82465,-0.01829 -11.41409,2.29653 -15.52031,6.4276l-75.51875,75.51875c-0.6246,0.63117 -1.09584,1.39741 -1.37734,2.23958l-11.46667,34.4c-0.58275,1.74714 -0.29068,3.66786 0.78506,5.16281c1.07574,1.49495 2.80417,2.38209 4.64593,2.38459c0.6163,-0.00028 1.22863,-0.09856 1.81406,-0.29114l34.4,-11.46667c0.84421,-0.28269 1.61099,-0.75809 2.23958,-1.38854l75.51875,-75.51875c6.27846,-6.27683 8.15701,-15.71797 4.75948,-23.92007c-3.39753,-8.20211 -11.40186,-13.5495 -20.27979,-13.54816zM22.93333,17.2c-9.4993,0 -17.2,7.7007 -17.2,17.2v114.66667c0,9.4993 7.7007,17.2 17.2,17.2h103.2c9.4993,0 17.2,-7.7007 17.2,-17.2v-57.33333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333v57.33333c0,3.16643 -2.5669,5.73333 -5.73333,5.73333h-103.2c-3.16643,0 -5.73333,-2.5669 -5.73333,-5.73333v-114.66667c0,-3.16643 2.5669,-5.73333 5.73333,-5.73333h68.8c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333zM144.47552,17.23359c5.71313,0.08812 10.30412,4.73389 10.32448,10.44766c0.00666,2.78128 -1.09791,5.45 -3.06823,7.41302l-74.53333,74.53333l-22.27266,7.44661l7.41302,-22.25026l74.56692,-74.53333c2.00673,-1.99971 4.73718,-3.10239 7.56979,-3.05703z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                                <li><a href="edit-distributore.php?id=<?php echo $idhref[5]; ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="red">
                                                    <path d="M144.31875,5.73333c-5.82465,-0.01829 -11.41409,2.29653 -15.52031,6.4276l-75.51875,75.51875c-0.6246,0.63117 -1.09584,1.39741 -1.37734,2.23958l-11.46667,34.4c-0.58275,1.74714 -0.29068,3.66786 0.78506,5.16281c1.07574,1.49495 2.80417,2.38209 4.64593,2.38459c0.6163,-0.00028 1.22863,-0.09856 1.81406,-0.29114l34.4,-11.46667c0.84421,-0.28269 1.61099,-0.75809 2.23958,-1.38854l75.51875,-75.51875c6.27846,-6.27683 8.15701,-15.71797 4.75948,-23.92007c-3.39753,-8.20211 -11.40186,-13.5495 -20.27979,-13.54816zM22.93333,17.2c-9.4993,0 -17.2,7.7007 -17.2,17.2v114.66667c0,9.4993 7.7007,17.2 17.2,17.2h103.2c9.4993,0 17.2,-7.7007 17.2,-17.2v-57.33333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333v57.33333c0,3.16643 -2.5669,5.73333 -5.73333,5.73333h-103.2c-3.16643,0 -5.73333,-2.5669 -5.73333,-5.73333v-114.66667c0,-3.16643 2.5669,-5.73333 5.73333,-5.73333h68.8c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333zM144.47552,17.23359c5.71313,0.08812 10.30412,4.73389 10.32448,10.44766c0.00666,2.78128 -1.09791,5.45 -3.06823,7.41302l-74.53333,74.53333l-22.27266,7.44661l7.41302,-22.25026l74.56692,-74.53333c2.00673,-1.99971 4.73718,-3.10239 7.56979,-3.05703z"></path>
                                                </g>
                                            </g>
                                        </svg></a></li>
                            </center>
                        </ul>
                    </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
</body>

</html>




</body>

</html>