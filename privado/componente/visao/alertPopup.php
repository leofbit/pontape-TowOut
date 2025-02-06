<?php if(isset($mensagem)):?>
    <div id="alert" class="alerta mfp-move-from-top <?php echo $codigo == 200 ? 'alerta-success' : 'alerta-warning'?>">
        <div class="icon__wrapper">
            <span class="mdi mdi-alert-outline"></span>
            <?php if($codigo == 200):?>
                <img src="https://cdn-icons-png.flaticon.com/512/659/659890.png" width="20px">
            <?php else:?>
                <img src="https://cdn-icons-png.flaticon.com/512/607/607870.png" width="20px">
            <?php endif;?>
        </div>
        <p><?php echo $mensagem;?></p>
        <span class="mdi mdi-open-in-new open"></span>
        <span class="mdi mdi-close close" onclick="this.parentElement.remove()">&times</span>
    </div>

    <script>
        removerAlert();
    </script>
<?php endif; ?>
