<?php 
session_start();
$id=$_SESSION["id"];
$card = $_SESSION['card'];
$val = $_COOKIE['valore'];
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

if($Saldo<$val)
{
echo "Non ci sono soldi sufficienti per il prelievo";
}
else
{
    //PRELIEVO DA 20
    if($val==20)
    {
      $sql20="SELECT Banconote20 from atm where id_ATM=$id";
      $result=mysqli_query($conn,$sql20);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
           $Banconote20 = $row['Banconote20'];
        }
    }
    if($Banconote20==0)
    {
        echo "Le banconote da 20 non sono presenti all'interno di questo ATM, ci scusiamo per il disagio";
    }
    else
    {
        $Saldo = $Saldo-$val;
        $sql="UPDATE atm.atm SET Banconote20 = Banconote20-1 WHERE atm.Id_ATM = $id";
        $result=mysqli_query($conn,$sql);
        $DEO = date("Y-m-d")." ".date("H-i-s");
$sql = "INSERT INTO movimenti(Importo,TipoMovimento, DataOra, Codice, id_Conto) VALUES ($val,'Prelievo','$DEO','$card',$Conto)";
echo "PRELIEVO COMPLETATO";
 
if (mysqli_query($conn, $sql)) {
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    }
}

//PRELIEVO DA 50

if($val==50)
    {
      $sql="SELECT Banconote50 from atm where id_ATM=$id";
      $result=mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
           $Banconote50 = $row['Banconote50'];
        }
    }
    if($Banconote50==0)
    {
        echo "Le banconote da 50 non sono presenti all'interno di questo ATM, ci scusiamo per il disagio";
    }
    else
    {
        $Saldo = $Saldo-$val;
        $sql="UPDATE atm.atm SET Banconote50 = Banconote50-1 WHERE atm.Id_ATM = $id";
        $result=mysqli_query($conn,$sql);
        $DEO = date("Y-m-d")." ".date("H-i-s");
$sql = "INSERT INTO movimenti(Importo,TipoMovimento, DataOra, Codice, id_Conto) VALUES ($val,'Prelievo','$DEO','$card',$Conto)";
echo "PRELIEVO COMPLETATO";
 
if (mysqli_query($conn, $sql)) {
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    }
}
}//
$sql = "UPDATE conti SET Saldo=$Saldo WHERE id_Conto=$Conto";
 
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


header('refresh:3, url = ATM2.php');
?>