<?php
include("../../backend/professor/prof_turma.php");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
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
<body class="bg-fundo-claro flex font-poppins h-screen ">
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
      class="gap-2  bg-white shadow-sm w-full h-20 2xl:h-12 flex items-center px-10 mb-12 2xl:mb-0"
     >
            <span class="material-symbols-outlined text-3xl text-gray-300">home</span>
            <h1 class="text-sm font-semibold text-gray-300">Menu Principal</h1>
            <p class="text-gray-300 font-bold">></p>
            <span class="material-symbols-outlined text-3xl text-gray-300"
            >account_circle</span
            >
            <h1 class="text-sm font-semibold text-gray-300">Meu Perfil</h1>
            <p class="text-gray-300 font-bold">></p>
            <span class="material-symbols-outlined text-3xl text-gray-700"
            >group</span
            >
            <h1 class="text-sm font-semibold text-gray-700">Turma 01</h1>       
     </menu>
     <main class="flex w-full h-full items-center justify-start gap-x-12 gap-y-9 2xl:gap-x-20 mt-6 mb-12 2xl:mt-8">

        <div class="bg-white shadow-md rounded-xl h-full w-[440px] overflow-hidden relative ml-14">
            <div class="flex justify-center items-center h-1/6 bg-roxo-claro text-center">
                <h1 class="text-white font-semibold text-lg">Aulas</h1>
            </div>
            <div class="text-roxo-claro flex flex-wrap p-10 justify-center h-[550px] overflow-y-auto gap-5">

                <?php
                listarAulasTurma()
                ?>
                


            

            </div>
        </div>

        <div class="bg-white shadow-md rounded-xl h-full w-[440px] overflow-hidden relative">
            <div class="flex justify-center items-center h-1/6 bg-roxo-claro text-center">
                <h1 class="text-white font-semibold text-lg">Entregas recentes</h1>
            </div>
            <div class="text-roxo-claro flex flex-wrap p-10 justify-center h-[550px] overflow-y-auto gap-5">
                
                <?php 
                
                listarEntregasTurma();

                ?>
                 

                 

            </div>
        </div>

        <div class="flex flex-col justify-end h-full gap-2 item-center">
            <?php
                $inputIdTurma = $_POST['inputIdTurma'];
                echo "<form action='criarAula.php' method='post' >
                <input id='idTurma_turma' type='text' value=$inputIdTurma name='idTurmaAula' style='display: none;'>
                <input type='submit' value='Criar Aula' class='flex justify-center item-center gap-2 w-[200px] bg-roxo-claro text-white py-6 px-12 rounded-lg cursor-pointer hover:bg-purple-950'> 
                </form>";
            ?>
            
                
            
            </div>


     </main>
</body>
</html>