<?php
// Realizando a conexão com o banco de dados.
include('../conexao.php');

session_start();

$email_aluno = $_SESSION['email_aluno'];
$senha_aluno = $_SESSION['senha_aluno'];

// pegar o id do aluno 
$query_id_aluno = mysqli_query($banco, "select id_aluno from aluno where email='$email_aluno' and senha='$senha_aluno';");
$id_aluno = mysqli_fetch_row($query_id_aluno);

$sql_atividade = "SELECT 
                                atv.id_atividade,
                                atv.arquivo_blob,
                                atv.nome
                            FROM atividade atv
                                INNER JOIN aula al ON atv.id_aula = al.id_aula
                                INNER JOIN turma_aluno_aula tm_aln_al ON al.id_aula = tm_aln_al.id_aula
                                INNER JOIN turma_aluno tm_aln ON tm_aln_al.id_turma_aluno = tm_aln.id_turma_aluno
                                INNER JOIN aluno aln ON tm_aln.id_aluno = aln.id_aluno
                                WHERE aln.id_aluno='$id_aluno[0]';
                            ";
$query_atividade = mysqli_query($banco, $sql_atividade);

for ($i=0; $i < mysqli_num_rows($query_atividade); $i++) { 
    $arquivo_blob = mysqli_fetch_row($query_atividade);
    echo "
    <table>
            <tr>
                <th>id atividade</th>
                <th>arquivo blob</th>
            </tr>
            <tr>
                <td>
                    '$arquivo_blob[0]'
                </td>
                <td>
                <a href='$arquivo_blob[1]''$arquivo_blob[2]'> $arquivo_blob[2]</a>
                </td>
            </tr>
    </table>
    ";
}


?>