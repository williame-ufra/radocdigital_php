<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../classes/class.Docente.php';

$intervalo = 0;
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    $usuario = isset( $_POST[ 'text_usuario' ] ) ? trim( htmlspecialchars( $_POST[ 'text_usuario' ] ) ) : null;
    $senha = isset( $_POST[ 'text_senha' ] ) ? trim( htmlspecialchars( $_POST[ 'text_senha' ] ) ) : null;

    if ( !$usuario || !$senha ) {
        echo "<script>setTimeout(function() {
            window.location.href = '/?rota=login';
        }, " . ($intervalo * 1000) . ");</script>";
        exit;
    }

    $classeDocente = new Docente();
    $docente = $classeDocente->recupera( [ 'cpf' => $usuario ] );

    if($docente){
        date_default_timezone_set( 'America/Sao_Paulo' );
        $dateTime = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo' ) );
        $dataAtual = $dateTime->format( 'Y-m-d H:i:s' );
        $classeDocente->altera( [ 'id' => $docente[ 'id' ], 'ultimo_acesso' => $dataAtual ] );
    }

    $resultado = $classeDocente->recupera( [ 'cpf' => $usuario, 'senha' => $senha ] );

    if ( !$resultado ) {
        $_SESSION[ 'erro' ] = 'Usuário ou senha inválidos';

    echo "<script>setTimeout(function() {
        window.location.href = '/?rota=login';
    }, " . ($intervalo * 1000) . ");</script>";
        exit;
    }

    if ( empty( $resultado ) ) {
        // session_start();
        $_SESSION[ 'erro' ] = 'Usuário ou senha inválidos';
        
    echo "<script>setTimeout(function() {
        window.location.href = '/?rota=login';
    }, " . ($intervalo * 1000) . ");</script>";
        exit;
    }

    $_SESSION[ 'usuario' ] = $resultado;
    
    echo "<script>setTimeout(function() {
        window.location.href = '/?rota=home';
    }, " . ($intervalo * 1000) . ");</script>";
    exit;
} else {
    
    echo "<script>setTimeout(function() {
        window.location.href = '/?rota=login';
    }, " . ($intervalo * 1000) . ");</script>";
    exit;
}
