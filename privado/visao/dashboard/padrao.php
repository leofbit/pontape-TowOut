<style>
    <?php include 'css/dashboard/index.css';?>
</style>
<div class="container">
    <div class="row justify-content-center mb-4 g-3 g-sm-4">
        <div class="col-md-6">
            <div id="pesquisa" class="input-group d-none">
                <input type="text" id="buscarTime" class="form-control input" placeholder="Pesquisar por time...">
                <button class="btn btn-primary" type="button" onclick="pesquisarTime()">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <select id="competicaoSelect" class="form-select select" onchange="carregarJogosPorCompeticao(this)">
                <option value="" disabled selected>Escolha uma competição</option>
                <?php foreach($dados as $competicao): ?>
                    <option value="<?php echo $competicao['id']; ?>"><?php echo $competicao['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2 text-center">
            <button class="botao input w-80" onclick="alternarBusca()" id="bntAlterarBusca">Buscar time</button>
        </div>
    </div>
    <!-- Div para carregar jogos -->
    <div id="jogos"></div>
</div>

<script src="assets/js/dashboard/index.js"></script>



