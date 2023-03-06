<link href="../assets/bootstrap.min.css" rel="stylesheet">
<?php 
require_once "protect.php";
verificaIntersolid($_SESSION['id']);

require_once "conexaomysql.php";

$id = $_SESSION['id'];

$selectSenha = "SELECT * from usuarios WHERE id= $id";
$result = $con->query($selectSenha);

if($result->num_rows > 0 ) {
    while($user_data = mysqli_fetch_assoc($result)) {
        $senha = $user_data['senha'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prioriza</title>
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <link href="./assets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="container-fluid d-flex justify-content-center mb-3">
        <nav class="navbar">
            <h1 class="display-5 p-3">Priorização de Tarefas<img src="./assets/Logo.png" alt="logo"></h1>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-6 d-flex justify-content-start mb-3">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a href="priorizacao.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
                </ol>
            </div>
    <form action="salvarSenha.php" method="POST">

        <div class="form-floating mb-3">
            <input type="email" class="form-control text-uppercase" disabled id="floatingInput" placeholder="name@example.com" value="<?php echo $_SESSION['usuario']?>">
            <label for="floatingInput">Usuario</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="novasenha" id="floatingPassword" placeholder="Password" value="<?php echo $senha?>">
            <label for="floatingPassword">Digite sua nova senha</label>
        </div>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input class="btn btn-success" type="submit" name="update" value="Alterar Senha" onclick="return alert('Senha alterada com sucesso!')">
    </form>
    </div>