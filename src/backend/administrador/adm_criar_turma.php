<?php


include('../conexao.php');
session_start();

$emailAdministrador = $_SESSION['email_administrador'];
$senhaAdministrador = $_SESSION['senha_administrador'];
$query_idAdministrador = mysqli_query($banco, "select id_administrador from administrador where email='$emailAdministrador ' and senha='$senhaAdministrador';");
$idAdministrador = mysqli_fetch_row($query_idAdministrador);

$turno = $_POST['turno'];
$curso = $_POST['curso'];
$data_inicio = $_POST['data_inicio'];
$data_termino = $_POST['data_termino'];
$id_professor = $_POST['id_professor'];

$sql_query = mysqli_query($banco, "insert into turma values (null, '$turno', '$curso', '$data_inicio', '$data_termino', '$id_professor', '$idAdministrador[0]');");

?>