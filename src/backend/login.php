<?php
    // Realizando a conexão com o banco de dados.
    include('conexao.php');


    // Recebendo os valores digitados dos campos email e senha da pagina de login.
    $email_input = $_POST["input_email"];
    $senha_input = $_POST["input_senha"];

    

    $administrador_dadosLoginBd = mysqli_query($banco, "select email, senha from administrador where email='$email_input';");
    $administrador_dados = mysqli_fetch_row($administrador_dadosLoginBd);
    if(isset($administrador_dados)){
        // Chama o metodo preenchendo os parâmetros.
        verficarLogin($email_input, $senha_input, $administrador_dados[0], $administrador_dados[1], 'administrador');
        
    }



    $professor_dadosLoginBd = mysqli_query($banco, "select email, senha from professor where email='$email_input';");
    $professor_dados = mysqli_fetch_row($professor_dadosLoginBd);
    if(isset($professor_dados)){
         // Chama o metodo preenchendo os parâmetros.
        verficarLogin($email_input, $senha_input, $professor_dados[0], $professor_dados[1], 'professor');
    }



    $aluno_dadosLoginBd = mysqli_query($banco, "select email, senha from aluno where email='$email_input';");
    $aluno_dados = mysqli_fetch_row($aluno_dadosLoginBd);
    if(isset($aluno_dados)){
        // Chama o metodo preenchendo os parâmetros.
        verficarLogin($email_input, $senha_input, $aluno_dados[0], $aluno_dados[1], 'aluno');
    }

    //se nao achar nenhum usuario com o email e senha, ele diz que o usuario errou algum dado
    if(empty($administrador_dados) && empty($aluno_dados) && empty($professor_dados)){
        echo "Você errou algum dado";
    }
    

    // Função para verificar qual o tipo do usuário e registrar qual o tipo de usuario logado na plataforma.
    function verficarLogin($email_input, $senha_input, $email_bd, $senha_bd, $tipo_usuario){
        if($email_input == $email_bd && password_verify($senha_input, $senha_bd)){
            if ($tipo_usuario == 'administrador'){
                session_start();
                $_SESSION['email_administrador'] = $email_bd;
                $_SESSION['senha_administrador'] = $senha_bd;
                header("Location: ../frontend/adm/adm.html");
            }
            else if ($tipo_usuario == 'professor'){
                session_start();
                $_SESSION['email_professor'] = $email_bd;
                $_SESSION['senha_professor'] = $senha_bd;
                header("Location: ../frontend/aluno-professor/main.html");
            } 
            else if ($tipo_usuario == 'aluno'){
                session_start();
                $_SESSION['email_aluno'] = $email_bd;
                $_SESSION['senha_aluno'] = $senha_bd;
                header("Location: ../frontend/aluno-professor/main.html");
            } 
        } else {
            echo "errou a senha";
        }
    }
    
?>