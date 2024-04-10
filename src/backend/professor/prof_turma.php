<?php

function listarAulasTurma(){
    $id_turma = json_encode($_POST['idTurmaPerfil']) ;
    echo $id_turma;
}

function listarEntregasTurma(){
    $id_turma = json_encode($_POST['idTurmaPerfil']) ;
}


// Mandar o id da turma por meio de uma outra funçao JS ao clicar no botao de criar turma
function mandarIDTurma_criarAula(){
    echo json_encode($_POST['idTurmaPerfil']);
}
?>