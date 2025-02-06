<style>
    <?php include 'css/global.css'; ?>
</style>

<script type="text/javascript" src="assets/js/global.js"></script>

<!-- Algumas bibliotecas do projeto -->
<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.form.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo_min.ico">
</head>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
        <div id="modalAux"></div>
        <div class="loader" id="loader"></div>
        <div class="page">
            <?php
                if(!isset($_GET["ctrl"])) header("Location: ?ctrl=login");
                $controladorMetodo = explode("/", $_GET['ctrl']);
                $controlador = $controladorMetodo[0] . 'Controlador';
                if (count($controladorMetodo) > 1) {
                    $metodo = $controladorMetodo[1];
                } else {
                    $metodo = 'padrao';
                }
                $fileName = 'privado/controlador/'. $controlador . '.php';

                if (file_exists($fileName)) {
                    require_once $fileName;
                } else {
                    header("Location: ?ctrl=dashboard");
                }
                $controlador = new $controlador;
                $controlador->$metodo();
            ?>
        </div>
    </body>
</html>


