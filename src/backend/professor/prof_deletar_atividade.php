<?php

// recendo o id conteudo da pagina do front
$idAtividade = $_POST['idAtividade'];

// conectando ao banco de dados
$banco = mysqli_connect('localhost','root','', 'educ');
// criando a query
$sql_query = mysqli_query($banco, "DELETE FROM atividade WHERE id_atividade='$idAtividade';")
?>