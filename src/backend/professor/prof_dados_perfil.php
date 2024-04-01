<?php

session_start();
$email_professor = $_SESSION['email_professor'];
$senha_professor = $_SESSION['senha_professor'];

function prof_dados_perfil(){
    global $banco;
    global $email_professor;
    global $senha_professor;

    // Query para pegar os dados desejados do usuário logado
    $sql_query_dados_professor = mysqli_query($banco, "SELECT id_professor, nome FROM professor WHERE email='$email_professor' AND senha='$senha_professor';");
    $sql_dados_professor = mysqli_fetch_row($sql_query_dados_professor);

    // Query para percorrer a lista de turmas e pegar a quantidade de turmas que o professor está registrado

    $sql_turma = "SELECT 
                        tm.curso
                    FROM turma tm 
                        INNER JOIN professor pf on tm.id_professor = pf.id_professor
                    WHERE pf.id_professor='$sql_dados_professor[0]';
    ";

    $sql_query_turma = mysqli_query($banco, $sql_turma );
    // Pegando o total de linhas que a resultou da query
    $sql_result_num_rows_turma = mysqli_num_rows($sql_query_turma);
    
    


    echo "<div class='flex flex-col items-center bg-white h-3/4 w-3/12 2xl:h-96 2xl:w-1/4 rounded-3xl shadow-md'>
                <div class='h-2/6 w-full bg-gradient-to-l from-purple-900 to-violet-700 rounded-t-3xl'></div>
                <img src='../../../../assets/user.png' class='size-40 2xl:size-32 mt-[-85px] drop-shadow-md' alt=''>
                <div class='w-full flex flex-col items-center mt-4'>
                    <h1 class='font-semibold text-lg'>$sql_dados_professor[1]</h1>
                    <p class='text-gray-500'>Professor</p>
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
?>