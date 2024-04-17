<?php

require_once __DIR__ . '/../classes/class.AvaliacaoDiscente.php';
require_once __DIR__ . '/../classes/class.Aula.php';
require_once __DIR__ . '/../classes/class.PedagogicaComplementar.php';
require_once __DIR__ . '/../classes/class.CalculoSemanal.php';

$classeAvaliacaoDiscente = new AvaliacaoDiscente();
$classeAula = new Aula();
$classePedagogicaComplementar = new PedagogicaComplementar();
$classeCalculoSemanal = new CalculoSemanal();

$usuario = $_SESSION['usuario'];

$avaliacao = $classeAvaliacaoDiscente->recupera(['docente_id' => $usuario['id']]);
$aula = $classeAula->recupera(['docente_id' => $usuario['id']]);
$pedagogicaComplementar = $classePedagogicaComplementar->recupera(['docente_id' => $usuario['id']]);
$calculoSemanal = $classeCalculoSemanal->recupera(['docente_id' => $usuario['id']]);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? '';
    $codaula = $_POST['codaula'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $periodo_letivo = $_POST['periodo_letivo'] ?? '';
    $ndisciplina = $_POST['ndisciplina'] ?? '';
    $turmas_teorica = $_POST['turmteorica'] ?? '';
    $turmas_pratica = $_POST['turmpratica'] ?? '';
    $carga_horaria_teorica = $_POST['chteorica'] ?? '';
    $carga_horaria_pratica = $_POST['chpratica'] ?? '';
    $carga_horaria_total = $_POST['chtotal'] ?? '';
    $docentes = $_POST['ndocente'] ?? '';
    $docentes_ch = $_POST['chdocente'] ?? '';
    $curso = $_POST['curso'] ?? '';
    $semestre = $_POST['semestre'] ?? '';
    $graduacao = $_POST['graduacao'] ?? '';
    $posgraduacao = $_POST['posgraduacao'] ?? '';
    $total = $_POST['total'] ?? '';
    $graduacao = $_POST['graduacao'] ?? '';
    $posgraduacao = $_POST['posgraduacao'] ?? '';
    $total = $_POST['total'] ?? '';
    $graduacao_pedagogica = $_POST['graduacao_pedagogica'] ?? '';
    $posgraduacao_pedagogica = $_POST['posgraduacao_pedagogica'] ?? '';
    $total_pedagogica = $_POST['total_pedagogica'] ?? '';
}
    $radocId = '1';

    $dadosAvaliacaoDiscente = array(
        'id' => $avaliacao['id'],
        'docente_id' => $usuario['id'], 
        'codigo' => $codigo,
        'nome' => $nome,
        'semestre' => $semestre,
        'periodo_letivo' => $periodo_letivo,
        'radoc_id' => $radocId 
    );

    $dadosAula = array(
        'id' => $aula['id'],
        'docente_id' => $usuario['id'], 
        'codigo' => $codigo,
        'nome' => $ndisciplina,
        'turmas_teorica' => $turmas_teorica,
        'turmas_pratica' => $turmas_pratica,
        'carga_horaria_teorica' => $carga_horaria_teorica,
        'carga_horaria_pratica' => $carga_horaria_pratica,
        'carga_horaria_total' => $carga_horaria_total,
        'docentes' => $docentes,
        'docentes_ch' => $docentes_ch,
        'semestre' => $semestre,
        'periodo_letivo' => $periodo_letivo,
        'curso_id' => $curso,
        'radoc_id' => $radocId
    );

    $dadosCalculoSemanal = array(
        'id' => $calculoSemanal['id'],
        'docente_id' => $usuario['id'], 
        'graduacao' => $graduacao,
        'posgraduacao' => $posgraduacao,
        'semestre' => $semestre,
        'total' => $total,
        'radoc_id' => $radocId
    );


    $dadosPedagogicaComplementar = array(
        'id' => $pedagogicaComplementar['id'],
        'docente_id' => $usuario['id'], 
        'graduacao' => $graduacao,
        'posgraduacao' => $posgraduacao,
        'semestre' => $semestre,
        'total' => $total,
        'radoc_id' => $radocId
    );
    

    $result1 = $classeAvaliacaoDiscente->altera($dadosAvaliacaoDiscente);
    $result2 = $classeAula->altera($dadosAula);
    $result3 = $classeCalculoSemanal->altera($dadosCalculoSemanal);
    $result4 = $classePedagogicaComplementar->altera($dadosPedagogicaComplementar);

    $msg = 'Erro ao alterar dados!';
    $erro = true;

    if (isset($result1) && isset($result2) && isset($result3) && isset($result4)){
        $msg = 'Alteração realizada com sucesso!';
        $erro = false;
        // header('Location: /?rota=pdocente');
        $intervalo = 0;
            echo "<script>setTimeout(function() {
            window.location.href = '/?rota=pdocente';
        }, " . ( $intervalo * 1000 ) . ');</script>';
    }
    $_SESSION['msg'] = $msg; 
    $_SESSION['erro'] = $erro;
    exit;




