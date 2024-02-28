<?php

include("../../backend/conexao.php");
include("../../backend/administrador/adm_listar_usuarios.php");
include("../../backend/administrador/adm_editar_dados_usuarios.php");

if(!empty($_POST['confirmar_id']) || !empty($_POST['confirmar_usuario']) || !empty($_POST['novo_nome']) || !empty($_POST['novo_sobrenome']) || !empty($_POST['novo_cpf']) || !empty($_POST['novo_telefone']) || !empty($_POST['nova_data_nascimento']) || !empty($_POST['novo_email']) || !empty($_POST['nova_senha']) ){

  atualizar_dados_usuario($_POST['confirmar_usuario'], $_POST['confirmar_id'], $_POST['novo_nome'], $_POST['novo_sobrenome'], $_POST['novo_cpf'], $_POST['novo_telefone'], $_POST['nova_data_nascimento'], $_POST['novo_email'], $_POST['nova_senha']);
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
          if (empty($_POST['tipo_usuario']) || empty($_POST['cpf']) ) {
            listar_usuarios(null, null);
          } else {
            listar_usuarios($_POST['tipo_usuario'], $_POST['cpf']);
          }
          
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
          <form class="flex flex-col p-6 gap-6" method="post" action="">

            <input class="bg-fundo-claro focus:outline-none p-2" type="number" placeholder="Confirme o ID" name="confirmar_id">

            <input class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="Confirme o tipo do usuário" name="confirmar_usuario">
            
            <input class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="Novo Nome" name="novo_nome">

            <input class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="Novo Sobrenome" name="novo_sobrenome">

            <input class="bg-fundo-claro focus:outline-none p-2" type="number" placeholder="Novo CPF" name="novo_cpf">

            <input class="bg-fundo-claro focus:outline-none p-2" type="tel" placeholder="Novo Telefone" name="novo_telefone">

            <input class="bg-fundo-claro focus:outline-none p-2 text-gray-400" type="date" placeholder="Novo Data de Nascimento" name="nova_data_nascimento">

            <input class="bg-fundo-claro focus:outline-none p-2" type="email" placeholder="Novo Email" name="novo_email">
            
            <input class="bg-fundo-claro focus:outline-none p-2" type="password" placeholder="Nova Senha" name="nova_senha">

        
          <!--footer-->
          <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
            <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:underline" type="button" onclick="toggleModal('modal-id')">
              Fechar
            </button>
            <button class="bg-violet-500 text-white active:bg-violet-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:bg-violet-700" type="submit" onclick="toggleModal('modal-id')">
              Salvar
            </button>
          </div>
          </form>
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
        
          <form action="" class="flex flex-col gap-2" method="post">
             <select name="tipo_usuario" class=" text-gray-400 h-8 rounded-sm px-2 text-sm  focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro">
              <option disabled selected class="text-gray-700 border-gray-400 focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro" value="">
                TIPO-USUÁRIO
              </option>
              <option class="text-gray-700" value="option_aluno">Aluno</option>
              <option class="text-gray-700" value="option_professor">Professor</option>
              <option class="text-gray-700" value="option_administrador">Administrador</option>
            </select>
            <input name="cpf" placeholder="CPF" class=" h-8 rounded-sm px-2 text-sm  focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro" type="number" />
            <input type="submit" class="h-8 rounded-sm px-2 mb-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-600 bg-roxo-claro hover:bg-purple-950">
          </form>
        
      </div>
    </div>
  </main>
</body>

</html>