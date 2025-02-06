<?php 

class Erro {
    public function renderizarErro($erro) {
        require("privado/componente/visao/erroPadrao.php");
        die;
    }
    
}
?>