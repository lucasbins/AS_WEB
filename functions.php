<?php
	session_start();
	if(count($_POST)!=0){
		$dados = $_POST;

		$login = $dados['login'];
		$senha = $dados['senha'];

		$conn = connect();

		$result = $conn->query("SELECT * FROM `tb_users` WHERE `login` = '$login' AND `senha`= '$senha'");

		if(mysqli_num_rows ($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
				$_SESSION['login'] = $login;
				$_SESSION['idusuario'] = $row['idusuario'];
			}
			header('location: index.php');
		}else{
  			session_destroy();
  			header('location: login.php?error=1');
  		}
	}

	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
		header('location: index.php');
	}

function geracard()
{

	$conn = connect();

	$result = $conn->query("SELECT * FROM tb_cursos");

	while ($row = mysqli_fetch_assoc($result)) {
		echo '<div class="card" style="min-width: 12rem; max-width: 18rem; ">
                    <img src="assets/' . $row["img"] . '" class="card-imagem" alt="..." ">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["nomecurso"] . '</h5>
						<p class="card-text">' . $row["descriçao"] . '</p>  
						<a href="curso.php?curso='. $row["idcurso"] . '&warning=1"class="btn btn-primary" style="position: absolute; bottom:2vh; background: indigo; border: none;">Inscreva-se</a>
                    </div>
            </div>';
	}
}

function inscricao($idcurso){

	$conn = connect();

	$iduser = $_SESSION['idusuario'];

	$result = $conn->query("SELECT * FROM `tb_user_curso` WHERE `fk_user` = '$iduser' AND `fk_curso`= '$idcurso'");

	if (mysqli_num_rows($result) == 0) {
		$query = $conn->prepare("INSERT INTO tb_user_curso(fk_user, fk_curso) VALUES (?,?)");
		$query->bind_param("ss", $iduser, $idcurso);
		$query->execute();
		echo '<div class="alert alert-success" role="alert">
                        Inscrição feita com Sucesso!
                        </div>';
	} else {
		if(isset ($_GET['warning'])) {
			echo '<div class="alert alert-warning" role="alert">
                    Você já esta inscrito nesse curso!
					</div>';}
						
	}
	
	
}

function menu()
{

	if (!isset($_SESSION['login'])) {
		echo '<a href="Login.php">Login</a>';
		echo '<a href="index.php">Home</a>';
	} else {
		echo '	<div class="">
					<a href="functions.php?logout=1">Logout</a>
					<a href="conta.php">Minha Conta</a>
					<a href="index.php">Home</a>
					Bem-Vindo ' . $_SESSION["login"] . '
				</div>';
	}
}

function connect(){
	$conn = new mysqli("localhost", "root", "", "webcursos");

	if ($conn->connect_error)
		echo "Error: " . $conn->connect_error;
	
	return $conn;
}

function geracurso()
{

	if (!isset($_SESSION['login'])) {
		echo '<p>Voce precisa estar logado</p>';
	} else {
		$conn = connect();

		$curso = $_GET["curso"];
		
		inscricao($curso);

		$result = $conn->query("SELECT * FROM tb_cursos WHERE idcurso = $curso");

		while($row = mysqli_fetch_assoc($result)){
			echo '<h1 style="text-align:center">Curso: '.$row["nomecurso"].'</h1>
            <hr class="hr3">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$row["url"].'" allowfullscreen></iframe>
            </div>
            <hr class="hr3">
            <button type="submit" value="entrar" class="btn btn-primary" style="float:right;background:indigo;border:none;">Certificado</button>
            <h2>Descrição:</h2>
            <p>'.$row["descriçao"].'</p>
            <hr class="hr3">';
		}
	}
}

function geraconta(){

	$conn = connect();

	if(!isset($_SESSION['login'])){
		echo '<p>Voce precisa estar logado</p>';
	}else{
		$login = $_SESSION['login'];

		$result = $conn->query("SELECT * FROM `tb_users` WHERE `login` = '$login'");

		while ($row = mysqli_fetch_assoc($result)) {
			echo '<dl class="row">
                <dt class="col-sm-3">Nome: </dt>
                <dd class="col-sm-9">' . $row["nome"] . '</dd>

                <dt class="col-sm-3">E-mail: </dt>
                <dd class="col-sm-9">' . $row["email"] . '</dd>

                <dt class="col-sm-3">Telefone: </dt>
				<dd class="col-sm-9">' . $row["fone"] . '</dd>
				
				<dt class="col-sm-3">Data de Nascimento: </dt>
                <dd class="col-sm-9">' . $row["nasc"] . '</dd>
            </dl>';
		}
	}
}

function geracardconta(){
	$conn = connect();

	$iduser = $_SESSION['idusuario'];

	$result = $conn->query("SELECT * FROM tb_cursos INNER JOIN tb_user_curso ON fk_curso = idcurso WHERE fk_user = $iduser");

	if(mysqli_num_rows($result)>0){
		while ($row = mysqli_fetch_assoc($result)) {
			echo 	'<div class="card mb-3" style="height: 10rem";">
  					<div class="row no-gutters">
    					<div class="col-md-4">
      						<img src="assets/' . $row["img"] . '" class="card-img" style="width:15rem; padding: 2rem;">
    					</div>
    					<div class="card-body" style="position:absolute;left:15rem;">
        					<h5 class="card-title">' . $row["nomecurso"] . '</h5>
        					<p class="card-text">' . $row["descriçao"] . '</p>
      					</div>	
					</div>
					<a href="curso.php?curso=' . $row["idcurso"] . '"class="btn btn-primary" style="right:2rem;bottom:6rem;position: absolute;background: indigo; border: none;">Continuar</a>
					<a href="curso.php?curso=' . $row["idcurso"] . '"class="btn btn-primary" style="right:2rem;bottom:2rem;position: absolute;background: indigo; border: none;">Encerrar Curso</a>
				</div>';
		}
	}else{
		echo 	'<div class="alert alert-light" role="alert">Você nao possui nenhum curso cadastrado :(</div>';
	}
	
}

?>