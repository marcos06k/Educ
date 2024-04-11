<?php

$id_turmaa = $_POST['idTurmaPerfil'] ;
echo "id da turma" . $id_turmaa;
function listarAulasTurma(){
    $id_turma = $_POST['idTurmaPerfil'] ;
    echo $id_turma;
}

function listarEntregasTurma(){
    $id_turma = $_POST['idTurmaPerfil'] ;
    echo $id_turma;
}


// Mandar o id da turma por meio de uma outra funçao JS ao clicar no botao de criar turma
function mandarIDTurma_criarAula(){
    $id_turma = $_POST['idTurmaPerfil'] ;
    echo $id_turma;
}
?>