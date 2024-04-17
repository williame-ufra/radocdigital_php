<?php

// inicio da sessão
session_start();
// carregamento das rotas permitidas
$rotas_permitidas = require_once __DIR__ . '/../inc/rotas.php';

// definição de rota
$rota = $_GET['rota'] ?? 'home';

// verificar se o usuário está logado
if (!isset($_SESSION['usuario']) && $rota !== 'login_submit' && $rota !== 'cadastro' && $rota !== 'cadastro_submit') {
    $rota = "login";
}

// se o usuário está logado e tenta entrar no login...
if (isset($_SESSION['usuario']) && $rota === 'login') {
    $rota = 'home';
}

$rota = str_replace('.php', '', $rota);

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

    case 'pre_relatorio':
        $script .= 'pre_relatorio.php';
        break;

    case 'pre_relatorio_submit':
        $script .= 'pre_relatorio_submit.php';
        break;

    case 'pre_relatorio_edit':
        $script .= 'pre_relatorio_edit.php';
        break;

    case 'pre_relatorio_edit_submit':
        $script .= 'pre_relatorio_edit_submit.php';
        break;

    case 'reabrir_radoc':
        $script .= 'reabrir_radoc.php';
        break;

    case 'reabrir_radoc_submit':
        $script .= 'reabrir_radoc_submit.php';
        break;
        
    case 'imp_dec':
        $script .= 'imp_dec.php';
        break;
    case 'preencher_dec':
        $script .= 'preencher_dec.php';
        break;
    case 'gerar_relatorio':
        $script .= 'gerar_relatorio.php';
        break;
    case 'relatorio':
        $script .= 'relatorio.php';
        break;    
    case 'teste-email':
        $script .= 'teste-email.php';
        break;   
    case 'recuperar_senha': 
        $script .= 'recuperar_senha.php';
        break;
    case 'meus_dados':
        $script .= 'meus_dados.php';
        break;
    case 'meus_dados_edit':
        $script .= 'meus_dados_edit.php';
        break;
    case 'meus_dados_submit':
        $script .= 'meus_dados_submit.php';
        break; 
}

// carregamento de scripts permanentes
require_once __DIR__ . "/../inc/EasyPDO.php";
require_once __DIR__ . "/../inc/config.php";

// apresentação da página
require_once __DIR__ . "/../inc/header.php";
require_once __DIR__ . "/../scripts/$script";

require_once __DIR__ . "/../inc/footer.php";
