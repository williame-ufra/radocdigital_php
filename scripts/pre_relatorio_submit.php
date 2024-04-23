<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require_once __DIR__ . '/../classes/class.AvaliacaoDiscente.php';
require_once __DIR__ . '/../classes/class.Aula.php';
require_once __DIR__ . '/../classes/class.PedagogicaComplementar.php';
require_once __DIR__ . '/../classes/class.CalculoSemanal.php';

$classeAvaliacaoDiscente = new AvaliacaoDiscente();
$classeAula = new Aula();
$classePedagogicaComplementar = new PedagogicaComplementar();
$classeCalculoSemanal = new CalculoSemanal();

$usuario = $_SESSION[ 'usuario' ];
// print_r( $usuario );die;
$avaliacao = $classeAvaliacaoDiscente->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );
$aula = $classeAula->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );
$pedagogicaComplementar = $classePedagogicaComplementar->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );
$calculoSemanal = $classeCalculoSemanal->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );

if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    $codigo = $_POST[ 'codigo' ] ?? '';
    $codaula = $_POST[ 'codaula' ] ?? '';
    $nome = $_POST[ 'nome' ] ?? '';
    $periodo_letivo = $_POST[ 'periodo_letivo' ] ?? '';
    $ndisciplina = $_POST[ 'ndisciplina' ] ?? '';
    $turmas_teorica = $_POST[ 'turmteorica' ] ?? '';
    $turmas_pratica = $_POST[ 'turmpratica' ] ?? '';
    $carga_horaria_teorica = $_POST[ 'chteorica' ] ?? '';
    $carga_horaria_pratica = $_POST[ 'chpratica' ] ?? '';
    $carga_horaria_total = $_POST[ 'chtotal' ] ?? '';
    $docentes = $_POST[ 'ndocente' ] ?? '';
    $docentes_ch = $_POST[ 'chdocente' ] ?? '';
    $curso = $_POST[ 'curso' ] ?? '';
    $semestre = $_POST[ 'semestre' ] ?? '';
    $graduacao = $_POST[ 'graduacao' ] ?? '';
    $posgraduacao = $_POST[ 'posgraduacao' ] ?? '';
    $total = $_POST[ 'total' ] ?? '';
    $graduacao = $_POST[ 'graduacao' ] ?? '';
    $posgraduacao = $_POST[ 'posgraduacao' ] ?? '';
    $total = $_POST[ 'total' ] ?? '';
    $graduacao_pedagogica = $_POST[ 'graduacao_pedagogica' ] ?? '';
    $posgraduacao_pedagogica = $_POST[ 'posgraduacao_pedagogica' ] ?? '';
    $total_pedagogica = $_POST[ 'total_pedagogica' ] ?? '';
}
$radocId = '1';

$dadosAvaliacaoDiscente = array(
    'docente_id' => $usuario[ 'id' ],
    'codigo' => $codigo,
    'nome' => $nome,
    'semestre' => $semestre,
    'periodo_letivo' => $periodo_letivo,
    'radoc_id' => $radocId
);

$dadosAula = array(
    'docente_id' => $usuario[ 'id' ],
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
    'docente_id' => $usuario[ 'id' ],
    'graduacao' => $graduacao,
    'posgraduacao' => $posgraduacao,
    'semestre' => $semestre,
    'total' => $total,
    'radoc_id' => $radocId
);

$dadosPedagogicaComplementar = array(
    'docente_id' => $usuario[ 'id' ],
    'graduacao' => $graduacao,
    'posgraduacao' => $posgraduacao,
    'semestre' => $semestre,
    'total' => $total,
    'radoc_id' => $radocId
);

// print_r( $aula ); print_r( '$dadosAula' );die;
if ( !isset( $aula ) || $aula == '' ) {
    $aula = $classeAula->insere( $dadosAula );
}

if ( !isset( $avaliacao  )|| $avaliacao == '' ) {
    $avaliacao = $classeAvaliacaoDiscente->insere( $dadosAvaliacaoDiscente );
}

if ( !isset( $pedagogicaComplementar  )|| $pedagogicaComplementar == '' ) {
    $pedagogicaComplementar = $classePedagogicaComplementar->insere( $dadosPedagogicaComplementar );
}

if ( !isset( $calculoSemanal  )|| $calculoSemanal == '' ) {
    $calculoSemanal = $classeCalculoSemanal->insere( $dadosCalculoSemanal );
}

$msg = 'Erro no cadastro!';
$erro = true;

if (!$avaliacao){
    $msg = 'Erro ao cadastrar avaliação discente!';
    $erro = true;
}elseif (!$aula){
    $msg = 'Erro ao cadastrar aula!';
    $erro = true;
}elseif (!$calculoSemanal){
    $msg = 'Erro ao cadastrar cálculo semanal!';
    $erro = true;
}elseif (!$pedagogicaComplementar){
    $msg = 'Erro ao cadastrar pedagógica complementar!';
    $erro = true;
}

if ( $avaliacao && $aula && $calculoSemanal && $pedagogicaComplementar ) {
    $msg = 'Cadastro realizado com sucesso!';
    $erro = false;
    // header( 'Location: /?rota=pdocente' );
    $intervalo = 0;
    echo "<script>setTimeout(function() {
    window.location.href = '/?rota=pdocente';
}, " . ( $intervalo * 1000 ) . ');</script>';
}


$_SESSION[ 'msg' ] = $msg;
$_SESSION[ 'erro' ] = $erro;
$intervalo = 0;
    echo "<script>setTimeout(function() {
    window.location.href = '/?rota=pdocente';
}, " . ( $intervalo * 1000 ) . ');</script>';

exit;
