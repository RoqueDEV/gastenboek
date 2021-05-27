<?php
        require "requires/config.php";

        $sql = "SELECT * FROM gastenboek ORDER BY id DESC";
        $result = $con->query($sql);
        $gastenboek_array = [];

        // output data of each row
        while($data = $result->fetch_assoc()) {
            $gastenboek_array[] = $data;
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <h1 class="color_white">Gastenboek</h1>
        <div class="gastenboek-container">
            <div class="gastenboek-list">
            <?php if (empty($gastenboek_array)) { ?>
                <p>Geen items..</p>
            <?php } else { ?>
            <?php foreach($gastenboek_array as $gastenboek) {?>
                <div class="gastenboek-item">
                    <div class="naam"><?php echo $gastenboek["naam"]; ?></div>
                    <?php 
                        $datetime = new DateTime($gastenboek["tijd"]);
                        echo '<div class="tijd">'.$datetime->format('d/m/y H:i').'</div>';
                    ?>
                    <div class="bericht"><?php echo $gastenboek["bericht"]; ?></div>
                </div>
            <?php } ?>
            <?php } ?>
        </div>
        <a class= "color_white" href="index.php">Invulveld</a>
    </main>
</body>
</html>