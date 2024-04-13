<?php 
    $banco = mysqli_connect('localhost','root','usbw', 'educ');
    if(!$banco){
        echo "Não foi possivel conectar com o BD.<br>Causa:".mysqli_connect_error();
    } else {
        // echo "<script>alert('Conexão com o BD ocorreu normalmente.');</script>";
    }
?>