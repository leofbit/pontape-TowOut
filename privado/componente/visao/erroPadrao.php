<title>Erro</title>
<style>
    <?php include 'css/componente/erroPadrao.css'; ?>
</style>
<?php if(isset($erro)):?>
    <div class="erroMensagem">
        <i class="fas fa-exclamation-triangle"></i>
        <h1>Erro</h1>
        <p><?php echo $erro;?></p>
        <a onclick="location.reload()" style="cursor: pointer;" class="button">Recarregar página</a>
    </div>
<?php endif; ?>
