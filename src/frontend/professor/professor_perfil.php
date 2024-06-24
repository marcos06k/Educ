<?php
include ("../../backend/conexao.php");
include ("../../backend/professor/prof_perfil.php");

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

<body class="bg-fundo-claro flex font-poppins h-fit">
<nav class="flex flex-col items-center h-auto bg-roxo-claro w-20 block sm:hidden">
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
    <header class="bg-white shadow-sm w-full h-20 flex justify-between items-center px-10 ">
                <div class="flex items-center bg-fundo-claro  rounded-lg text-gray-400 md:hidden"><label for="search" class="material-symbols-outlined p-2 rounded-lg">search</label><input placeholder="Pesquisar" id="search" type="text" class="bg-fundo-claro p-2 italic text-sm focus:outline-none rounded-lg"></div>
                <!-- <button for="search" onclick="{toggleSearch()}" class="material-symbols-outlined p-2 rounded-lg hidden sm:block">search</button> -->
                <img src="../../../assets/Group 3-PhotoRoom.png-PhotoRoom.png" class="h-40">
                <div class="flex items-center gap-3 md:hidden"> <!--  -->
                    <img src="../../../assets/user.png" class="h-10">
                    <h1 class="flex items-center italic gap-1 text-sm">Olá,<b>Artur V.</b><a href="#" class="material-symbols-outlined">arrow_drop_down</a></h1>
                    <a href="..\login.html" class="bg-violet-700 text-white py-3 px-6 rounded-md font-bold cursor-pointer hover:bg-violet-800">LOG OUT</a>            
                </div>
                <button type="button" class="hidden md:flex " onclick="toggleMenu()">
                    <div class="relative flex overflow-hidden items-center justify-center rounded-full w-[50px] h-[50px] transform transition-all bg-slate-700 ring-0 ring-gray-300 hover:ring-8 group-focus:ring-4 ring-opacity-30 duration-200 shadow-md">
                        <div class="flex flex-col justify-between w-[20px] h-[20px] transform transition-all duration-500 origin-center overflow-hidden">
                        <div class="bg-white h-[2px] w-7 transform transition-all duration-500 group-focus:-rotate-45 -translate-x-1"></div>
                        <div class="bg-white h-[2px] w-7 rounded transform transition-all duration-500 "></div>
                        <div class="bg-white h-[2px] w-7 transform transition-all duration-500 group-focus:rotate-45 -translate-x-1"></div>
                        </div>
                    </div>    
                </button>
        </header>
        <menu
      class="gap-2 bg-white shadow-sm w-full h-20 2xl:h-12 flex items-center px-10 mb-12 2xl:mb-0 sm:hidden"
     >
            <span class="material-symbols-outlined text-3xl text-gray-300">home</span>
            <h1 class="text-sm font-bold text-gray-300">Menu Principal</h1>
            <p class="text-gray-300 text-bold">></p>
            <span class="material-symbols-outlined text-3xl text-gray-700"
            >account_circle</span
            >
            <h1 class="text-sm font-bold text-gray-700">Meu Perfil</h1>    
     </menu>
     <menu class="grid grid-rows-2 gap-3 bg-white shadow-sm w-full h-fit flex items-center px-10 mb-12 2xl:mb-0 hidden" id="MENU">
            <div class="flex items-center bg-fundo-claro  rounded-lg text-gray-400"><label for="search" class="material-symbols-outlined p-2 rounded-lg">search</label><input placeholder="Pesquisar" id="search" type="text" class="bg-fundo-claro p-2 italic text-sm focus:outline-none rounded-lg"></div>
            <div class="flex items-center gap-5"> <!--  -->
                <img src="../../../assets/user.png" class="h-10">
                <h1 class="flex items-center italic gap-1 text-sm">Olá,<b>Artur V.</b><a href="#" class="material-symbols-outlined">arrow_drop_down</a></h1>
                <a href="..\login.html" class="bg-violet-700 text-white py-3 px-6 rounded-md font-bold cursor-pointer hover:bg-violet-800">LOG OUT</a>            
            </div>
      </menu>
     <main class="flex w-full h-full items-center justify-center gap-x-40 gap-y-9 2xl:gap-x-20 mt-6 mb-12 2xl:mt-8">

     <!-- Dados do perfil do professor -->
    <?php
    prof_dados_perfil();
    
    ?>
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
                       <?php 
                        listar_turmas_perfil();
                       ?>
                  </tbody>
                </table>
              </div>
        </div>
     </main>

     <script src="../../../scripts/resgatarIdTurmaPerfil.js"></script>
     
     <script>
            // pega o botão e o menu
            const toggleButton = document.querySelector('.toggle-search-bar');
            const searchBar = document.getElementById('MENU');

            // verifica se é menor do q um tablet, se sim : spawna a tela com "hidden = false"
            const isSmallScreen = window.matchMedia('(max-width: 767px)'); // Adjust breakpoint for your needs

            if (isSmallScreen.matches) {
            // Code to execute on screens smaller than md (767px by default)
                searchBar.classList.toggle('hidden');  // Use Tailwind's hidden class
            } else {
                // Code to execute on screens larger than or equal to md
                console.log('This is not a small screen.');
            }
            function toggleMenu(){
                searchBar.classList.toggle('hidden');  // Use Tailwind's hidden class
            }
     </script>
</body>
</html>