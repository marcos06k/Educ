<?php
include('../conexao.php');

//funcionando
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
//password_hash criptografa a senha e manda pro banco 
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql_cadastrarAdministrador = mysqli_query($banco, "insert into administrador values(null, '$nome', '$sobrenome', '$data_nascimento', '$cpf', '$telefone', '$email', '$senha');");

if($sql_cadastrarAdministrador) {
    echo "Administrador cadastrado com sucesso!";
} else {
    echo "Erro no cadastrar administrador".$banco->error;
}
?>