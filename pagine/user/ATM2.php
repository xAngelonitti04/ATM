<?php
error_reporting(0);
session_start();
require_once("../../open_php_user.php");
if (isset($_POST["value"])) {
    $a = $_POST["value"];
    //CONTROLLO CARTA
    $Cod = $_SESSION['card'];
    $sql = "SELECT PIN FROM Bancomat where Codice='$Cod'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $PIN = $row['PIN'];

            if ($PIN == $a) {

                echo "<script>window.location.href='ATM2.php'</script>";
            }
        }
    } else {
        echo "0 results";
    }
    //FINE CONTROLLO CARTA
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="it">
<?php
require_once("../admin/head.php");
?>
<style>
    .cucuua {
        display: none;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }

    td {
        font-size: 18px
    }

    th {
        text-align: left
    }

    @media print {
        * {
            font-family: sans-serif;
        }

        .hideOnPrint {
            display: none
        }
    }
</style>

<body>
    <div class="hideOnPrint">
        <header class="ScriptHeader">
            <div class="rt-container">
                <div class="col-rt-12" style="float: left;">
                    <h1 class="rt-heading" style="font-size:50px">ATM<?php echo $_SESSION["nome"];?></h1>
                </div>
            </div>
        </header>
        <div class="schermo">
            <h1 class="rt-heading">Cosa desideri fare?</h1>
            <style>
                .tableang {
                    caption-side: bottom;
                    border-collapse: collapse;
                    width: 100%;
                    margin-left: 50px;
                }
            </style>
            <table class="tableang">
                <tbody>
                    <tr>
                        <td><input type="submit" value="Preleva" OnClick='Preleva()'></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><input type="submit" value="Versa" OnClick='Versa()'></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="EstrattoConto" OnClick='EstrattoConto()'></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><input type="submit" value="Esci" OnClick='Esci()'></td>
                    </tr>
                </tbody>
            </table>




        </div>
        <div style="position: absolute; top:3px; right:13px">
            <a href="../index.html"><button class="button1">TORNA ALLA HOME</button></a>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <div id="myDIV" class='cucuua'>

        <?php require_once("EstrattoConto.php") ?>
    </div>
    <script>
        function Preleva() {
            window.location.href = 'Preleva.php'

        };

        function Versa() {
            window.location.href = 'Versa.php'
        };

        function EstrattoConto() {
            var element = document.getElementById("myDIV");
            element.classList.remove("cucuua");
            window.print();
            var element = document.getElementById("myDIV");
            element.classList.add("cucuua");
        };

        function Esci() {
            window.location.href = 'Atm.php'
        };
        let input_principale = $("form input")
        let input_hidden = $("#result_hidden"); // questa è l'input che viene inviata al server php.
        let form = $("#form")
        $("div#bottoni input").click(function() {
            if ($(this).val() === 'C') {
                input_principale.val('')
                input_hidden.val('')
            } else if ($(this).val() === 'OK' && input_principale.val() !== '' && input_principale.val() !== null) {
                form.submit()
            } else {
                input_principale.val(input_principale.val() + $(this).val())
                input_hidden.val(input_hidden.val())
            }
        })
    </script>
</body>

</html>