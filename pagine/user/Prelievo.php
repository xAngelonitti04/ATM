<?php 
session_start();
$id=$_GET["id"];
$card = $_SESSION['card'];
$val = $_COOKIE['valore'];
echo $card;
require_once("../../open_php.php");
$sql = "SELECT id_Conto FROM bancomat where Codice='$card'";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
       $Conto = $row['id_Conto'];
	}
} else {
    echo "0 results";
}
$sql = "SELECT Saldo FROM conti where id_Conto=$Conto";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
       $Saldo = $row['Saldo'];
	}
} else {
    echo "0 results";
}
echo $Saldo;

if($Saldo<$val)
{
echo "Non ci sono soldi sufficienti per il prelievo";
}
else
{
    $Saldo = $Saldo-$val;
    if($val==20)
    {

    }
}//
$sql = "UPDATE conti SET Saldo=$Saldo WHERE id_Conto=$Conto";
 
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$DEO = date("Y-m-d")." ".date("H-i-s");
$sql = "INSERT INTO movimenti(Importo,TipoMovimento, DataOra, Codice, id_Conto) VALUES ($val,'Prelievo','$DEO','$card',$Conto)";
 
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header('location: ATM2.php');
?>