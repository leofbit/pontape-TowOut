<?php
require_once 'privado/componente/erro.php';

function fazerRequisicaoApi($url, $authToken = 'b15adba17dec48bb90dba953587f820d') {
    $headers = [
        "X-Auth-Token: $authToken",
        "Accept: application/json"
    ];  

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 


    $resposta = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($resposta === false) {
        $erroCurl = curl_error($ch);
        curl_close($ch);
        throw new Exception("Erro na requisição cURL: $erroCurl");
    }

    curl_close($ch);

    $dados = json_decode($resposta, true);

    if (($httpCode < 200 || $httpCode >= 300)) {
        throw new Exception("Erro na API ({$httpCode}): " . json_encode($dados));
    }

    return $dados;
}



?>