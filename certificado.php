<?php
    require_once('functions.php');

    $conn = connect();

    $idcurso = $_GET['curso'];
    $iduser = $_SESSION['idusuario'];

    $sql = "UPDATE  tb_user_curso SET concluido = true WHERE fk_user = $iduser AND fk_curso = $idcurso";
    $conn->query($sql);

    $result = $conn->query("SELECT * FROM tb_cursos WHERE idcurso = $idcurso");
    while ($row = mysqli_fetch_assoc($result)){
        $curso = $row["nomecurso"];
    }

    $result = $conn->query("SELECT * FROM tb_users WHERE idusuario = $iduser");
    while ($row = mysqli_fetch_assoc($result)) {
        $aluno = $row["nome"];
    }

    $image = imagecreatefrompng("assets/certificado.png");

    $nomealuno = imagecolorallocate($image, 0, 0, 0);
    $nomecurso = imagecolorallocate($image, 75, 0, 130);

    $font1 = realpath('assets/FiraCode-Regular.ttf');
    $font2 = realpath('assets/FiraCode-Bold.ttf');

    imagettftext($image, 25, 0, 500, 470, $nomealuno, $font1, $aluno);
    imagettftext($image, 30, 0, 350, 600, $nomecurso, $font2, $curso);

    imagettftext($image,15,0,400,700,$nomealuno, $font1, "No dia ".date("d/m/y"));

    header("Content-Type: image/jpeg");

    imagejpeg($image);
    imagedestroy($image);
?>