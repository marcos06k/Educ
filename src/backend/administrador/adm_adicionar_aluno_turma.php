<?php
    include('../conexao.php');

    $valor_id_turma = json_encode($_POST['textoIdTurma']);
    $valor_id_usuario = json_encode($_POST['textoIdTurmaAluno']);
    //query pro BD para inserir na tabela turma_aluno
    $query_test = mysqli_query($banco, "INSERT INTO turma_aluno VALUES (NULL, $valor_id_turma, $valor_id_usuario);");



