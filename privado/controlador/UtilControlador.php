<?php 
class UtilControlador {
    public function renderizarTelaLayout($conteudo, $dados = null, $layout = "privado/layout/layout.php") {
        //passar parametros necessarios para pagina
        $dados = $dados;
        require($layout);
        die;
    }

    public function returnJson($mensagem, $codigo, $tela = null, $dados = null) {
        ob_start();
        ob_implicit_flush(false); 
        require('privado/componente/visao/alertPopup.php');
        $alert = ob_get_clean();

        if (!empty($tela)) {
            ob_start(); 
            ob_implicit_flush(false); 
            require($tela); 
            $tela = ob_get_clean(); 
        }
        ob_end_clean(); 

        header('Content-Type: application/json');

        echo json_encode(array(
            "codigo" => $codigo,   
            "alert" => $alert,
            "html" => $tela
        ));
        exit;
    }
}
?>