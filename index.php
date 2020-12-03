<?php
require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css\Style.css">
    <link rel="stylesheet" type="text/css" href="css\slider.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Cursos WEB</title>

</head>

<body>
    <div>
        <img src="assets\logo.png" style="height:5rem; float:left;position:absolute;left:8rem;">
        <header style="height: 5rem;">
            <div>
                <?php menu(); ?>
            </div>
        </header>
        <main>
            <div class="container" style="width:80%; margin:auto;">
                <h1 class="display-4" style="position: absolute;">Bem-vindos</h1>
                <img src="assets\logo2.png" style="top:0rem;margin:auto;">
            </div>
            <!--Começo dos cards-->
            <div class="container-deck">
                <div class="card-deck">
                    <?php geracard(); ?>
                </div>
            </div>
        </main>
        <footer class="container-fluid">
            <h5>COPYRIGHT Lucas Bins - Avaliação Semestral - Programação WEB - ULBRA 2020</h5>
        </footer>
    </div>
</body>

</html>