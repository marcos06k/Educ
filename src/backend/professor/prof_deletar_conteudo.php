<?php

// recendo o id conteudo da pagina do front
$idConteudo = $_POST['idConteudo'];
// conectando ao banco de dados
$banco = mysqli_connect('localhost','root','', 'educ');
// criando a query
$sql_query = mysqli_query($banco, "DELETE FROM conteudo_assincrono WHERE id_conteudo_assincrono='$idConteudo';")
?>