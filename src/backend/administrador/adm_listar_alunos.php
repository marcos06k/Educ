<?php


$query_aluno = mysqli_query($banco, "select id_aluno, nome, sobrenome, data_nascimento, cpf, email from aluno");
$query_professor  = mysqli_query($banco, "select id_professor, nome, sobrenome, data_nascimento, cpf, email from professor");
$query_administrador = mysqli_query($banco, "select id_administrador, nome, sobrenome, data_nascimento, cpf, email from administrador");

$result_num_rows_aluno = mysqli_num_rows($query_aluno);
$result_num_rows_professor = mysqli_num_rows($query_professor);
$result_num_rows_administrador = mysqli_num_rows($query_administrador);

            for ($i=0; $i < $result_num_rows_aluno; $i++) { 
            $dados_aluno = mysqli_fetch_row($query_aluno);
            echo "<tr class='odd:bg-white even:bg-gray-50 border-b'>
            <th
              scope='row'
              class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'
            >
            $dados_aluno[0]
            </th>
            <td class='px-6 py-4'>$dados_aluno[1]</td>
            <td class='px-6 py-4'>$dados_aluno[4]</td>
            <td class='px-6 py-4'>$dados_aluno[3]</td>
            <td class='px-6 py-4'>$dados_aluno[5]</td>
            <td class='px-6 py-4'>Aluno</td>
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

          for ($i=0; $i < $result_num_rows_professor; $i++) { 
            $dados_professor = mysqli_fetch_row($query_professor);
            echo "<tr class='odd:bg-white even:bg-gray-50 border-b'>
            <th
              scope='row'
              class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'
            >
            $dados_professor[0]
            </th>
            <td class='px-6 py-4'>$dados_professor[1]</td>
            <td class='px-6 py-4'>$dados_professor[4]</td>
            <td class='px-6 py-4'>$dados_professor[3]</td>
            <td class='px-6 py-4'>$dados_professor[5]</td>
            <td class='px-6 py-4'>professor</td>
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

          for ($i=0; $i < $result_num_rows_administrador; $i++) { 
            $dados_administrador = mysqli_fetch_row($query_administrador);
            echo "<tr class='odd:bg-white even:bg-gray-50 border-b'>
            <th
              scope='row'
              class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'
            >
            $dados_administrador[0]
            </th>
            <td class='px-6 py-4'>$dados_administrador[1]</td>
            <td class='px-6 py-4'>$dados_administrador[4]</td>
            <td class='px-6 py-4'>$dados_administrador[3]</td>
            <td class='px-6 py-4'>$dados_administrador[5]</td>
            <td class='px-6 py-4'>Administrador</td>
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
?>