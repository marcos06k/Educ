<?php
// Realizando a conexão com o banco de dados.
include('../conexao.php');

session_start();

$email_aluno = $_SESSION['email_aluno'];
$senha_aluno = $_SESSION['senha_aluno'];

// pegar o id do aluno 
$query_id_aluno = mysqli_query($banco, "select id_aluno from aluno where email='$email_aluno' and senha='$senha_aluno';");
$id_aluno = mysqli_fetch_row($query_id_aluno);

$sql_conteudo_assincrono = "SELECT 
                                cnt_ass.id_conteudo_assincrono,
                                cnt_ass.arquivo_blob,
                                cnt_ass.nome
                            FROM conteudo_assincrono cnt_ass
                                INNER JOIN aula_conteudo_assincrono al_cnt_ass ON cnt_ass.id_conteudo_assincrono = al_cnt_ass.id_conteudo_assincrono
                                INNER JOIN aula al ON al_cnt_ass.id_aula = al.id_aula
                                INNER JOIN turma_aluno_aula tm_aln_al ON al.id_aula = tm_aln_al.id_aula
                                INNER JOIN turma_aluno tm_aln ON tm_aln_al.id_turma_aluno = tm_aln.id_turma_aluno
                                INNER JOIN aluno aln ON tm_aln.id_aluno = aln.id_aluno
                                WHERE aln.id_aluno='$id_aluno[0]';
                            ";
$query_conteudo_assincrono = mysqli_query($banco, $sql_conteudo_assincrono);

for ($i=0; $i < mysqli_num_rows($query_conteudo_assincrono); $i++) { 
    $arquivo_blob = mysqli_fetch_row($query_conteudo_assincrono);
    echo "
    <table>
            <tr>
                <th>id conteudo assincrono</th>
                <th>arquivo blob</th>
                <th>nome</th>
            </tr>
            <tr>
                <td>
                    '$arquivo_blob[0]'
                </td>
                <td>
                    '$arquivo_blob[1]'
                </td>
                <td>
                    '$arquivo_blob[2]'
                </td>
            </tr>
    </table>
    ";
}


?>