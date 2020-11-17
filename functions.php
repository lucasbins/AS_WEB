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

	
?>