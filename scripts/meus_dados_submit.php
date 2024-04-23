<?php

require_once __DIR__ . '/../classes/class.Docente.php';

$classeDocente = new Docente();
$usuario = $_SESSION[ 'usuario' ];
$input = $_POST;

$dateTime = new DateTime( $input[ 'data_nascimento' ] );
$formattedDate = $dateTime->format( 'Y-m-d H:i:s' );

$input[ 'data_nascimento' ] = $formattedDate;
$input[ 'id' ] = $usuario[ 'id' ];

$input = array_filter( $input );
unset( $input[ 'cpf' ] );

$result = $classeDocente->altera( $input );

$msg = 'Erro ao alterar dados!';
$erro = true;

if ( isset( $result ) ) {
    $msg = 'Alteração realizada com sucesso!';
    $erro = false;

    $_SESSION['msg'] = $msg;
    $_SESSION['erro'] = $erro;

    $intervalo = 0;
    echo "<script>setTimeout(function() {
    window.location.href = '/?rota=meus_dados';
    }, " . ( $intervalo * 1000 ) . ');</script>';
}

$_SESSION[ 'msg' ] = $msg;

$_SESSION[ 'erro' ] = $erro;
exit;

