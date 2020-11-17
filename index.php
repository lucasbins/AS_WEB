<?php
    session_start();
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
    <div>
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
            <div id="slider">
                <figure>
                    <a href=""><img src="assets\1.png"></a>
                    <a href=""><img src="assets\2.png"></a>
                    <a href=""><img src="assets\3.png"></a>
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

<?php

function geracard()
{

    $conn = new mysqli("localhost", "root", "", "webcursos");

    $result = $conn->query("SELECT * FROM tb_cursos");

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card" style="min-width: 12rem; max-width: 18rem; ">
                    <img src="assets/' . $row["img"] . '" class="card-imagem" alt="..." ">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["nomecurso"] . '</h5>
                        <p class="card-text">' . $row["descriçao"] . '</p>
                        <form action="php/functions.php" method="GET">
                            <input class="btn btn-primary" type="submit" value="Inscrever-se" style="position: absolute; bottom:2vh; background: indigo; border: none;">
                        </form>
                    </div>
            </div>';
    }
}

function login(){

    if(!isset($_SESSION['login'])){
        echo '<a href="Login.php">Login</a>';
    }else{
        echo '<a href="">Meus cursos Conta</a>';
        echo '<a href="functions.php?logout=1">Logout</a>';
    }
}
?>