<?php 
require_once './api/conexaoApi.php';  
require_once 'privado/modelo/Jogo.php';  
require_once 'privado/controlador/UtilControlador.php';

class DashboardControlador extends UtilControlador {
    public function padrao() {
        try {
            $competicoes = fazerRequisicaoApi('https://api.football-data.org/v4/competitions');
            $this->renderizarTelaLayout('privado/visao/dashboard/padrao.php', $competicoes['competitions']);
        } catch (Exception $e) {
            (new Erro)->renderizarErro($e->getMessage());
        }
    }

    public function carregarJogosPorCompeticao() {
        try {
            $idCompeticao = $_POST['idCompeticao'];
            if (empty($idCompeticao)) {
                //bad request codigo 400
                $this->returnJson('Informe um campeonato.', 400);     
            } else {
                $today = date('Y-m-d'); 
                $dataCompeticao = fazerRequisicaoApi('http://api.football-data.org/v4/competitions/' . $idCompeticao);
                $ultimaRodada = $dataCompeticao['currentSeason']['currentMatchday'];
                $proximaRodada = $ultimaRodada + 1;
                
                $jogosAnteriores = fazerRequisicaoApi("http://api.football-data.org/v4/competitions/$idCompeticao/matches?status=FINISHED&matchday=$ultimaRodada");
                $jogosProximos = fazerRequisicaoApi("http://api.football-data.org/v4/competitions/$idCompeticao/matches?matchday=". $proximaRodada);

                $jogos['anteriores'] = $this->formatarJogos($jogosAnteriores);
                $jogos['proximos'] = $this->formatarJogos($jogosProximos);

                //Returna o json junto com o html com itens ja carregados
                $this->returnJson('Consulta feita com sucesso!', 200, 'privado/visao/dashboard/jogos.php', $jogos);     
            }
        } catch (Exception $e) {
            $this->returnJson($e->getMessage(), 400);  
        }
    }

    public function carregarJogosPorTime() {
        try {
            $nomeTime = $_POST['nomeTime'];
            if (empty($nomeTime)) {
                throw new Exception('Informe o nome do time.');

            } else {
                $resposta = fazerRequisicaoApi('https://api.football-data.org/v4/teams');
                $idTime = 0;
                foreach ($resposta['teams'] as $time) {
                    if (isset ($time)) {
                        if (stripos($time['name'], $nomeTime) !== false) {
                            $idTime = $time['id'];
                        }
                    }
                }

                if ($idTime != 0) {
                    $jogosAnteriores = fazerRequisicaoApi("http://api.football-data.org/v4/teams/$idTime/matches?status=FINISHED&limit=6");
                    $jogosProximos = fazerRequisicaoApi("http://api.football-data.org/v4/teams/$idTime/matches?status=SCHEDULED&limit=6");
                    $jogos['anteriores'] = $this->formatarJogos($jogosAnteriores);
                    $jogos['proximos'] = $this->formatarJogos($jogosProximos);
                }

                //Returna o json junto com o html com itens ja carregados
                $this->returnJson('Consulta feita com sucesso!', 200, 'privado/visao/dashboard/jogos.php', $jogos);     
            }
        } catch (Exception $e) {
            $this->returnJson($e->getMessage(), 404);  
        }
    }
    

    private function formatarJogos($dados) {
        $jogosFormatados = [];
    
        if (!empty($dados['matches'])) {
            foreach ($dados['matches'] as $match) {
                $jogo = new Jogo();
    
                $jogo->competicao = [
                    'nome' => $match['competition']['name'],
                    'img' => $match['competition']['emblem'],
                ];
    
                $jogo->dataJogo = date("d/m/Y", strtotime($match['utcDate']));
                $jogo->horaJogo = date("H:i", strtotime($match['utcDate']));
    
                $jogo->timeCasa = [
                    'nome' => $match['homeTeam']['shortName'],
                    'img' => $match['homeTeam']['crest'],
                    'placar' => $match['score']['fullTime']['home']
                ];
    
                $jogo->timeVisitante = [
                    'nome' => $match['awayTeam']['shortName'],
                    'img' => $match['awayTeam']['crest'],
                    'placar' => $match['score']['fullTime']['away']
                ];
    
                $jogosFormatados[] = $jogo;
            }
        }
    
        return $jogosFormatados;
    }
    
}
?>