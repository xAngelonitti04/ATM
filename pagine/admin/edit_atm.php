<?php
//ACQUISIZIONE ID E QUERY
require_once("../../open_php.php");
$var = $_GET["id"];
$sql = "SELECT Nome FROM ATM WHERE  Id_ATM = $var";
$result = mysqli_query($conn, $sql);
$prova = array();
$queryquantita = "SELECT Banconote50 from ATM where Id_ATM =$var";
$resultq = mysqli_query($conn, $queryquantita);
$quantita = array();
while ($row = mysqli_fetch_array($resultq)) {
    array_push($quantita, $row["Banconote50"]);
}
$nome = "SELECT Bevande.Nome FROM Contenere, Distributori, Bevande WHERE Contenere.IdBevanda = Bevande.IdBevanda && Contenere.IdDistributore = Distributori.IdDistributore && distributori.IdDistributore = $var";
$resultn = mysqli_query($conn, $nome);
$bevande = array();
while ($row = mysqli_fetch_array($resultn)) {
    array_push($bevande, $row["Nome"]);
}
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
<style>
    .sus {
        color: #fff;
        background: #0A2558;
        border-color: #0A2558;
        padding: 4px 12px;
        font-size: 15px;
        font-weight: 400;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .sus:hover {
        background: #B15DFF;
        border-color: #B15DFF;
    }
</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
        <a href="database.php">
            <i class='bx bx-shield-quarter'></i>
            <span class="logo_name" >Admin Page</span>
        </a>    
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
                <div class="recent-sales box">
                    <div class="title" style="text-align:center"><?php echo $prova[0]; ?>

                    </div>
                    <div class="sales-details">

                        <ul class="details">
                            <?php
                            //QUERY E STAMPA A VIDEO DELLE BEVANDE
                            for ($i = 0; $i < 7; $i++) {
                                echo "<li>" . $bevande[$i] . "</li>";
                            }
                            ?>
                        </ul>
                        <?php
                        for ($i = 0; $i < 9; $i++) {
                            echo "<ul></ul>";
                        }
                        ?>
                        <ul class="details">
                            <!--qta-->
                            <?php
                            function stampa($quantita)
                            {
                                for ($i = 0; $i < 7; $i++) {
                                    echo '<li>' . $quantita[$i] . '</li>';
                                }
                            }
                            stampa($quantita);
                            ?>
                            <form action="edit-distributore.php?id=<?php echo $var; ?>" method="post">
                            <?php 
                                $max = True;
                                $idquantita = "SELECT Quantita FROM contenere WHERE IdDistributore=$var";
                                $resultquant= mysqli_query($conn, $idquantita);
                                while ($row = mysqli_fetch_array($resultquant)) {
                                    if ($row["Quantita"]!=20) {
                                        $max = False;
                                    }
                                }
                                if (!$max) {
                                    echo ' <li>' . '<input type ="submit" name ="massimo"' . '" value="MAX" class="sus"> ' . '</li>';
                                }
                                else {
                                    echo ' <li>' . '<input type ="submit" name ="massimo"' . '" value="FULL" class="sus" disabled> ' . '</li>';
                                }
                            ?>
                            </form>
                        </ul>
                        <ul>
                        </ul>
                        <?php
                        $idlattina = "SELECT IdBevanda FROM contenere WHERE IdDistributore=$var";
                        $resultid = mysqli_query($conn, $idlattina);
                        $id = array();
                        while ($row = mysqli_fetch_array($resultid)) {
                            array_push($id, $row["IdBevanda"]);
                        }
                        
                        
                        
                        //QUERY MASSIMO
                        if (isset($_POST["massimo"])) {
                            $incremento = "UPDATE gestiredistributori.contenere SET Quantita =20 WHERE contenere.IdDistributore=$var";
                            $resultinc = mysqli_query($conn, $incremento);
                        }
                        ?>
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