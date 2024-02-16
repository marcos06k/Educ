<?php

function listar_usuarios($tipo_usuario,  $cpf)
{

  // realizar a listagem sem filtro (listando todos os usuarios do sistema)
  if (empty($tipo_usuario)  || empty($cpf) ) {
    global $banco;

    $query_aluno = mysqli_query($banco, "select id_aluno, nome, data_nascimento, cpf, email, telefone from aluno");
    $query_professor  = mysqli_query($banco, "select id_professor, nome, data_nascimento, cpf, email, telefone from professor");
    $query_administrador = mysqli_query($banco, "select id_administrador, nome, data_nascimento, cpf, email, telefone from administrador");

    $result_num_rows_aluno = mysqli_num_rows($query_aluno);
    $result_num_rows_professor = mysqli_num_rows($query_professor);
    $result_num_rows_administrador = mysqli_num_rows($query_administrador);

    for ($i = 0; $i < $result_num_rows_aluno; $i++) {
      $dados_aluno = mysqli_fetch_row($query_aluno);
      imprimir_usuarios($dados_aluno[0], $dados_aluno[1], $dados_aluno[2], $dados_aluno[3], $dados_aluno[4], $dados_aluno[5], 'Aluno');
    }
    for ($i = 0; $i < $result_num_rows_professor; $i++) {
      $dados_professor = mysqli_fetch_row($query_professor);
      imprimir_usuarios($dados_professor[0], $dados_professor[1], $dados_professor[2], $dados_professor[3], $dados_professor[4], $dados_professor[5], 'Professor');
    }
    for ($i = 0; $i < $result_num_rows_administrador; $i++) {
      $dados_administrador = mysqli_fetch_row($query_administrador);
      imprimir_usuarios($dados_administrador[0], $dados_administrador[1], $dados_administrador[2], $dados_administrador[3], $dados_administrador[4], $dados_administrador[5], 'Administrador');
    }
  } else 
    // realizar a listagem com filtro (listando um usuário em especifico conforme os dados inseridos no filtro)
    if ($tipo_usuario == 'option_aluno') {
      
      $cpf = $_POST['cpf'];
      

      global $banco;
      $query_aluno = mysqli_query($banco, "select id_aluno, nome, sobrenome, data_nascimento, cpf, email from aluno where  cpf='$cpf' ");
      $result_num_rows_aluno = mysqli_num_rows($query_aluno);
      for ($i = 0; $i < $result_num_rows_aluno; $i++) {
        $dados_aluno = mysqli_fetch_row($query_aluno);
        imprimir_usuarios($dados_aluno[0], $dados_aluno[1], $dados_aluno[2], $dados_aluno[3], $dados_aluno[4], $dados_aluno[5], 'Aluno');
      }
    } else if ($tipo_usuario == 'option_professor') {
      
      $cpf = $_POST['cpf'];
      

      global $banco;
      $query_professor  = mysqli_query($banco, "select id_professor, nome, sobrenome, data_nascimento, cpf, email from professor where cpf='$cpf' ;");
      $result_num_rows_professor = mysqli_num_rows($query_professor);
      for ($i = 0; $i < $result_num_rows_professor; $i++) {
        $dados_professor = mysqli_fetch_row($query_professor);
        imprimir_usuarios($dados_professor[0], $dados_professor[1], $dados_professor[2], $dados_professor[3], $dados_professor[4], $dados_professor[5], 'Professor');
      }
    } else if ($tipo_usuario == 'option_administrador') {
      
      $cpf = $_POST['cpf'];
      

      global $banco;
      $query_administrador = mysqli_query($banco, "select id_administrador, nome, sobrenome, data_nascimento, cpf, email from administrador where and cpf='$cpf' ;");
      $result_num_rows_administrador = mysqli_num_rows($query_administrador);
      for ($i = 0; $i < $result_num_rows_administrador; $i++) {
        $dados_administrador = mysqli_fetch_row($query_administrador);
        imprimir_usuarios($dados_administrador[0], $dados_administrador[1], $dados_administrador[2], $dados_administrador[3], $dados_administrador[4], $dados_administrador[5], 'Administrador');
      }
    
  }
}

function imprimir_usuarios($id, $nome, $nascimento, $cpf, $email, $telefone, $tipo_usuario)
{
  echo "<tr class='odd:bg-white even:bg-gray-50 border-b'>
          <th
            scope='row'
            class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'
          >
          $id
          </th>
          <td class='px-6 py-4'>$nome</td>
          <td class='px-6 py-4'>$cpf</td>
          <td class='px-6 py-4'>$nascimento</td>
          <td class='px-6 py-4'>$email</td>
          <td class='px-6 py-4'>$telefone</td>
          <td class='px-6 py-4'>$tipo_usuario</td>
          <td class='px-6 py-4'>
            <button type='button' onclick='toggleModal('modal-id')'>
              <a
                href='#'
                class='font-medium text-indigo-800 hover:underline'
                >Editar</a
              >
            </button>
          </td>
        </tr>";
}
