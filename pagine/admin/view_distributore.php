<?php
require_once("../../open_php.php");
$var=$_GET["id"];
$sql="SELECT Nome FROM Distributori WHERE  IdDistributore = $var"; 
 $result=mysqli_query($conn,$sql);
 $prova=array();
 while($row=mysqli_fetch_array($result))
 {
     array_push($prova,$row["Nome"]);
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
            <li>
                <a href="#">
                <i class='bx bxs-user-plus'></i>
                    <span class="links_name">About us</span>
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
                    <div class="title" style="text-align:center"><?php echo $prova[0];?>

                    </div>
                    <div class="sales-details">

                        <ul class="details">
                        <?php
                $nome="SELECT Bevande.Nome FROM Contenere, Distributori, Bevande WHERE Contenere.IdBevanda = Bevande.IdBevanda && Contenere.IdDistributore = Distributori.IdDistributore && distributori.IdDistributore = $var"; 
                $resultn=mysqli_query($conn,$nome);
                $bevande=array();
                while($row=mysqli_fetch_array($resultn))
                {
                    array_push($bevande,$row["Nome"]);
                }
                $queryquantita="SELECT Quantita from Contenere where IdDistributore =$var";
                $resultq=mysqli_query($conn,$queryquantita);
                $quantita=array();
                while($row=mysqli_fetch_array($resultq))
                {
                    array_push($quantita,$row["Quantita"]);
                }
                
                
                for($i=0;$i<7;$i++)
                {
                    echo "<li>". $bevande[$i]."</li>";
                }
               ?>
                        </ul>
                        <ul class="details">
                             <?php for($i=0;$i<7;$i++)
                             {
                                 echo '<li>'. $quantita[$i].'</li>';
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