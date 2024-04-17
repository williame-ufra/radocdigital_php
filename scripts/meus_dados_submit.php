<?php

require_once __DIR__ . '/../classes/class.Docente.php';

$classeDocente = new Docente();

$usuario = $_SESSION['usuario'];

$input = $_POST;
// print_r($input);die;


$dateTime = new DateTime($input['data_nascimento']);
$formattedDate = $dateTime->format('Y-m-d H:i:s');

$input['data_nascimento'] = $formattedDate;

$input['id'] = $usuario['id'];

// if (isset($input['senha']) && $input['senha'] != '') {
    // $input['senha'] = hash('sha256', $input['senha']);
    // $input['senha'] = $input['senha'];
// }

$input = array_filter($input);


// print_r($usuario);print_r($input);die;
$result = $classeDocente->altera($input);

$msg = 'Erro ao alterar dados!';
$erro = true;

if (isset($result)){
    $msg = 'Alteração realizada com sucesso!';
    $erro = false;
    // header('Location: /?rota=meus_dados');
    $intervalo = 0;
    echo "<script>setTimeout(function() {
    window.location.href = '/?rota=meus_dados';
    }, " . ( $intervalo * 1000 ) . ');</script>';
}

$_SESSION['msg'] = $msg; 
$_SESSION['erro'] = $erro;
exit;


