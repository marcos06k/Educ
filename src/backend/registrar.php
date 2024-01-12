<?php

    include('conexao.php');
    // vira do frontend um dado dizendo qual é o tipo de usuário sendo cadastrado
    $tipo_usuario = $_POST['tipo_usuario'];
    

    switch ($tipo_usuario) {
        case 'administrador':
            registrarAdministrador();
        break;
        case 'professor':
            registrarProfessor();
        break;
        case 'aluno':
            registrarAluno();
        break;
        
        default:
            echo "Não foi possivel localizar qual o tipo de usuário que deseja cadastrar";
            break;
    }

    function registrarAdministrador() {
        include('conexao.php');
       
        
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $sql_cadastrarAdministrador = mysqli_query($banco, "insert into administrador values(null, '$nome', '$sobrenome', '$data_nascimento', '$cpf', '$telefone', '$email', '$senha');");

        if($sql_cadastrarAdministrador) {
            echo "Administrador cadastrado com sucesso!";
        } else {
            echo "Erro no cadastrar administrador".$banco->error;
        }
    }
    function registrarProfessor(){
        include('conexao.php');

        session_start();
        
        $emailAdministrador = $_SESSION['email_administrador'];
        $senhaAdministrador = $_SESSION['senha_administrador'];
        $query_idAdministrador = mysqli_query($banco, "select id_administrador from administrador where email='$emailAdministrador ' and senha='$senhaAdministrador';");
        $idAdministrador = mysqli_fetch_row($query_idAdministrador);

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $nome_mae = $_POST['nome_mae'];
        $nome_pai = $_POST['nome_pai'];
        $num_conta_bancaria = $_POST['num_conta_bancaria'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $sql_cadastrarProfessor = mysqli_query($banco, "insert into professor values(null, '$nome', '$sobrenome', '$data_nascimento', '$cpf', '$telefone', '$nome_mae', '$nome_pai', '$num_conta_bancaria', '$email', '$senha', '$idAdministrador[0]');");

        if($sql_cadastrarProfessor) {
            echo "Professor cadastrado com sucesso!";
        } else {
            echo "Erro no cadastrar professor".$banco->error;
        }
    }

    function registrarAluno(){
        include('conexao.php');

        session_start();
        
        $emailAdministrador = $_SESSION['email_administrador'];
        $senhaAdministrador = $_SESSION['senha_administrador'];
        $query_idAdministrador = mysqli_query($banco, "select id_administrador from administrador where email='$emailAdministrador ' and senha='$senhaAdministrador';");
        $idAdministrador = mysqli_fetch_row($query_idAdministrador);

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $nome_mae = $_POST['nome_mae'];
        $nome_pai = $_POST['nome_pai'];
        $dados_pagamento = $_POST['dados_pagamento'];
        $cpf_responsavel_financeiro = $_POST['cpf_reponsavel_financeiro'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $sql_cadastrarAluno = mysqli_query($banco, "insert into aluno values(null, '$nome', '$sobrenome', '$data_nascimento', '$cpf', '$telefone', '$nome_mae', '$nome_pai', '$dados_pagamento', '$cpf_responsavel_financeiro', '$email', '$senha', $idAdministrador[0]);");

        if($sql_cadastrarAluno) {
            echo "Aluno cadastrado com sucesso!";
        } else {
            echo "Erro no cadastrar aluno".$banco->error;
        }
    }
    
?>