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
        }
    </script>
</head>

<body>
    <div>
        <header>
            <div>
                <h1 style="float: left;">Cursos PHP</h1>
                <ul>
                    <li><a href="functions.php?logout=1">Logout</a></li>
                </ul>
            </div>
        </header>
        <main>
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
            </div>
        </main>
        <footer class="container-fluid">
            <h5>COPYRIGHT Lucas Bins - Avaliação Semestral - Programação WEB - ULBRA 2020</h5>
        </footer>
    </div>
    <!--INICIO DO MODAL
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Você tem certeza disso?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="document.write('<?php deletecurso() ?>');">Deletar</button>
                </div>
            </div>
        </div>
    </div>
    FIM DO MODAL-->
</body>

</html>