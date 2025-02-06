<style>
    <?php include 'css/layout.css';?>
</style>

<?php $controladorMetodo = explode("/", $_GET['ctrl']);?>
<title>Pontape - <?php echo ucfirst($controladorMetodo[0]);?></title>

<header class="text-center mb-5 py-3 bg-light shadow-sm">
    <h1 class="display-4 fw-bold mb-3">
        <i class="fas fa-futbol me-2"></i> Jogos de Futebol <i class="fas fa-futbol me-2"></i>
    </h1>
    <p class="lead">Confira os jogos das principais ligas!</p>
</header>

<div class="container">
    <?php require($conteudo); ?>
</div>

<div class="d-flex flex-column">
    <footer class="text-center py-3">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> Pontapé. Todos os direitos reservados.</p>
    </footer>
</div