<?php
include('../conexao.php');

session_start();

//dados do login do user ativo
$emailProfessor = $_SESSION['email_professor,'];
$senhaProfessor = $_SESSION['senha_professor'];


$input_id_turma = $_POST['input_id_turma'];
$nome_aula = $_POST['nome_aula'];
$data_aula = $_POST['data_aula'];
$presencial = $_POST['presencial'];

$sql_query = mysqli_query($banco, "insert into aula values (null, '$nome_aula', '$data_aula', '$presencial');");
$id_ultima_aula_cadastrada = $banco->insert_id;

$sql = "SELECT 
                tm_al.id_turma_aluno
        FROM turma_aluno tm_al
            INNER JOIN turma tm ON tm_al.id_turma = tm.id_turma
            INNER JOIN professor pf ON tm.id_professor = pf.id_professor
        WHERE pf.email='$emailProfessor' AND pf.senha='$senhaProfessor' AND tm.id_professor=pf.id_professor AND tm.id_turma='$input_id_turma' and tm_al.id_turma=tm.id_turma ;
        ";

$query_turma_aluno = mysqli_query($banco, $sql);
$quantidade_turmaAluno = mysqli_num_rows($query_turma_aluno);

for ($i=0; $i < $quantidade_turmaAluno; $i++) { 
    $id_turma_aluno = mysqli_fetch_row($query_turma_aluno);
    $query_turma_aluno_aula = mysqli_query($banco, "insert into turma_aluno_aula values (null, '$id_turma_aluno[0]', '$id_ultima_aula_cadastrada');");
}

?>