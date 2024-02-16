<?php
function listar_turma($turno, $curso) {
    if ( empty($turno)  || empty($curso) ) {
      global $banco;
      
      $query_turma = mysqli_query($banco, "select id_turma, turno,  curso, data_inicio, data_termino, id_professor, id_administrador from turma");

      $result_num_rows_turma = mysqli_num_rows($query_turma);
      
      for($i=0; $i < $result_num_rows_turma; $i++){
        $dados_turma = mysqli_fetch_row($query_turma);
        imprimir_turma($dados_turma[0], $dados_turma[1], $dados_turma[2], $dados_turma[3], $dados_turma[4], $dados_turma[5], $dados_turma[6],);
      }
    } else {
        $turno = $_POST['turno'];
        $curso = $_POST['curso'];

        global $banco;
        $query_turma = mysqli_query($banco, "select id_turma, turno,  curso, data_inicio, data_termino, id_professor, id_administrador from turma where turno='$turno' and curso='$curso' ");
        $result_num_rows_turma = mysqli_num_rows($query_turma);
        for($i=0; $i < $result_num_rows_turma; $i++){
        $dados_turma = mysqli_fetch_row($query_turma);
        imprimir_turma($dados_turma[0], $dados_turma[1], $dados_turma[2], $dados_turma[3], $dados_turma[4], $dados_turma[5], $dados_turma[6],);
      }
    }
  } 

  function imprimir_turma($id_turma, $turno,  $curso, $data_inicio, $data_termino, $id_professor, $id_administrador) {
   echo "<tr class='odd:bg-white even:bg-gray-50 border-b'>
              <th
                scope='row'
                class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'
              >
              $id_turma
              </th>
              <td class='px-6 py-4'>$turno</td>
              <td class='px-6 py-4'>$curso</td>
              <td class='px-6 py-4'>$data_inicio</td>
              <td class='px-6 py-4'>$data_termino</td>
              <td class='px-6 py-4'>$id_professor</td>
              <td class='px-6 py-4'>$id_administrador</td>
              <td class='px-6 py-4'>
                <button type='button' onclick=\"toggleModal('modal-id')\">
                  <a
                    href='#'
                    class='font-medium text-indigo-800 hover:underline'
                    >Adicionar Aluno</a
                  >
                </button>
              </td>
              <td class='px-6 py-4'>
                <button type='button' onclick=\"toggleModal('modal-id-add')\">
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