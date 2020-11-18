<?php
	session_start();
	if(count($_POST)!=0){
		$dados = $_POST;

		$login = $dados['login'];
		$senha = $dados['senha'];

		$conn = connect();

		$result = $conn->query("SELECT * FROM `tb_users` WHERE `login` = '$login' AND `senha`= '$senha'");

		if(mysqli_num_rows ($result) > 0 ){
			$_SESSION['login'] = $login;
			$_SESSION['idusuario'] = $iduser;
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
						<a href="curso.php?curso='. $row["idcurso"] . '"class="btn btn-primary" style="position: absolute; bottom:2vh; background: indigo; border: none;">Inscreva-se</a>
                    </div>
            </div>';
	}
}

function login()
{

	if (!isset($_SESSION['login'])) {
		echo '<a href="Login.php">Login</a>';
		echo '<a href="index.php">Home</a>';
	} else {
		echo '<a href="functions.php?logout=1">Logout</a>';
		echo '<a href="conta.php">Minha Conta</a>';
		echo '<a href="index.php">Home</a>';
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
	$conn = connect();

	$curso = $_GET["curso"];

	$result = $conn->query("SELECT url FROM tb_cursos WHERE idcurso = $curso");

	$row = mysqli_fetch_assoc($result);

	echo $row["url"];

}

function geranome(){
	$conn = connect();

	$curso = $_GET["curso"];

	$result = $conn->query("SELECT nomecurso FROM tb_cursos WHERE idcurso = $curso");

	$row = mysqli_fetch_assoc($result);

	echo $row["nomecurso"];
}

function geradescricao()
{
	$conn = connect();

	$curso = $_GET["curso"];

	$result = $conn->query("SELECT descriçao FROM tb_cursos WHERE idcurso = $curso");

	$row = mysqli_fetch_assoc($result);

	echo $row["descriçao"];
}

function geraconta(){

	$conn = connect();

	$login = $_SESSION['login'];

	$result = $conn->query("SELECT * FROM `tb_users` WHERE `login` = '$login'");

	while($row = mysqli_fetch_assoc($result)){
		echo '<dl class="row">
                <dt class="col-sm-3">Nome: </dt>
                <dd class="col-sm-9">'.$row["nome"]. '</dd>

                <dt class="col-sm-3">E-mail: </dt>
                <dd class="col-sm-9">' . $row["email"]. '</dd>

                <dt class="col-sm-3">Telefone: </dt>
				<dd class="col-sm-9">' . $row["fone"] . '</dd>
				
				<dt class="col-sm-3">Data de Nascimento: </dt>
                <dd class="col-sm-9">' . $row["nasc"] . '</dd>
            </dl>';
	}

}

?>