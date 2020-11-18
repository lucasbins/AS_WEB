<?php
require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Cursos WEB</title>

</head>

<body>
    <header class="container-flex">
        <div class="row">
            <div class="col">
                <h1>Cursos PHP</h1>
            </div>
            <div class="col-4">
                <div class="menu">
                    <?php login(); ?>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="mx-auto" style="width:80%">
            <?php geracurso();?>
        </div>
    </main>
    <footer class="container-fluid">
        <h5>COPYRIGHT Lucas Bins - Avaliação Semestral - Programação WEB - ULBRA 2020</h5>
    </footer>
</body>

</html>