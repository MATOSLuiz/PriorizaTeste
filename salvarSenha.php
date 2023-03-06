<?php  
require_once "conexaomysql.php";

$novaSenha = $_POST['novasenha'];
$id = $_POST['id'];

$updateSenha = "UPDATE usuarios SET senha='$novaSenha' WHERE id='$id'";
$result = $con->query($updateSenha);

header("location: alterarSenha.php");
?>
