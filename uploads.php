<?php

// A pasta de upload terá o mesmo nome que o comércio
// Os arquivos serão: nome_comercio_1, nome_comercio_2...
function uploadImage($nome_comercio) {
    if(isset($_POST['enviar-formulario'])) {
        $formatos = array('png', 'jpeg', 'jpg', 'gif');
        $qtdArquivos = count($_FILES['arquivo']['name']);
        $i = 0;
    
        while($i < $qtdArquivos) {
            $extensao = pathinfo($_FILES['arquivo']['name'][$i], PATHINFO_EXTENSION);
        
            if(in_array($extensao, $formatos)) {
                $pasta = 'arquivos/';
                $temporario = $_FILES['arquivo']['tmp_name'][$i];
                $novoNome = uniqid().".$extensao";
        
                if(move_uploaded_file($temporario, $pasta.$novoNome)) {
                    echo 'Upload feito com sucesso para '. $pasta. $novoNome.'<br>';
                } else {
                    $mensagem = 'Erro, não foi possível fazer o upload';
                }
            } else {
                echo $extensao. ' não é permitida <br>';
            }
            $i++;
        }
    }
}