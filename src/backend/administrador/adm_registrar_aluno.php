<?php
include('../conexao.php');

session_start();

$emailAdministrador = $_SESSION['email_administrador'];
$senhaAdministrador = $_SESSION['senha_administrador'];
$query_idAdministrador = mysqli_query($banco, "select id_administrador from administrador where email='$emailAdministrador ' and senha='$senhaAdministrador';");
$idAdministrador = mysqli_fetch_row($query_idAdministrador);

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$nome_mae = $_POST['nome_mae'];
$nome_pai = $_POST['nome_pai'];
$dados_pagamento = 'Pendente';
$cpf_responsavel_financeiro = $_POST['cpf_reponsavel_financeiro'];
$email = $_POST['email'];
//password_hash criptografa a senha e manda pro banco 
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


$sql_cadastrarAluno = mysqli_query($banco, "insert into aluno values(null, '$nome', '$sobrenome', '$data_nascimento', '$cpf', '$telefone', '$nome_mae', '$nome_pai', '$dados_pagamento', '$cpf_responsavel_financeiro', '$email', '$senha', $idAdministrador[0]);");
if ($sql_cadastrarAluno) {
    echo "Aluno cadastrado com sucesso!";
} else {
    echo "Erro no cadastrar aluno" . $banco->error;
}
?>