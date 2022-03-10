<div>
    ciao amoruso
<form  method="post" >
  USERNAME<input type="text" name="user">
  PASSWORD<input type="password" name="password">
  <input type="submit" value="LOGIN" name="invia">
</html>
    <?php
$user="angelo";
$pass="nicios";
if(isset($_POST["invia"])){
    if($_POST["user"]==$user && $_POST["password"]==$pass){
        echo "<center><h1>HOMEPAGE</h1>"; 
        echo "<a href=''>Pagina 1</a><br>";
        echo "<a href=''>Logout</a></center>";
    }
    else{
        echo"<center>le credenziali inserite sono errate...verrai reindirizzato alla pagina di login</center>";
    }

}
    ?>  
</div>
