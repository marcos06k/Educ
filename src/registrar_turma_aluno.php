<?php

include('conexao.php');

$sql_turma = mysqli_query($banco, "select id_turma, turno, curso, data_inicio, data_termino, id_professor, id_administrador from turma;");
$turmas = mysqli_num_rows($sql_turma);

for ($i=0; $i < $turmas; $i++) { 
    $turma = mysqli_fetch_row($sql_turma);
    echo "id: $turma[0], turno: $turma[1], curso: $turma[2], data de inicio: $turma[3], data de termino: $turma[4], id do professor: $turma[5], id do admin: $turma[6]; <br>";
    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------- <br>";
}

echo "<form action='backend/turmaAluno.php' method='post'> <label for='cpf_aluno'>CPF DO ALUNO</label> <input type='text' name='cpf_aluno' id='cpf_aluno' required> </form>";


?>