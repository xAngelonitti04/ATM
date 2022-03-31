<?php
error_reporting(0);
    # read contents from json file contained in $_POST['file']
    $json = file_get_contents("E:\gennaro.json");
    if(isset($json)){
        $data = json_decode($json, true);
        # print decoded data
        foreach ($data as $pollo=>$tacchino){
            echo $tacchino . "<br>";
        }
    }
    else
    {
        echo "vuoto";
    }
    # decode json to array


?>

<form action="index.php" method="post">

    <input type="submit" value="Submit">

</form>