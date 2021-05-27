<?php
    require "requires/config.php";

    $respone = false;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST['type'] == "createreal") {
            if(!isset($_COOKIE["gastenboek"])) {
                if(empty($_POST['naam']) || empty($_POST['bericht']) )  {
                    echo "Error vul alle velden in.";
                }
                $description = htmlspecialchars(nl2br($_POST["bericht"]), ENT_QUOTES, 'UTF-8');
                $naam = htmlspecialchars(nl2br($_POST["naam"]), ENT_QUOTES, 'UTF-8');
                $insert = $con->query("INSERT INTO gastenboek (naam,bericht) VALUES('".$con->real_escape_string($naam)."','".$con->real_escape_string($description)."')");
                if ($insert) {
                    $respone = true;
                    setcookie("gastenboek", true, time() + (86400 * 30), "/"); // 86400 = 1 day
                }
            } else {
                echo "<p>Probeer het later opnieuw.</p>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek - invullen</title>
    <link href="assets/css/gastenboek.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <h1>Gastenboek</h1>
        <div class="creategastenboek-container">
            <div class="creategastenboek">
                <form method="post">
                    <input type="hidden" name="type" value="createreal">
                    <input type="text" maxlength="50" name="naam" placeholder="Naam" id="naam" required>
                    <input type="text" maxlength="255" placeholder="Bericht" name="bericht" id="bericht" required>
                    <div id="wrapper">
                        <button type="submit" name="create">Verstuur</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="gastenboek.php">Gastenboek</a>
    </main>
</body>
</html>