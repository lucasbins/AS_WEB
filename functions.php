<?php
	session_start();
	if(count($_POST)!=0){
		$dados = $_POST;

		$login = $dados['login'];
		$senha = $dados['senha'];

		$conn = new mysqli("localhost", "root","","webcursos");

		if($conn->connect_error){
			echo "Error: ".$conn->connect_error;
		}else{
			echo 'Conectado';
		}

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

function login()
{

	if (!isset($_SESSION['login'])) {
		echo '<a href="Login.php">Login</a>';
	} else {
		echo '<a href="functions.php?logout=1">Logout</a>';
		echo '<a href="">Meus cursos</a>';
	}
}


?>