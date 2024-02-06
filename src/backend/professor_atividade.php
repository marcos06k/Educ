<?php
include('../conexao.php');
$id_aula = $_POST['id_aula'];
$nome = $_POST['nome'];
$peso = $_POST['peso'];
$consulta = $_POST['consulta'];
$entregavel = $_POST['entregavel'];
$prazo_entrega = $_POST['prazo_entrega'];
$coletiva = $_POST['coletiva'];


//verifica se a vinda do metodo for post 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar se o campo 'arquivo' foi enviado
    if (isset($_FILES['arquivo'])) {

        //pegando o caminho do arquivo
        $file = $_FILES['arquivo'];

        // Verifica se não houve erro durante o upload
        if ($file["error"] === UPLOAD_ERR_OK) {

            // Diretório da nova pasta que o arquivo será redirecionado/salvo
            $pastaDir = 'files/conteudo_assincrono/';  
            $uploadPath = $pastaDir . basename($file["name"]);

            // Move o arquivo para a pasta do destino e faz o upload do caminho do diretório para o BD
            if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                echo "Arquivo enviado com sucesso. <br>";

                // Encontra o arquivo na pasta 'files/atividades'
                $arquivo_pasta = $pastaDir.$file["name"];
                echo 'Esse é o arquivo na pasta files/atividades --> ' . $arquivo_pasta ."<br>";
                $query_upload_url = mysqli_query($banco, "insert into atividade values(null, '$arquivo_pasta', '$peso', '$consulta', '$entregavel', '$prazo_entrega', '$coletiva', '$nome');");
                if($query_upload_url){
                    echo "Atividade registrada com sucesso!";
                    // pegar o id da atividade inserida no banco 
                    $id_atividade = $banco->insert_id;
                    $query_aula_atividade = mysqli_query($banco, "insert into aula_atividade values(null, '$id_aula','$id_atividade');");
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