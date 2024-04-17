<?php

function listarConteudos() {    
    // Conexao BD
    $banco = mysqli_connect('localhost','root','', 'educ');
    
    // id da Aula vindo da pagina aula
    $idAula = $_POST['idAula'];

    // Codigo sql para a query
    $sql = "SELECT 
                cnt_assin.id_conteudo_assincrono,
                cnt_assin.arquivo_blob,
                cnt_assin.nome
                FROM conteudo_assincrono cnt_assin
                INNER JOIN aula aul ON cnt_assin.id_aula = aul.id_aula
            WHERE aul.id_aula='$idAula' ";

    // Query no BD (Conexao com o banco, codigo sql) 
    $sql_query = mysqli_query($banco, $sql);

    // Pegando o numero de linhas que ele achou na tabela
    $sql_num_rows = mysqli_num_rows($sql_query);

    // for para imprimir cada linha que ele encontrou
    for ($i=0; $i < $sql_num_rows ; $i++) { 
        // pegando o valor da linha. Guarda os valores das colunas em um array
        $result_query = mysqli_fetch_row($sql_query);
        echo "
        <div class='flex border border-roxo-claro justify-center items-center w-[400px] h-2/6 rounded-2xl hover:bg-violet-50'>
            <div class='flex flex-col w-3/4 gap-5'>
                <div>
                    <h1 class='font-bold text-2xl'>$result_query[2]</h1>
                    <p class='text-sm'>Conteudo</p>
                </div>
            </div>
            <div class='flex flex-col item-center justify-center'>
                <form action='editarConteudo.php' method='post' >
                    <input id='idConteudo' type='text' value=$result_query[0] name='idConteudo' style='display: none;'>
                    <input type='submit' value='Editar' class='mb-1.5'> 
                </form>
                                
                <form action='../../backend/professor/prof_deletar_conteudo.php' method='post' >
                    <input id='idConteudo' type='text' value=$result_query[0] name='idConteudo' style='display: none;'>
                    <input type='submit' value='Deletar' class='mb-1.5'> 
                </form>
            </div>
        </div>
    ";
        
    }
}

function listarAtividades(){
    // Conexao BD
    $banco = mysqli_connect('localhost','root','', 'educ');
    
    // id da Aula vindo da pagina aula
    $idAula = $_POST['idAula'];

    // Codigo sql para a query
    $sql = "SELECT 
                atv.id_atividade,
                atv.arquivo_blob,
                atv.nome, 
                atv.prazo_entrega
                FROM atividade atv
                INNER JOIN aula aul ON atv.id_aula = aul.id_aula
            WHERE aul.id_aula='$idAula' ";

    // Query no BD (Conexao com o banco, codigo sql) 
    $sql_query = mysqli_query($banco, $sql);

    // Pegando o numero de linhas que ele achou na tabela
    $sql_num_rows = mysqli_num_rows($sql_query);

    // for para imprimir cada linha que ele encontrou
    for ($i=0; $i < $sql_num_rows ; $i++) { 
        // pegando o valor da linha. Guarda os valores das colunas em um array
        $result_query = mysqli_fetch_row($sql_query);
        echo "
        <div class='flex border border-roxo-claro justify-center items-center w-[400px] h-2/6 rounded-2xl hover:bg-violet-50  '>
            <div class='flex flex-col w-3/4 gap-5'>
                <div>
                    <h1 class='font-bold text-2xl'>$result_query[2]</h1>
                    <p class='text-sm'>Atividade </p>
                </div>
                <div class='text-sm'>
                    <p>Prazo: $result_query[3]</p>
                </div>
            </div>
            <div class='flex flex-col item-center justify-center'>
                <form action='editarAtividade.php' method='post' >
                    <input id='idAtividade' type='text' value=$result_query[0] name='idAtividade' style='display: none;'>
                    <input type='submit' value='Editar' class='mb-1.5'> 
                </form>
                                
                <form action='../../backend/professor/prof_deletar_atividade.php' method='post' >
                    <input id='idAtividade' type='text' value=$result_query[0] name='idAtividade' style='display: none;'>
                    <input type='submit' value='Deletar' class='mb-1.5'> 
                </form>
            </div>
        </div>
        ";
    }
}
?>