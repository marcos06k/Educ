<?php
include ("../../backend/conexao.php");
include ("../../backend/aluno/alun_perfil.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUQ - Página Principal </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../../scripts/tailwindcfg.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
      rel="stylesheet"
    />
</head>

<body class="bg-fundo-claro flex font-poppins h-screen">
    <nav class="flex flex-col items-center h-full bg-roxo-claro w-20">
        <div class="flex flex-col gap-4 mt-16">
            <a href="#" class="flex items-center justify-center material-symbols-outlined text-white bg-[#201336] text-3xl size-12 rounded-full hover:bg-white hover:text-[#201336] transition-all">other_houses</a>
            <a href="#" class="flex items-center justify-center material-symbols-outlined text-white bg-[#201336] text-3xl size-12 rounded-full hover:bg-white hover:text-[#201336] transition-all">calendar_month</a>
            <a href="#" class="flex items-center justify-center material-symbols-outlined text-white bg-[#201336] text-3xl size-12 rounded-full hover:bg-white hover:text-[#201336] transition-all">description</a>
            <a href="#" class="flex items-center justify-center material-symbols-outlined text-white bg-[#201336] text-3xl size-12 rounded-full hover:bg-white hover:text-[#201336] transition-all">psychology_alt</a>
            <a href="#" class="flex items-center justify-center material-symbols-outlined text-white bg-[#201336] text-3xl size-12 rounded-full hover:bg-white hover:text-[#201336] transition-all">robot_2</a>
            <a href="#" class="flex items-center justify-center material-symbols-outlined text-white bg-[#201336] text-3xl size-12 rounded-full hover:bg-white hover:text-[#201336] transition-all">forum</a>
            <a href="#" class="flex items-center justify-center material-symbols-outlined text-white bg-[#201336] text-3xl size-12 rounded-full hover:bg-white hover:text-[#201336] transition-all">account_circle</a>
        </div>
    </nav>
    <section class="flex flex-col w-full h-screen items-center">
        <header class="bg-white shadow-sm w-full h-20 flex justify-between items-center px-10">
            <div class="flex items-center bg-fundo-claro  rounded-lg text-gray-400"><label for="search" class="material-symbols-outlined p-2 rounded-lg">search</label><input placeholder="Pesquisar" id="search" type="text" class="bg-fundo-claro p-2 italic text-sm focus:outline-none rounded-lg"></div>
            <img src="../../../assets/Group 3-PhotoRoom.png-PhotoRoom.png" class="h-36">
            <div class="flex items-center gap-3">
                <img src="../../../assets/user.png" class="h-10">
                <h1 class="flex items-center italic gap-1 text-sm">Olá,<b>Artur V.</b><a href="#" class="material-symbols-outlined">arrow_drop_down</a></h1>
                <a
          href="#"
          class="bg-violet-700 text-white py-3 px-6 rounded-md font-bold cursor-pointer hover:bg-violet-800"
          >LOG OUT</a
        >
            </div>
        </header>
        <menu
      class="gap-2 bg-white shadow-sm w-full h-20 2xl:h-12 flex items-center px-10 mb-12 2xl:mb-0"
     >
            <span class="material-symbols-outlined text-3xl text-gray-300">home</span>
            <h1 class="text-sm font-bold text-gray-300">Menu Principal</h1>
            <p class="text-gray-300 text-bold">></p>
            <span class="material-symbols-outlined text-3xl text-gray-700"
            >account_circle</span
            >
            <h1 class="text-sm font-bold text-gray-700">Meu Perfil</h1>    
     </menu>
     <main class="flex w-full h-full items-center justify-center gap-x-40 gap-y-9 2xl:gap-x-20 mt-6 mb-12 2xl:mt-8">

     <!-- Dados do perfil do professor -->
            <div class='flex flex-col items-center bg-white h-3/4 w-3/12 2xl:h-96 2xl:w-1/4 rounded-3xl shadow-md'>
                <div class='h-2/6 w-full bg-gradient-to-l from-purple-900 to-violet-700 rounded-t-3xl'></div>
                <img src='../../../assets/user.png' class='size-40 2xl:size-32 mt-[-85px] drop-shadow-md' alt=''>
                <div class='w-full flex flex-col items-center mt-4'>
                    <h1 class='font-semibold text-lg'>Lucas</h1>
                    <p class='text-gray-500'>Aluno</p>
                </div>
                    <div class='h-20 w-full mt-10 flex justify-center items-center gap-12'>
                        <div class='text-center'>
                            <h1 class='text-roxo-claro font-semibold text-3xl'>02</h1>
                            <p class='text-gray-500'>Turmas</p>
                        </div>
                        
                    </div>
                </div>
            </div>
    <!-- /-->

<!-- Listar turmas do professor -->
        <div class="bg-white h-3/4 w-2/6 2xl:h-96 2xl:w-2/4 rounded-xl shadow-md overflow-hidden">
            <div class="text-white text-center font-semibold p-5 bg-roxo-claro">
                <h1>Turmas</h1>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3">Turno</th>
                      <th scope="col" class="px-6 py-3">Curso</th>
                      <th scope="col" class="px-6 py-3">Data de Início</th>
                      <th scope="col" class="px-6 py-3">Data de Termino</th>
                      <th scope="col" class="px-6 py-3">ENTRAR</th>            
                    </tr>
                  </thead>
                  <tbody>
                  <tr class='odd:bg-white even:bg-gray-50 border-b'>
                    <td class='px-6 py-4'>Manha</td>
                    <td class='px-6 py-4'>Desenvolvimento de Sistemas</td>
                    <td class='px-6 py-4'>01/01/12</td>
                    <td class='px-6 py-4'>02/01/12</td>
                    <td class='px-6 py-4'>
                      <a href="turma.php">ENTRAR</a>
                    </td>
                  </tr>   
                  </tbody>
                </table>
              </div>
        </div>
     </main>

     <script src="../../../scripts/resgatarIdTurmaPerfil.js"></script>
     
</body>
</html>