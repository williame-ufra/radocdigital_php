<?php

require_once __DIR__ . '/../classes/class.Radoc.php';

$classeRadoc = new Radoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $radocId = $_POST['radoc_id'] ?? '';
}


$radoc = $classeRadoc->recupera(['id' => $radocId]);

if ($radoc['ativo'] == '1'){
    $dados = [
        'id' => $radocId,
        'ativo' => '0'
    ];
} else {
    $dados = [
        'id' => $radocId,
        'ativo' => '1'
    ];
}

$result = $classeRadoc->altera($dados);

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
    window.location.href = '/?rota=reabrir_radoc';
}, " . ( $intervalo * 1000 ) . ');</script>';
exit;
