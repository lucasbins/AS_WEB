<!DOCTYPE html>
<html lang="Pt-br">
<meta charset="utf-8" />

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body style="background: indigo;"><?php if (isset($_GET['sucess'])) {
                                            echo '<div class="alert alert-primary" role="alert" style="width: 400px;margin: auto;">
                        Usuário cadastrado com sucesso
                        </div>';
                                        } ?>
    <div style="width: 500px; margin: auto;padding: 25px;margin-top: 100px;">
        <form method="POST" action="functions.php" id="login">
            <label for="login">Usuário</label>
            <input type="text" class="form-control" name="login">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha">
            <a href="login.php" class="text-decoration-none" style="float:right;color:white;">Limpar</a>
            <br>
            <?php if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger" role="alert" style="width: 400px;margin: auto;">
                        Usuário ou Senha inválidos <a href="#" class="alert-link">clique aqui</a> para realizar o cadastro.
                        </div>';
            } ?>
            <br>
            <a class="btn btn-primary" href="cadastro.php" role="button" id="button">Cadastre-se</a>
            <button type="submit" value="entrar" class="btn btn-primary" style="float:right;">Login</button>
        </form>
    </div>
</body>
</html>