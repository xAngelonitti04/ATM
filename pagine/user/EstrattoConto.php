<?php
session_start();
require_once("../../open_php.php");
$Cod = $_SESSION['card'];
$sql="SELECT id_Conto from Bancomat where Codice ='$Cod'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {

       $Conto=$row["id_Conto"];
	}
}
$sql= "SELECT * FROM `movimenti`WHERE id_Conto = $Conto ORDER BY `Id_Movimento` DESC";
$result= mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
       echo $row["Importo"]." ".$row["TipoMovimento"]." " . $row["DataOra"]." " . $row["Codice"]." " ." " . "<br>";
	}
}
?>