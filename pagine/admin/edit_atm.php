<?php
session_start();
require_once("../../open_php.php");
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
$sql = "SELECT Nome FROM ATM WHERE Id_ATM =".$_SESSION["id"];
$result = mysqli_query($conn, $sql);
$prova = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($prova, $row["Nome"]);
}
?>
<!DOCTYPE html>
<html lang="it">
<?php


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
                <span class="dashboard">Distributori</span>

            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
            </div>


            <div class="sales-boxes">
                <div class="recent-sales box" style="padding: 30px 600px;">
                    <div class="title" style="text-align:center"><?php echo $_SESSION["nome"]; ?>

                    </div>
                    <div class="sales-details">

                        <ul class="details">
                            <?php
                            $queryquantita50 = "SELECT Banconote50 from ATM where Id_ATM =".$_SESSION["id"];
                            $queryquantita20 = "SELECT Banconote20 from ATM where Id_ATM =".$_SESSION["id"];
                            $result20 = mysqli_query($conn, $queryquantita20);
                            $result50 = mysqli_query($conn, $queryquantita50);
                            $quantita50 = array();
                            $quantita20 = array();
                            while ($row = mysqli_fetch_array($result20)) {
                                array_push($quantita20, $row["Banconote20"]);
                            }
                            while ($row = mysqli_fetch_array($result50)) {
                                array_push($quantita50, $row["Banconote50"]);
                            }

                            ?>
                        </ul>
                        <ul class="details">
                            <?php

                            echo '<li>Banconote 20: ' . $quantita20[0] . '</li>';
                            echo '<li>Banconote 50: ' . $quantita50[0] . '</li>';
                            if($quantita20[0]==0 || $quantita50[0] == 0)
                            {
                                echo'<form action = "" method="POST">';
                                echo ' <li>' . '<input type ="submit" name ="massimo"' . '" value="MAX" class="sus"> ' . '</li></form>';
                                if(isset($_POST["massimo"]))
                                {
                                    $sql="UPDATE atm SET Banconote50 =20, Banconote20 = 20 WHERE Id_ATM =".$_SESSION["id"];
                                    $result=mysqli_query($conn,$sql);
                                    header("refresh:0.1, url = edit_atm.php");
                                }
                            }
                            else
                            {
                                echo ' <li>' . '<input type ="submit" name ="massimo"' . '" value="FULL" class="sus" disabled> ' . '</li>';
                            }
                            ?>
                        </ul>
                        <form>

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