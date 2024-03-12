<?php

if (!empty($_POST['textoIdTurma']) || !empty($_POST['textoIdTurmaAluno'])) {
    adicionar_aluno_turma($_POST['textoIdTurma'], $_POST['textoIdTurmaAluno']);
}

// Adicionar o aluno na turma conforme o que vem da opçao Gerenciar(adicionar Aluno) 
function adicionar_aluno_turma($valor_id_turma, $valor_id_usuario)
{
    include('../conexao.php');

    //query pro BD para inserir na tabela turma_aluno
    $query_test = mysqli_query($banco, "insert into turma_aluno values (null, '$valor_id_turma', '$valor_id_usuario');");
}
