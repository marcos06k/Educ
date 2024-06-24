<?php
include("../../backend/conexao.php");
include("../../backend/administrador/adm_listar_turmas.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../../scripts/tailwindcfg.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
      rel="stylesheet"
    />
    <script src="../../../scripts/modalDialog.js"></script>
    <script src="../../../scripts/modalDialogTurma.js"></script>
    <script src="../../../scripts/criarTurmaDialog.js"></script>
  </head>
  <body class="bg-fundo-claro h-screen font-montserrat">
    <header
      class="bg-white shadow-sm w-full h-20 flex justify-between items-center px-10"
    >
      <a href="adm.html"
        ><img
          src="../../../assets/Group 3-PhotoRoom.png-PhotoRoom.png"
          alt="Logo EDUQ"
          class="h-36"
      /></a>
      <div class="flex items-center gap-8">
        <div class="flex items-center gap-2">
          <img src="../../../assets/user.png" alt="Foto perfil" class="h-8" />
          <h1 class="font-bold text-gray-700 antialiased">Administrador 01</h1>
        </div>
        <a
          href="..\login.html"
          class="bg-roxo-claro text-white py-3 px-6 rounded-md font-bold cursor-pointer hover:bg-purple-950"
          >LOG OUT</a
        >
      </div>
    </header>
    <menu
      class="gap-2 bg-white shadow-sm w-full h-20 flex items-center px-10 mb-12"
    >
      <span class="material-symbols-outlined text-3xl text-gray-300">home</span>
      <h1 class="text-sm font-bold text-gray-300">Menu Principal</h1>
      <p class="text-gray-300 text-bold">></p>
      <span class="material-symbols-outlined text-3xl text-gray-700"
        >group</span
      >
      <h1 class="text-sm font-bold text-gray-700">Gerenciar Turmas</h1>
    </menu>
    <main class="lg:flex-col flex items-center justify-center h-3/4 2xl:h-4/6 gap-10">
      
      <!-- tabela com turmas -->
      <div class="relative lg:w-full w-[1310px] overflow-x-auto shadow-md sm:rounded-lg">
        <table class=" text-sm text-left rtl:text-right text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">ID_Turma</th>
              <th scope="col" class="px-6 py-3">Turno</th>
              <th scope="col" class="px-6 py-3">Curso</th>
              <th scope="col" class="px-6 py-3">Data Inicio</th>
              <th scope="col" class="px-6 py-3">Data Término</th>
              <th scope="col" class="px-6 py-3">ID_Professor</th>
              <th scope="col" class="px-6 py-3">ID_Administrador</th>
              <th scope="col" class="px-6 py-3">Gerenciar</th>
              <th scope="col" class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody>
            
            <!-- listar turmas -->
            
            <?php
            if ( empty($_POST['turno'])  || empty($_POST['curso']) ) {
              listar_turma(null, null);
              
            } else {
              listar_turma($_POST['turno'],$_POST['curso']);
            }
            
            ?>

            
          </tbody>
        </table>
      </div>
      <!-- Adicionar aluno -->
      <div class="hidden overflow-x-hidden  overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative  md:w-[80%] w-auto my-6 mx-auto max-w-5xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
              <h3 class="text-xl font-semibold"> Adicionar Aluno </h3>
              <button class="p-1 ml-auto  bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                <span class="bg-transparent  text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"> × </span>
              </button>

              <!-- filtrar o aluno pelo cpf -->
              <form action="" method="post">
                <label class="md:ml-3 text-sm font-semibold" for="filtrar-cpf">Filtrar por CPF:</label>
                <input id="filtrar-cpf" class="md:w-[80%] ml-2 px-2 rounded-md bg-gray-50" placeholder="xxx.xxx.xxx-xx" type="text" name="cpf_aluno" id="">
                <button class="bg-roxo-claro rounded-xl text-white text-sm px-2 ml-2 py-1 rounded-sm hover:bg-violet-900" type="submit">Filtrar</button>
              </form>

            </div>
            <!--body-->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">CPF</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Tipo-Usuário</th>
                    <th scope="col" class="px-6 py-3">Gerenciar</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  if(!empty($_POST['cpf_aluno'])){

                    filtrar_aluno($_POST['cpf_aluno']);
                  } else {
                    echo "<div class='px-6 py-3'>Necessário filtrar um usuário primeiro</div>";
                  }
                  ?>
                     
                     
                </tbody>
              </table>
            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
              <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:underline" type="button" onclick="toggleModal('modal-id')">
                Fechar
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-add-backdrop"></div>

      <!-- Editar turma -->
      <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id-add">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
              <h3 class="text-xl font-semibold">
                Editar Turma
              </h3>
              <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id-add')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                  ×
                </span>
              </button>
            </div>
            <!--body-->
                
                  
                <form class="flex flex-col p-6 gap-6"  method="post" id="form_editar_turma">

                  <input id="turno" class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="Turno" >
                  
                  <input id="curso" class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="Curso" >
                  
                  <label class="mb-[-24px] mt-[-18px] text-[12px] font-bold" for="editar_data_inicio">Data de Início</label>
                  <input id="editar_data_inicio" class="bg-fundo-claro focus:outline-none p-2 text-gray-400" type="date" placeholder="Data Inicio" >
                  
                  <label class="mb-[-24px] mt-[-18px] text-[12px] font-bold" for="editar_data_termino">Data de Termino</label>
                  <input id="editar_data_termino" class="bg-fundo-claro focus:outline-none p-2 text-gray-400" type="date" placeholder="Data Término" >
                  
                  <input id="id_professor" class="bg-fundo-claro focus:outline-none p-2" type="text" placeholder="ID Professor" >
                
                
              <!--footer-->
              <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:underline" type="button" onclick="toggleModal('modal-id-add')">
                  Fechar
                </button>
                <button class="bg-violet-500 text-white active:bg-violet-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:bg-violet-700" type="submit" onclick="toggleModal('modal-id-add')">
                  Salvar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

      <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id-turma">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
              <h3 class="text-xl font-semibold">
                Criar Turma
              </h3>
              <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id-turma')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                  ×
                </span>
              </button>
            </div>
            <!--body-->
                <form class="flex flex-col p-6 gap-6" action="../../backend/administrador/adm_criar_turma.php" method="post" >
                
                  <select class="bg-fundo-claro focus:outline-none p-2 text-gray-400" name="turno">
                      <option value="" selected disabled>Turno</option>
                      <option value="Manha">Manhã</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noite">Noite</option>
                    </select>
                    
                    <select class="bg-fundo-claro focus:outline-none p-2 text-gray-400" name="curso">
                      <option value="" selected disabled>Curso</option>
                      <option value="Desenvolvimento de Sistemas">Dev. de Sistemas</option>
                      <option value="Administracao">Administração</option>
                      <option value="Design Grafico">Design</option>
                    </select>
                    
                    <label class="mb-[-24px] mt-[-18px] text-[12px] font-bold" for="criar_data_inicio">Data de Início</label>
                    <input id="criar_data_inicio" class="bg-fundo-claro focus:outline-none p-2 text-gray-400" type="date" placeholder="Data Inicio" name="data_inicio">
                    
                    <label class="mb-[-24px] mt-[-18px] text-[12px] font-bold" for="criar_data_termino">Data de Termino</label>
                    <input id="criar_data_termino" class="bg-fundo-claro focus:outline-none p-2 text-gray-400"" type="date" placeholder="Data Término" name="data_termino">
                    
                    <input class="bg-fundo-claro focus:outline-none p-2 " type="text" placeholder="ID do Professor" name="id_professor">
                
              <!--footer-->
              <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:underline" type="button" onclick="toggleModal('modal-id-turma')">
                  Fechar
                </button>
                <button class="bg-violet-500 text-white active:bg-violet-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:bg-violet-700" type="submit" onclick="toggleModal('modal-id-turma')">
                  Criar
                </button>
              </div>
            </form>

            
            
          
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-turma-backdrop"></div>

      <div class="flex flex-col gap-6">
        <button type="button" onclick="toggleModal('modal-id-turma')">
          <a class="flex gap-2 lg:w-[350px] w-[300px] justify-center items-center bg-roxo-claro text-white h-20 px-10 rounded-lg cursor-pointer hover:bg-purple-950 2xl:h-16 2xl:px-6"
            >Criar Turma<span class="material-symbols-outlined">
              group_add
            </span></a
          >
        </button>
        <div class="flex flex-col lg:w-[350px] w-[300px] justify-center font-montserrat text-gray-700 shadow-md rounded-md p-4 gap-4 bg-gray-50">
          <h1 class="text-md font-montserrat font-bold flex items-center gap-2"><span class="material-symbols-outlined">sort</span> Filtrar por:</h1>
          
          <!-- filtrar Turma -->
          <form action="" class="flex flex-col gap-2" method="post">
            <select
                class=" text-gray-400 h-8 rounded-sm px-2 text-sm  focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro"
                name="turno"
                >
                <option
                  disabled
                  selected
                  class="text-gray-700 border-gray-400 focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro"
                  value=""
                >
                  TURNO
                </option>
                <option class="text-gray-700" value="Manha">Manhã</option>
                <option class="text-gray-700" value="Tarde">Tarde</option>
                <option class="text-gray-700" value="Noite">Noite</option>
              </select>
              
              <select
                class=" text-gray-400 h-8 rounded-sm px-2 text-sm  focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro"
                name="curso"
                >
                <option
                  disabled
                  selected
                  class="text-gray-700 border-gray-400 focus:outline-none focus:ring-1 focus:ring-purple-600 bg-fundo-claro"
                  value=""
                >
                  CURSO
                </option>
                <option class="text-gray-700" value="Desenvolvimento de Sistemas">Ana. e Desv. de Sistemas</option>
                <option class="text-gray-700" value="Design Grafico">Design Gráfico</option>
                <option class="text-gray-700" value="Administracao">Administração</option>
              </select>
              <input type="submit" class="h-8 rounded-sm px-2 mb-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-600 bg-roxo-claro hover:bg-purple-950">
          </form>
          
        </div>
      </div>
    </main>
    <script src="../../../scripts/resgatarIdTurma_idAluno.js"></script>
    <script src="../../../scripts/resgatarIdTurma.js"></script>
  </body>
</html>
