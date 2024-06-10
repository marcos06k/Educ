<?php

session_start();

include('../conexao.php');

$id_aula = $_POST['idAula'];
$nome = $_POST['nome'];
$id_atividade = $_POST['idAtividade'];

$email_aluno = $_SESSION['email_aluno'];
$senha_aluno = $_SESSION['senha_aluno'];

// pegar o nome e sobrenome do aluno 
$query_id_aluno = mysqli_query($banco, "select nome, sobrenome from aluno where email='$email_aluno' and senha='$senha_aluno';");
$nomeSobrenome_aluno = mysqli_fetch_row($query_id_aluno);


//verifica se a vinda do metodo for post 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar se o campo 'arquivo' foi enviado
    if (isset($_FILES['arquivo'])) {

        //pegando o caminho do arquivo
        $file = $_FILES['arquivo'];

        // Verifica se não houve erro durante o upload
        if ($file["error"] === UPLOAD_ERR_OK) {

            // Diretório da nova pasta que o arquivo será redirecionado/salvo
            $pastaDir = '../../files/atividades_entrega/';  
            $uploadPath = $pastaDir . basename($file["name"]);

            // Move o arquivo para a pasta do destino e faz o upload do caminho do diretório para o BD
            if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                echo "Arquivo enviado com sucesso. <br>";

                // Encontra o arquivo na pasta 'files/atividades'
                $arquivo_pasta = $pastaDir.$file["name"];
                echo 'Esse é o arquivo na pasta files/atividades_entrega --> ' . $arquivo_pasta ."<br>";
                
                $query_upload_url = mysqli_query($banco, "insert into atividade_entrega values (null, '$nomeSobrenome_aluno[0]', '$nomeSobrenome_aluno[1]', now(), '$arquivo_pasta','$nome', null, '$id_aula', '$id_atividade');");
                if($query_upload_url){
                    echo "Atividade registrada com sucesso!";
                    
                } else {
                    echo "Erro: ".mysqli_error($banco);
                }
            } else {
                echo "Falha ao mover o arquivo para a pasta de destino ou Falha ao fazer o upload para o banco de dados.";
            }
        } else {
            echo "Erro durante o upload do arquivo.";
        }
    } else {
        echo "Erro: Nenhum arquivo foi enviado.";
    }
} else {
    echo "Erro: Método de requisição inválido.";
}
?>