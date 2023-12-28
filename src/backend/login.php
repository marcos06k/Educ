<?php
    // Realizando a conexão com o banco de dados.
    include('conexao.php');

    // Recebendo os valores digitados dos campos email e senha da pagina de login.
    $email_input = $_POST["input_email"];
    $senha_input = $_POST["input_senha"];


    // Query para selecionar o email e senha no BD (somente se o email e a senha forem iguais aos digitados na pagina de login).
    $administrador_dadosLoginBd = mysqli_query($banco, "select email, senha from administrador where email='$email_input' and senha='$senha_input';");
    // Método para resgatar o valor email e senha no BD que a query selecionou (caso a condição de cima der true).
    // Como é mais de um  valor vindo da query, ele resgata os valores em um array
    $administrador_dados = mysqli_fetch_row($administrador_dadosLoginBd);
    // Método para verificar se a variável está vazia.
    // Caso a variável esteja vazia, resulta que os dados (email e senha) preenchidos pelo usuário
    // nao condiz com nenhum dos dados dos usuários cadastrados como administradores.
    if($administrador_dados){
        // Chama o metodo preenchendo os parâmetros.
        verficarLogin($email_input, $senha_input, $administrador_dados[0], $administrador_dados[1], 'administrador');
    }



    // Query para selecionar o email e senha no BD (somente se o email e a senha forem iguais aos digitados na página de login).
    $professor_dadosLoginBd = mysqli_query($banco, "select email, senha from professor where email='$email_input' and senha='$senha_input';");
    // Método para resgatar o valor email e senha no BD que a query selecionou (caso a condição de cima der true).
    // Como é mais de um  valor vindo da query, ele resgata os valores em um array
    $professor_dados = mysqli_fetch_row($professor_dadosLoginBd);
    // Método para verificar se a variável está vazia.
    // Caso a variável esteja vazia, resulta que os dados (email e senha) preenchidos pelo usuário
    // nao condiz com nenhum dos dados dos usuários cadastrados como administradores.
    if($professor_dados){
         // Chama o metodo preenchendo os parâmetros.
        verficarLogin($email_input, $senha_input, $professor_dados[0], $professor_dados[1], 'professor');
    }



    // Query para selecionar o email e senha no BD (somente se o email e a senha forem iguais aos digitados na página de login).
    $aluno_dadosLoginBd = mysqli_query($banco, "select email, senha from aluno where email='$email_input' and senha='$senha_input';");
    // Método para resgatar o valor email e senha no BD que a query selecionou (caso a condição de cima der true).
    // Como é mais de um  valor vindo da query, ele resgata os valores em um array
    $aluno_dados = mysqli_fetch_row($aluno_dadosLoginBd);
    // Método para verificar se a variável está vazia.
    // Caso a variável esteja vazia, resulta que os dados (email e senha) preenchidos pelo usuário
    // nao condiz com nenhum dos dados dos usuários cadastrados como administradores.
    if($aluno_dados){
        // Chama o metodo preenchendo os parâmetros.
        verficarLogin($email_input, $senha_input, $aluno_dados[0], $aluno_dados[1], 'aluno');
    }

    

    // Função para verificar qual o tipo do usuário e registrar qual o tipo de usuario logado na plataforma.
    // os Param. Entra. '$email_input' e '$senha_input' são os valores que o usuario está inserindo na página de login .
    // os Param. Entra. '$email_bd' e '$senha_bd' são os valores que a query está encontrando no banco de dados.
    // o Param. Entra. '$tipo_usuario' é o tipo de usuário que está logando na plataforma.
    function verficarLogin($email_input, $senha_input, $email_bd, $senha_bd, $tipo_usuario){
        // verifica se o email e senha inserido pelo usuário é igual o email e senha encontrado pelo query.
        if($email_input == $email_bd && $senha_input == $senha_bd){
            // se o usuário for um administrador, ele guarda em uma section que ele é o administrador
            if ($tipo_usuario == 'administrador'){
                $_SESSION['login_administrador'] = [$email_bd, $senha_bd];
                echo "email: $email_bd<br> senha: $senha_bd";
            }
            // se o usuário for um professor, ele guarda em uma section que ele é o professor 
            else if ($tipo_usuario == 'professor'){
                $_SESSION['login_professor'] = [$email_bd, $senha_bd];
                echo "email: $email_bd<br> senha: $senha_bd";
            } 
            // se o usuário for um aluno, ele guarda em uma section que ele é o aluno
            else if ($tipo_usuario == 'aluno'){
                $_SESSION['login_aluno'] = [$email_bd, $senha_bd];
                echo "email: $email_bd<br> senha: $senha_bd";
            } 
        }
    }

?>