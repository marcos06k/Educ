<?php

include('../conexao.php');

echo json_encode(' Id: ' . $_POST['textoIdTurma']);

$id_turmaJson = $_POST['textoIdTurma'];
$turno = $_POST['turno'];
$curso = $_POST['curso'];
$data_inicio = $_POST['data_inicio'];
$data_termino = $_POST['data_termino'];
$id_professor = $_POST['id_professor'];

$id_turma = json_encode($id_turmaJson) ;

$sql_query = mysqli_query($banco, "UPDATE turma SET turno='$turno', curso='$curso', data_inicio='$data_inicio', data_termino='$data_termino', id_professor='$id_professor' WHERE id_turma='$id_turma';");
?>