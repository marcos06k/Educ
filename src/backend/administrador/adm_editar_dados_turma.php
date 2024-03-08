<?php

include('../conexao.php');

$id_turma = json_encode($_POST['textoIdTurma']) ;
$turno  = json_encode($_POST['turno']) ;
$curso = json_encode($_POST['curso']) ;
$data_inicio = json_encode($_POST['data_inicio']) ;
$data_termino = json_encode($_POST['data_termino']) ;
$id_professor = json_encode($_POST['id_professor']) ;


$sql_query = mysqli_query($banco, "UPDATE turma SET turno=$turno, curso=$curso, data_inicio=$data_inicio, data_termino=$data_termino, id_professor=$id_professor WHERE id_turma=$id_turma;");
?>