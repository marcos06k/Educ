<?php

function listarAulasTurma()
{
    global $banco;
    $idTurma = $_POST['inputIdTurma'];

    $sql = "SELECT 
                aul.id_aula
                FROM aula aul
                INNER JOIN turma_aluno_aula trm_aln_aul ON aul.id_aula = trm_aln_aul.id_aula
                INNER JOIN turma_aluno trm_aln ON trm_aln_aul.id_turma_aluno = trm_aln.id_turma_aluno
                INNER JOIN turma trm ON trm_aln.id_turma = trm.id_turma
            WHERE trm.id_turma='$idTurma'";

    $sql_query = mysqli_query($banco, $sql);

    for ($i=0; $i < mysqli_num_rows($sql_query); $i++) { 
        $result_query = mysqli_fetch_row($sql_query);

        echo "<a href='' class='flex border border-roxo-claro justify-center items-center w-[400px] h-1/4 rounded-2xl hover:bg-violet-50'>
                <div class=' w-3/4'>
                    <h1 class='font-bold text-2xl'> $result_query[0] </h1>
                    <div class='text-sm'>
                        <p>$result_query[2]</p>
                        <p>$result_query[1]</p>
                    </div>
                </div>
                <div class='flex item-center justify-center'>
                    <span class='material-symbols-outlined text-2xl'>arrow_right_alt</span>
                </div>
            </a>";
    }
    
}

function listarEntregasTurma()
{
    $id_turma = $_POST['idTurmaPerfil'];
    echo $id_turma;
}


