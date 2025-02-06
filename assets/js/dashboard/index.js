function alternarBusca() {
    let searchBox = document.getElementById('pesquisa');
    let competicaoSelect = document.getElementById('competicaoSelect');
    let botaoBuscar = document.getElementById('bntAlterarBusca');

    if (searchBox.classList.contains('d-none')) {
        searchBox.classList.remove('d-none');
        competicaoSelect.classList.add('d-none');
        botaoBuscar.textContent = 'Buscar competição';
    } else {
        searchBox.classList.add('d-none');
        competicaoSelect.classList.remove('d-none');
        botaoBuscar.textContent = 'Buscar time';
    }
}

function carregarJogosPorCompeticao(select) {
  $('.loader').show();

  $.ajax({
    url: '?ctrl=dashboard/carregarJogosPorCompeticao',
    type: 'POST',
    data: {idCompeticao: select.value},
    success: function(response) {
        $('.loader').hide();
        select.value = '';
        if (response.alert) {
            $("#modalAux").append(response.alert);
        }
        if (response.codigo == 200) {
          $("#jogos").html(response.html);
        } else {
          $("#jogos").html('');
        }
    },
    error: function(error) {
        $('.loader').hide();
        console.log("Erro na requisição:", error);
    }
  });
}

  
function pesquisarTime() {
  let time = document.getElementById('buscarTime').value.trim();
  $('.loader').show();
  $.ajax({
    url: '?ctrl=dashboard/carregarJogosPorTime',
    type: 'POST',
    data: {nomeTime: time},
    success: function(response) {
        $('.loader').hide();
        if (response.alert) {
            $("#modalAux").append(response.alert);
        }
        if (response.codigo == 200) {
          $("#jogos").html(response.html);
        } else {
          $("#jogos").html('');
        }
    },
    error: function(error) {
        $('.loader').hide();
        console.log("Erro na requisição:", error);
    }
  });
}

document.getElementById('buscarTime').addEventListener('keydown', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault();  
    pesquisarTime();         
  }
})