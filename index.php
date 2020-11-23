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
        <header>
            <div>
                <h1 style="float: left;">Cursos PHP</h1>
                <?php menu(); ?>
            </div>
        </header>
        <main>
            <div id="slider">
                <figure>
                    <a href="curso.php?curso=1"><img src="assets\1.png"></a>
                    <a href="curso.php?curso=2"><img src="assets\2.png"></a>
                    <a href="curso.php?curso=3"><img src="assets\3.png"></a>
                    <a href=""><img src="assets\4.png"></a>
                    <a href=""><img src="assets\1.png"></a>
                </figure>
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