<?php
// print_r('$docenteId');die;
require_once __DIR__ . '/../classes/class.Docente.php';

$classeDocente = new Docente();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cppd = $_POST['cppd'] ?? '';
    $docenteId = $_POST['docenteId'] ?? '';
}

$result = $classeDocente->altera(['cppd' => $cppd,'id' => $docenteId]);

$erro = false;
$msg = 'Sucesso na alteração!';

if(!$result){
    $erro = true;
    $msg = 'Erro na operação!';
}

$_SESSION['erro'] = $erro;
$_SESSION['msg'] = $msg;

// header('Location: ?rota=reabrir_radoc');
$intervalo = 0;
    echo "<script>setTimeout(function() {
    window.location.href = '/?rota=permissao_cppd';
}, " . ( $intervalo * 1000 ) . ');</script>';
exit;
