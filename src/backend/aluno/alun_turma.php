<?php

function listarAulasTurma()
{
    $banco = mysqli_connect('localhost','root','', 'educ');
    $idTurma = $_POST['inputIdTurma'];

    $sql = "SELECT DISTINCT
                aul.id_aula,
                aul.nome,
                aul.data_aula,
                aul.presencial
                FROM aula aul
                INNER JOIN turma_aluno_aula taa ON aul.id_aula = taa.id_aula
                INNER JOIN turma_aluno ta ON taa.id_turma_aluno = ta.id_turma_aluno
                INNER JOIN turma tr ON ta.id_turma = tr.id_turma
            WHERE tr.id_turma='$idTurma'";

    $sql_query = mysqli_query($banco, $sql);

    
    $sql_num_rows = mysqli_num_rows($sql_query);
    for ($i=0; $i < $sql_num_rows ; $i++) { 
        $result_query = mysqli_fetch_row($sql_query);

        $resposta_presencial = $result_query[3] == 'sim' ? "Presencial" : "Assincrono";
        echo "<form action='aula.php' method='post' class='flex border border-roxo-claro justify-center items-center w-[400px] h-1/4 rounded-2xl hover:bg-violet-50'>
                <input id='idAula' type='text' value='$result_query[0]' name='idAula' style='display: none;'>
                
                <div class=' w-3/4'>
                    <h1 class='font-bold text-2xl'> $result_query[1] </h1>
                    <div class='text-sm'>
                        <p>$resposta_presencial </p>
                        <p>$result_query[2]</p>
                    </div>
                </div>
                <div class='flex item-center justify-center'>
                    <input type='submit' value='entrar'>
                </div>
            </form>";
        
    }
    
}

/* TODO ATIVIDADES FRONT */
function listarEntregasTurma()
{
    
}


