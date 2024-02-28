<?php

function atualizar_dados_usuario($confirmar_tipo_usuario, $confirmar_id, $novo_nome, $novo_sobrenome, $novo_cpf, $novo_telefone, $nova_data_nascimento, $novo_email, $nova_senha){
    global $banco;

     // verificar qual é o tipo de tabela no banco de dados que tera que pegar os valores do usuário através da confirmação do tipo do usuário
     
        // Encontrar o usuário através da confirmação do id 
        $tabela = $confirmar_tipo_usuario; //Diz qual a tabela no banco de dados que será encontrado o usuário
        $coluna_id_usuario = "id_$confirmar_tipo_usuario"; //Pega o nome da coluna id da tabela através de uma concatenação com o tipo do 
                                                            //usuário (id_aluno, id_professor e id_administrador são as colunas existentes de cada tipo de usuário no BD)
        $sql_query_aluno = mysqli_query($banco, "SELECT email ,senha FROM $tabela WHERE $coluna_id_usuario='$confirmar_id';");
        $dados_aluno_BD = mysqli_fetch_row($sql_query_aluno);

        
        $novo_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        $sql = "UPDATE $confirmar_tipo_usuario SET nome='$novo_nome', sobrenome='$novo_sobrenome', data_nascimento='$nova_data_nascimento', 
        cpf='$novo_cpf', telefone='$novo_telefone', email='$novo_email', senha='$novo_senha_hash' WHERE email='$dados_aluno_BD[0]' AND senha='$dados_aluno_BD[1]'; ";

        $sql_query = mysqli_query($banco, $sql);
    
}



?>