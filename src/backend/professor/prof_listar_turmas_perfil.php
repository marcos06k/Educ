<?php

$email_professor = $_SESSION['email_professor'];
$senha_professor = $_SESSION['senha_professor'];

// Função para Listar as turmas que o professor está registrado e ele poder acessar as informações de cada turma (no Perfil do professor)
function listar_turmas_perfil()
{
    global $banco;
    global $email_professor;
    global $senha_professor;

    // Query para pegar os dados desejados do usuário logado
    $sql_query_dados_professor = mysqli_query($banco, "SELECT id_professor FROM professor WHERE email='$email_professor' AND senha='$senha_professor';");
    $sql_dados_professor = mysqli_fetch_row($sql_query_dados_professor); //Dados do professor - Array

    // SQL para a Query
    $sql_turma = "SELECT 
                        tm.turno,
                        tm.curso,
                        tm.data_inicio,
                        tm.data_termino

                    FROM turma tm 
                        INNER JOIN professor pf on tm.id_professor = pf.id_professor
                    WHERE pf.id_professor='$sql_dados_professor[0]';
    ";

    $sql_query_turma = mysqli_query($banco, $sql_turma ); // Query BD
    
    $sql_result_num_rows_turma = mysqli_num_rows($sql_query_turma); // Total de linhas

    for($i = 0; $i < $sql_result_num_rows_turma; $i++ ){
        $sql_dados_turma = mysqli_fetch_row($sql_query_turma); // Resultado de cada repetição

        echo " <tr class='odd:bg-white even:bg-gray-50 border-b'>
                <td class='px-6 py-4'>$sql_dados_turma[0]</td>
                <td class='px-6 py-4'>$sql_dados_turma[1]</td>
                <td class='px-6 py-4'>$sql_dados_turma[2]</td>
                <td class='px-6 py-4'>$sql_dados_turma[3]</td>
                <td class='px-6 py-4 text-roxo-claro font-semibold'><a href='turma.php' class='hover:underline'>Acessar</a></td>
        </tr>";
    }


    
}
