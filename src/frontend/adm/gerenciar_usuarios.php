<?php
  
  include("../../backend/conexao.php");
        
  function listar_Usuarios() {

  // realizar a listagem sem filtro (listando todos os usuarios do sistema)
  if(empty($_POST['tipo_usuario']) || empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['email'])){
  global $banco;
  
  $query_aluno = mysqli_query($banco, "select id_aluno, nome, data_nascimento, cpf, email, telefone from aluno");
  $query_professor  = mysqli_query($banco, "select id_professor, nome, data_nascimento, cpf, email, telefone from professor");
  $query_administrador = mysqli_query($banco, "select id_administrador, nome, data_nascimento, cpf, email, telefone from administrador");

  $result_num_rows_aluno = mysqli_num_rows($query_aluno);
  $result_num_rows_professor = mysqli_num_rows($query_professor);
  $result_num_rows_administrador = mysqli_num_rows($query_administrador);
  
  for ($i=0; $i < $result_num_rows_aluno; $i++) {
      $dados_aluno = mysqli_fetch_row($query_aluno);
      imprimir_usuarios($dados_aluno[0], $dados_aluno[1], $dados_aluno[2], $dados_aluno[3], $dados_aluno[4], $dados_aluno[5], 'Aluno');
  }
  for ($i=0; $i < $result_num_rows_professor; $i++) {
    $dados_professor = mysqli_fetch_row($query_professor);
    imprimir_usuarios($dados_professor[0], $dados_professor[1], $dados_professor[2], $dados_professor[3], $dados_professor[4], $dados_professor[5], 'Professor');
  }
  for ($i=0; $i < $result_num_rows_administrador; $i++) {
    $dados_administrador = mysqli_fetch_row($query_administrador);
    imprimir_usuarios($dados_administrador[0], $dados_administrador[1], $dados_administrador[2], $dados_administrador[3], $dados_administrador[4], $dados_administrador[5], 'Administrador');
}
  } else {
    // realizar a listagem com filtro (listando um usuário em especifico conforme os dados inseridos no filtro)
    if($_POST['tipo_usuario'] == 'option_aluno'){
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];
      
      global $banco;
      $query_aluno = mysqli_query($banco, "select id_aluno, nome, sobrenome, data_nascimento, cpf, email from aluno where nome='$nome' and cpf='$cpf' and email='$email'; ");
      $result_num_rows_aluno = mysqli_num_rows($query_aluno);
      for ($i=0; $i < $result_num_rows_aluno; $i++) { 
        $dados_aluno = mysqli_fetch_row($query_aluno);
        imprimir_usuarios($dados_aluno[0], $dados_aluno[1], $dados_aluno[2], $dados_aluno[3], $dados_aluno[4],$dados_aluno[5], 'Aluno');
      }

    } else if ($_POST['tipo_usuario'] == 'option_professor') {
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];
      
      global $banco;
      $query_professor  = mysqli_query($banco, "select id_professor, nome, sobrenome, data_nascimento, cpf, email from professor where nome='$nome' and cpf='$cpf' and email='$email';");
      $result_num_rows_professor = mysqli_num_rows($query_professor);
      for ($i=0; $i < $result_num_rows_professor; $i++) { 
        $dados_professor = mysqli_fetch_row($query_professor);
        imprimir_usuarios($dados_professor[0], $dados_professor[1], $dados_professor[2], $dados_professor[3], $dados_professor[4],$dados_professor[5], 'Professor');
      }
    } else if($_POST['tipo_usuario'] == 'option_administrador'){
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];

      global $banco;
      $query_administrador = mysqli_query($banco, "select id_administrador, nome, sobrenome, data_nascimento, cpf, email from administrador where nome='$nome' and cpf='$cpf' and email='$email';");
      $result_num_rows_administrador = mysqli_num_rows($query_administrador);
      for ($i=0; $i < $result_num_rows_administrador; $i++) { 
        $dados_administrador = mysqli_fetch_row($query_administrador);
        imprimir_usuarios($dados_administrador[0], $dados_administrador[1], $dados_administrador[2], $dados_administrador[3], $dados_administrador[4],$dados_administrador[5], 'Administrador');
      }
  
    }
    
  }
  
}

function imprimir_usuarios($id, $nome, $nascimento, $cpf, $email, $telefone, $tipo_usuario) {
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../../../scripts/tailwindcfg.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <script src="../../../scripts/modalDialog.js"></script>
</head>

<body class="bg-fundo-claro h-screen font-montserrat">
  <header class="bg-white shadow-sm w-full h-20 flex justify-between items-center px-10">
    <a href="adm.html"><img src="../../../assets/Group 3-PhotoRoom.png-PhotoRoom.png" alt="Logo EDUQ" class="h-36" /></a>
    <div class="flex items-center gap-8">
      <div class="flex items-center gap-2">
        <img src="../../../assets/user.png" alt="Foto perfil" class="h-8" />
        <h1 class="font-bold text-gray-700 antialiased">Administrador 01</h1>
      </div>
      <a href="#" class="bg-roxo-claro text-white py-3 px-6 rounded-md font-bold cursor-pointer hover:bg-purple-950">LOG OUT</a>
    </div>
  </header>
  <menu class="gap-2 bg-white shadow-sm w-full h-20 flex items-center px-10 mb-12">
    <span class="material-symbols-outlined text-3xl text-gray-300">home</span>
    <h1 class="text-sm font-bold text-gray-300">Menu Principal</h1>
    <p class="text-gray-300 text-bold">></p>
    <span class="material-symbols-outlined text-3xl text-gray-700">manage_accounts</span>
    <h1 class="text-sm font-bold text-gray-700">Gerenciar Usuários</h1>
  </menu>
  <main class="flex justify-center h-3/4 2xl:h-4/6 gap-10">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Nome</th>
            <th scope="col" class="px-6 py-3">CPF</th>
            <th scope="col" class="px-6 py-3">Data de Nascimento</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Telefone</th>
            <th scope="col" class="px-6 py-3">Tipo-Usuário</th>
            <th scope="col" class="px-6 py-3">Gerenciar</th>
          </tr>
        </thead>
        <tbody>

          <?php
           listar_alunos();
          ?>

        </tbody>
      </table>
    </div>

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
      <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
            <h3 class="text-xl font-semibold">
              Editar Usuário
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
              <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div class="flex flex-col p-6 gap-6">

            <input class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="Novo Nome">

            <input class="bg-fundo-claro focus:outline-none p-2" type="number" placeholder="Novo CPF">

            <input class="bg-fundo-claro focus:outline-none p-2 text-gray-400" type="date" placeholder="Novo Data de Nascimento">

            <input class="bg-fundo-claro focus:outline-none p-2" type="email" placeholder="Novo Email">

            <input class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="Novo Tipo-Usuário">
          </div>
          <!--footer-->
          <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
            <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:underline" type="button" onclick="toggleModal('modal-id')">
              Fechar
            </button>
            <button class="bg-violet-500 text-white active:bg-violet-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:bg-violet-700" type="button" onclick="toggleModal('modal-id')">
              Salvar
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

    <div class="flex flex-col gap-6">
      <a href="escolher_usuario.html" class="flex gap-2 items-center bg-roxo-claro text-white h-20 px-10 rounded-lg cursor-pointer hover:bg-purple-950 2xl:h-16 2xl:px-6">Registrar Usuários<span class="material-symbols-outlined">
          add_circle
        </span></a>
      <div class="flex flex-col w-full font-montserrat text-gray-700 shadow-md rounded-md p-4 gap-4 bg-gray-50">
        <h1 class="text-md font-montserrat font-bold flex items-center gap-2"><span class="material-symbols-outlined">sort</span> Filtrar por:</h1>
        
          <form action="gerenciar_usuarios.php" class="flex flex-col gap-2" method="post">
             <select name="tipo_usuario" class=" text-gray-400 h-8 rounded-sm px-2 text-sm  focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro">
              <option disabled selected class="text-gray-700 border-gray-400 focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro" value="">
                TIPO-USUÁRIO
              </option>
              <option class="text-gray-700" value="option_aluno">Aluno</option>
              <option class="text-gray-700" value="option_professor">Professor</option>
              <option class="text-gray-700" value="option_administrador">Administrador</option>
            </select>
            <input name="nome" placeholder="NOME" class=" h-8 rounded-sm px-2 text-sm focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro" type="text" />
            <input name="cpf" placeholder="CPF" class=" h-8 rounded-sm px-2 text-sm  focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro" type="number" />
            <input name="email" placeholder="EMAIL" class="h-8 rounded-sm px-2 mb-3 text-sm focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro" type="email" />
            <input type="submit" class="h-8 rounded-sm px-2 mb-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-600 bg-roxo-claro hover:bg-purple-950">
          </form>
        
      </div>
    </div>
  </main>
</body>

</html>