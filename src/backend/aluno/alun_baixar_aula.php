<?php
    $caminhoArquivo = $_POST['caminhoArquivo'];
    header('Content-Type: application/download');
    header("Content-Disposition: attachment; filename=".''.basename($caminhoArquivo, '.'));
    header("Content-Length: " . filesize($caminhoArquivo));
    $fp = fopen($caminhoArquivo, "r");
    fpassthru($fp);
    fclose($fp);
?>