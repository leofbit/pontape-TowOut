<?php if (!empty ($jogo)):?>
    <div class="col">
        <div class="card">
            <div class="campo">
                <div class="escudo">
                    <img src="<?php echo $jogo->timeCasa['img']; ?>" alt="Time Casa" class="teamIcon">
                </div>
                <div class="xIcon">
                    <span>X</span>
                </div>
                <div class="escudo">
                    <img src="<?php echo $jogo->timeVisitante['img']; ?>" alt="Time Visitante" class="teamIcon">
                </div>
            </div>
            <div class="cardContainer">
            <h2 class="cardTexto"><?php echo $jogo->timeCasa['nome']?> <?php echo $jogo->timeCasa['placar']?> x <?php echo $jogo->timeVisitante['placar']?> <?php echo $jogo->timeVisitante['nome']?></h2>
            <h2 class="cardTitulo">
                <?php if (!empty ($jogo->competicao['img'])):?>
                    <img src="<?php echo $jogo->competicao['img']; ?>" width="30px" alt="Competição" class="compIcon"> 
                <?php endif;?>
                <?php echo $jogo->competicao['nome']?>
            </h2>
                <h2 class="cardTitulo"><strong>Data: </strong><?php echo $jogo->dataJogo?>  | <strong>Hora:</strong> 18:00</h2>
            </div>
        </div>
    </div>
<?php endif;?>