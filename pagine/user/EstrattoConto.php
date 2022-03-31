<?php
error_reporting(0);
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
$sql= "SELECT movimenti.Importo,movimenti.TipoMovimento,movimenti.DataOra,movimenti.Codice,Conti.Saldo,Utenti.Nome,Utenti.Cognome,Utenti.DataNascita 
        FROM movimenti,conti,utenti 
        WHERE utenti.Id_Utente=conti.id_Utente 
        AND conti.Id_Conto=movimenti.id_Conto 
        AND movimenti.id_Conto=$Conto ORDER BY movimenti.DataOra DESC LIMIT 9";
$result= mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
       $codice=$row["Codice"];
       $nome=$row["Nome"];
       $cognome=$row["Cognome"];
       $datanascita=$row["DataNascita"];
      }
}
?>
<h1 style='font-size:45px'>Estratto Conto</h1>
   <br><br>
   <table align='right'>
   <tr><td>Codice Conto:</td><td><?php echo $codice ?></td></tr>
   <tr><td>Nome:</td><td><?php echo $nome?></td></tr>
   <tr><td>Cognome:</td><td><?php echo $cognome ?></td></tr>
   <tr><td>Data Di Nascita:</td><td><?php echo $datanascita ?></td></tr>
   <hr>

   </table>
   <table align='left'>
   <tr><td>Panetti Bank</td></tr>
   <tr><td>Via Pippo ,29</td></tr>
   <tr><td>P. IVA: 0000000000000</td></tr>
   <tr><td>Ragione Sociale:(S.n.c)</td></tr>

</table>

<br><br><br><br><br><br><br><hr><table align="left">
<?php
   
   $result= mysqli_query($conn,$sql);
   if (mysqli_num_rows($result) > 0) {
       // output data of each row
       while($row = mysqli_fetch_assoc($result)) 
       {
          $tipomovimento=$row["TipoMovimento"];
          $dataora=$row["DataOra"];
          echo'<tr><td>'.$tipomovimento.'</td></tr>';	
          ?>
          &emsp;&emsp;
          <?php
          echo'<tr><td>'.$dataora.'</td></tr>';	
         }
   }
      
      ?>
</table>

<table align="right">
<?php
   
   $result= mysqli_query($conn,$sql);
   if (mysqli_num_rows($result) > 0) {
       // output data of each row
       while($row = mysqli_fetch_assoc($result)) 
       {
          $saldo=$row["Saldo"];
          $importo=$row["Importo"];
          echo'<tr><td>'."<br>" .'</td></tr>';	
          ?>
          <?php
          echo'<tr><td>'.$importo.'</td></tr>';	
         }
   }
      
      ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<hr>
      <h1 align='right'>SALDO DEL CONTO: <?php echo $saldo?> &euro;</h1>