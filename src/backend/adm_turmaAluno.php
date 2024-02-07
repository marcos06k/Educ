<?php

include('../conexao.php');



echo "<form action='turmaAluno.php' method='post'><label for='id_turma'>ID DA TURMA:</label><input type='number' name='id_turma' id='id_turma'><label for='id_aluno'>ID DO ALUNO:</label><input type='number' name='id_aluno' id='id_aluno'><input type='submit'></form>";

$id_turma = $_POST['id_turma'];
$id_aluno = $_POST['id_aluno'];


$sql_adicionarAlunoTurma = mysqli_query($banco, "insert into turma_aluno values (null, '$id_turma', '$id_aluno');");


?>

