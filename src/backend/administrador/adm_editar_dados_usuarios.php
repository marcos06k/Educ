<?php

include('../conexao.php');

$textoIdAluno = json_encode($_POST['textoIdAluno']);
$tipo_usuario = json_encode($_POST['tipo_usuario']);
$novo_nome = json_encode($_POST['novo_nome']);
$novo_sobrenome= json_encode($_POST['novo_sobrenome']);
$novo_cpf = json_encode($_POST['novo_cpf']);
$novo_telefone = json_encode($_POST['novo_telefone']);
$nova_data_nascimento = json_encode($_POST['nova_data_nascimento']);
$novo_email = json_encode($_POST['novo_email']);
$nova_senha = json_encode($_POST['nova_senha']);

// Encontrar o usuário através da confirmação do id 
$tabela_BD = $tipo_usuario; //Encontrar qual a tabela que sera feito a query no BD (aluno, professor ou adm)

$coluna_id_usuario = "id_$tipo_usuario"; //Pegar o nome do id da tabela do usuario (ex: id_aluno)
//usuário (id_aluno, id_professor e id_administrador são as colunas existentes de cada tipo de usuário no BD)

$sql_query_aluno = mysqli_query($banco, "SELECT email ,senha FROM $tabela_BD WHERE $coluna_id_usuario=$textoIdAluno;");
$dados_aluno_BD = mysqli_fetch_row($sql_query_aluno);


$novo_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

$sql = "UPDATE $tipo_usuario SET nome=$novo_nome, sobrenome=$novo_sobrenome, data_nascimento=$nova_data_nascimento, 
        cpf=$novo_cpf, telefone=$novo_telefone, email=$novo_email, senha=$novo_senha_hash WHERE email='$dados_aluno_BD[0]' AND senha='$dados_aluno_BD[1]'; ";

$sql_query = mysqli_query($banco, $sql);
