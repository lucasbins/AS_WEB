<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css\Style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Cursos WEB - Admin </title>
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
                <?php if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger" role="alert" style="width: 400px;margin: auto;">
                        Erro de Cadastro.
                        </div><br>';
                } ?>

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input class="form-control" type="text" placeholder="Nome" name="nome">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tempo</label>
                        <input class="form-control" type="text" placeholder="0:00:00" name="tempo">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">URL</label>
                        <input class="form-control" type="text" placeholder="https://www.youtube.com/watch?v=" name="url">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Imagem do Curso</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileupload">
                    </div>

                    <button type="reset" value="cadastrar" class="btn btn-primary" style="background:indigo;border:none;">Limpar</button>
                    <button type="submit" value="cadastrar" class="btn btn-primary" style="background:indigo;border:none;">Cadastrar</button>

                </form>
            </div>
        </main>
        <footer class="container-fluid">
            <h5>COPYRIGHT Lucas Bins - Avaliação Semestral - Programação WEB - ULBRA 2020</h5>
        </footer>
    </div>

</body>

</html>

<?php
if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    $nome = $_POST['nome'];
    $temp = $_POST['tempo'];
    $url = $_POST['url'];
    $descricao = $_POST['descricao'];
    $file = $_FILES["fileupload"];
    $arquivo = $file["name"];

    $dirUploads = "assets";
    if (!is_dir($dirUploads)) {

        mkdir($dirUploads);
    }

    if (move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])) {
        echo "UPLOAD realizado dom sucesso!";
    } else {
        throw new Exception("Não foi possível realizar o upload.");
    }

    $conn = new mysqli("localhost", "root", "", "webcursos");

    if ($conn->connect_error)
        echo "Error: " . $conn->connect_error;

    $query = $conn->prepare("INSERT INTO tb_cursos (nomecurso,tempodecurso,url,img,descriçao) VALUES (?,?,?,?,?)");
    $query->bind_param("sssss", $nome, $temp, $url, $arquivo, $descricao);
    $query->execute();

    header('location: admin.php?sucess=1');
} else

?>