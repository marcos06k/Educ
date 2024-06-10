<?php

session_start();
$email_aluno = $_SESSION['email_aluno'];
$senha_aluno = $_SESSION['senha_aluno'];

function alun_dados_perfil(){
    global $banco;
    global $email_aluno;
    global $senha_aluno;

    // Query para pegar os dados desejados do usuário logado
    $sql_query_dados_aluno = mysqli_query($banco, "SELECT id_aluno, nome FROM aluno WHERE email='$email_aluno' AND senha='$senha_aluno';");
    $sql_dados_aluno = mysqli_fetch_row($sql_query_dados_aluno);

    // Query para percorrer a lista de turmas e pegar a quantidade de turmas que o aluno está registrado

    $sql_turma = "SELECT 
                        tm.curso
                    FROM turma tm
                        INNER JOIN turma_aluno ta on ta.id_turma = tm.id_turma
                        INNER JOIN aluno al on ta.id_aluno = al.id_aluno
                    WHERE al.id_aluno='$sql_dados_aluno[0]';
    ";

    $sql_query_turma = mysqli_query($banco, $sql_turma );
    // Pegando o total de linhas que a resultou da query
    $sql_result_num_rows_turma = mysqli_num_rows($sql_query_turma);
    
    


    echo "<div class='flex flex-col items-center bg-white h-3/4 w-3/12 2xl:h-96 2xl:w-1/4 rounded-3xl shadow-md'>
                <div class='h-2/6 w-full bg-gradient-to-l from-purple-900 to-violet-700 rounded-t-3xl'></div>
                <img src='../../../assets/user.png' class='size-40 2xl:size-32 mt-[-85px] drop-shadow-md' alt=''>
                <div class='w-full flex flex-col items-center mt-4'>
                    <h1 class='font-semibold text-lg'>$sql_dados_aluno[1]</h1>
                    <p class='text-gray-500'>Aluno</p>
                </div>
                    <div class='h-20 w-full mt-10 flex justify-center items-center gap-12'>
                        <div class='text-center'>
                            <h1 class='text-roxo-claro font-semibold text-3xl'>$sql_result_num_rows_turma</h1>
                            <p class='text-gray-500'>Turmas</p>
                        </div>
                        
                    </div>
                </div>
            </div>";
}
// Função para Listar as turmas que o aluno está registrado e ele poder acessar as informações de cada turma (no Perfil do aluno)
function listar_turmas_perfil()
{
    global $banco;
    global $email_aluno;
    global $senha_aluno;

    // Query para pegar os dados desejados do usuário logado
    $sql_query_dados_aluno = mysqli_query($banco, "SELECT id_aluno, nome FROM aluno WHERE email='$email_aluno' AND senha='$senha_aluno';");
    $sql_dados_aluno = mysqli_fetch_row($sql_query_dados_aluno);

    // SQL para a Query
    $sql_turma = "SELECT 
                        tm.id_turma,
                        tm.turno,
                        tm.curso,
                        tm.data_inicio,
                        tm.data_termino

                    FROM turma tm 
                        INNER JOIN turma_aluno ta on ta.id_turma = tm.id_turma
                        INNER JOIN aluno al on ta.id_aluno = al.id_aluno
                    WHERE al.id_aluno='$sql_dados_aluno[0]';
    ";

    $sql_query_turma = mysqli_query($banco, $sql_turma); // Query BD

    $sql_result_num_rows_turma = mysqli_num_rows($sql_query_turma); // Total de linhas

    for ($i = 0; $i < $sql_result_num_rows_turma; $i++) {
        $sql_dados_turma = mysqli_fetch_row($sql_query_turma); // Resultado de cada repetição

        echo " <tr class='odd:bg-white even:bg-gray-50 border-b'>
                <td class='px-6 py-4'>$sql_dados_turma[1]</td>
                <td class='px-6 py-4'>$sql_dados_turma[2]</td>
                <td class='px-6 py-4'>$sql_dados_turma[3]</td>
                <td class='px-6 py-4'>$sql_dados_turma[4]</td>
                <td class='px-6 py-4 text-roxo-claro font-semibold'>
                <form action='turma.php' method='post' >
                    <input id='inputIdTurma' type='text' value='$sql_dados_turma[0]' name='inputIdTurma' style='display: none;'>
                    <input type='submit' value='entrar'>
                </form>
                
                </td>
        </tr>";
    }
}
                // <button name='acao' id='btn-executar' type='button' onclick='pegarIdTurmaPerfil($sql_dados_turma[0])'>
                //     <a href='#' class='hover:underline'>Acessar</a>
                // </button>
?>