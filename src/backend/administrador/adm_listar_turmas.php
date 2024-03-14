<?php

// Função para listar as turmas na tabela 
function listar_turma($turno, $curso)
{
  if (empty($turno)  || empty($curso)) {
    global $banco;

    $query_turma = mysqli_query($banco, "select id_turma, turno,  curso, data_inicio, data_termino, id_professor, id_administrador from turma");

    $result_num_rows_turma = mysqli_num_rows($query_turma);

    for ($i = 0; $i < $result_num_rows_turma; $i++) {
      $dados_turma = mysqli_fetch_row($query_turma);
      imprimir_turma($dados_turma[0], $dados_turma[1], $dados_turma[2], $dados_turma[3], $dados_turma[4], $dados_turma[5], $dados_turma[6],);
    }
  } else {
    $turno = $_POST['turno'];
    $curso = $_POST['curso'];

    global $banco;
    $query_turma = mysqli_query($banco, "select id_turma, turno,  curso, data_inicio, data_termino, id_professor, id_administrador from turma where turno='$turno' and curso='$curso' ");
    $result_num_rows_turma = mysqli_num_rows($query_turma);
    for ($i = 0; $i < $result_num_rows_turma; $i++) {
      $dados_turma = mysqli_fetch_row($query_turma);
      imprimir_turma($dados_turma[0], $dados_turma[1], $dados_turma[2], $dados_turma[3], $dados_turma[4], $dados_turma[5], $dados_turma[6],);
    }
  }
}

// html que serve como impressão de cada linha. Cada linha da tabela é impressa por esse codigo
function imprimir_turma($id_turma, $turno,  $curso, $data_inicio, $data_termino, $id_professor, $id_administrador)
{
  echo "<tr id='tabela' class='odd:bg-white even:bg-gray-50 border-b'>
              <td id='linha_id_turma' scope='row'class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>
                $id_turma
              </td>
              <td class='px-6 py-4'>$turno</td>
              <td class='px-6 py-4'>$curso</td>
              <td class='px-6 py-4'>$data_inicio</td>
              <td class='px-6 py-4'>$data_termino</td>
              <td class='px-6 py-4'>$id_professor</td>
              <td class='px-6 py-4'>$id_administrador</td>
              <td class='px-6 py-4'>
                <button name='acao' id='btn-executar' type='button' onclick=\"toggleModal('modal-id'), pegarIdTurma_aluno(this) \">
                  <a
                    href='#'
                    class='font-medium text-indigo-800 hover:underline'
                    >Adicionar Aluno</a
                  >
                </button>
              </td>

              <td class='px-6 py-4'>
                <button type='button' onclick=\"toggleModal('modal-id-add'), pegarIdTurma(this)\">
                  <a
                    href='#'
                    class='font-medium text-indigo-800 hover:underline'
                    >Editar</a
                  >
                </button>
              </td>
            </tr>";
}

// Função para listar os alunos na tabela. É exibida quando o adm escolhe a opção adicionar aluno à turma.
function filtrar_aluno($cpf)
{
  global $banco;
  $query_aluno = mysqli_query($banco, "select id_aluno, nome, sobrenome, cpf, email from aluno where cpf='$cpf'");
  $aluno = mysqli_num_rows($query_aluno);

  for ($i = 0; $i < $aluno; $i++) {
    $dados_alunos = mysqli_fetch_row($query_aluno);
    imprimir_aluno($dados_alunos[0], $dados_alunos[1], $dados_alunos[2], $dados_alunos[3], $dados_alunos[4]);
  }
}

// html que serve como impressão de cada linha. Cada linha da tabela é impressa por esse codigo
function imprimir_aluno($id_aluno, $nome, $cpf, $email, $tipo_usuario)
{
  echo "
  <tr class='odd:bg-white even:bg-gray-50 border-b'>
    <td 
      id='linha_id_aluno'
      scope='row'
      class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'
    >
    $id_aluno
    </td>
    <td class='px-6 py-4'>$nome</td>
    <td class='px-6 py-4'>$cpf</td>
    <td class='px-6 py-4'>$email</td>
    <td class='px-6 py-4'> $tipo_usuario</td>
    <td class='px-6 py-4'>
                      <button id='botao_id_aluno_turma' type='button' onclick=\"toggleModal('modal-id')\"> 
                        <a
                          href='#'
                          class='font-medium text-indigo-800 hover:underline'
                          >Adicionar</a
                        >
                      </button>
                    </td>
  </tr>
  
  ";
}


