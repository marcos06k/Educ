<?php
// Realizando a conexão com o banco de dados.
include('../conexao.php');

session_start();

$id_aula = $_POST['id_aula'];


$sql_atividade_entrega = "SELECT 
                                atv_ent.id_atividade_entrega,
                                atv_ent.nome_aluno,
                                atv_ent.sobrenome_aluno,
                                atv_ent.data_entrega,
                                atv_ent.arquivo_blob,
                                atv_ent.nome,
                                atv_ent.nota,
                                atv_ent.id_aula
                            FROM atividade_entrega atv_ent
                                INNER JOIN aula al ON atv_ent.id_aula = al.id_aula
                                WHERE al.id_aula='$id_aula' ;
                            ";
$query_atividade_entrega = mysqli_query($banco, $sql_atividade_entrega);

for ($i=0; $i < mysqli_num_rows($query_atividade_entrega); $i++) { 
    $arquivo_blob = mysqli_fetch_row($query_atividade_entrega);
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
                <a href='$arquivo_blob[4]''$arquivo_blob[5]'> $arquivo_blob[5]</a>
                </td>
            </tr>
    </table>
    ";
}


?>