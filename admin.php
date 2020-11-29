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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Cursos WEB - Admin </title>
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Tem Certeza?');
            <?php deletecurso(); ?>
        }
    </script>
</head>

<body>
    <div>
        <img src="assets\logo.png" style="height:5rem; float:left;position:absolute;left:8rem;">
        <header>
            <div>
                <ul>
                    <li><a href="functions.php?logout=1">Logout</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="addcurso.php">Adicionar Curso</a></li>
                </ul>
            </div>
        </header>
        <main>
            <?php if (isset($_GET['sucess'])) {
                echo '<div class="alert alert-primary" role="alert" style="width: 400px;margin: auto;">
                        Cadastrado com Sucesso!
                        </div>';
            } ?>
            <div class="mx-auto" style="width:80%">
                <h1 class="display-4" style="color:indigo;">Cursos Inscritos</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Cod</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Inscritos</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php table_curso(); ?>
                    </tbody>
                </table>
                <a href="addcurso.php" class="btn btn-primary" style="background: indigo; border: none;">Adicionar Curso</a>
                <br><br>
                <hr class="hr3">
                <h1 class="display-4" style="color:indigo;">Relatorio</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Usuarios</th>
                            <th scope="col">Cursos</th>
                            <th scope="col">Inscrições</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php relatorio(); ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer class="container-fluid">
            <h5>COPYRIGHT Lucas Bins - Avaliação Semestral - Programação WEB - ULBRA 2020</h5>
        </footer>
    </div>
</body>

</html>