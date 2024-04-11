<?php
$idTurma = json_decode($_POST['idTurma'], true);
 echo  $idTurma;  

function listarAulasTurma(){
    $id_turma = $_POST['idTurmaPerfil'] ;
    echo $idTurma;
}

function listarEntregasTurma(){
    $id_turma = $_POST['idTurmaPerfil'] ;
    echo $id_turma;}
}


// Mandar o id da turma por meio de uma outra funçao JS ao clicar no botao de criar turma
function mandarIDTurma_criarAula(){
    $id_turma = $_POST['idTurmaPerfil'] ;
    echo $id_turma;
}
?>