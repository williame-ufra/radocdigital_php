<?php

// inicio da sessão
session_start();
// carregamento das rotas permitidas
$rotas_permitidas = require_once __DIR__ . '/../inc/rotas.php';

// definição de rota
$rota = $_GET['rota'] ?? 'home';

// verificar se o usuário está logado
if (!isset($_SESSION['usuario']) && $rota !== 'login_submit') {
    $rota = "login";
}

// se o usuário está logado e tenta entrar no login...
if (isset($_SESSION['usuario']) && $rota === 'login') {
    $rota = 'home';
}

// se a rota não existe
if (!in_array($rota, $rotas_permitidas)) {
    $rota = '404';
}

// preparação da página
$script = null;

switch ($rota) {
    case '404':
        $script .= '404.php';
        break;

    case 'login':
        $script .= 'login.php';
        break;

    case 'login_submit':
        $script .= 'login_submit.php';
        break;

    case 'logout':
        $script .= 'logout.php';
        break;

    case 'home':
        $script .= 'home.php';
        break;

    case 'cadastro':
        $script .= 'cadastro.php';
        break;

    case 'cadastro_submit':
        $script .= 'cadastro_submit.php';
        break;

    case 'pdocente':
        $script .= 'pdocente.php';
        break;

    case 'pcppd':
        $script .= 'pcppd.php';
        break;
}

// carregamento de scripts permanentes
require_once __DIR__ . "/../inc/EasyPDO.php";
require_once __DIR__ . "/../inc/config.php";

// apresentação da página
require_once __DIR__ . "/../inc/header.php";
require_once __DIR__ . "/../scripts/$script";
require_once __DIR__ . "/../inc/footer.php";
