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
            <h1 style="text-align:center">Curso: <?php geranome(); ?></h1>
            <hr class="hr3">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php geracurso(); ?>" allowfullscreen></iframe>
            </div>
            <hr class="hr3">
            <button type="submit" value="entrar" class="btn btn-primary" style="float:right;background:indigo;border:none;">Certificado</button>
            <h2>Descrição:</h2>
            <p><?php geradescricao(); ?></p>
            <hr class="hr3">
        </div>
    </main>
    <footer class="container-fluid">
        <h5>COPYRIGHT Lucas Bins - Avaliação Semestral - Programação WEB - ULBRA 2020</h5>
    </footer>
</body>

</html>