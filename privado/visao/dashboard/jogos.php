<?php if (!empty($dados['anteriores'])):?>
    <div class="container py-3">
        <h2 class="text-light text-center mb-4">Jogos Anteriores</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($dados['anteriores'] as $jogo): ?>
                <?php require('_card.php'); ?>
            <?php endforeach; ?>
        </div>
    </div>
    <hr style="border-top: 1px solid #ffffff; margin: 20px 0; width: 100%;">
<?php endif; ?>

<?php if (!empty($dados['proximos'])):?>
    <div class="container py-3">
    <h2 class="text-light text-center mb-4">Jogos da Próxima Rodada</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($dados['proximos'] as $jogo): ?>
                <?php require('_card.php'); ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (empty ($dados['anteriores']) && empty ($dados['proximos'])):?>
    <div class="container-fluid d-flex align-items-center mt-3  ">
        <div class="card text-center text-light bg-dark p-5 w-100">
            <h2>Nenhum jogo encontrado!</h2>
            <p class="mt-3">Não há partidas disponíveis no momento.</p>
        </div>
    </div>
<?php endif; ?>
