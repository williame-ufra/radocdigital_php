<?php
require_once __DIR__ . '/../classes/class.Docente.php';
require_once __DIR__ . '/../Helpers/SendMailHelper.php';

$classeDocente = new Docente();
$helper = new SendMailHelper();

// Verifica se a requisição foi feita usando o método POST
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    // Recebe os parâmetros do formulário
    $nome = isset( $_POST[ 'name' ] ) ? $_POST[ 'name' ] : '';
    $cpf = isset( $_POST[ 'cpf' ] ) ? $_POST[ 'cpf' ] : '';
    $siape = isset( $_POST[ 'siape' ] ) ? $_POST[ 'siape' ] : '';
    $email = isset( $_POST[ 'email' ] ) ? $_POST[ 'email' ] : '';
    $classe = isset( $_POST[ 'classe' ] ) ? $_POST[ 'classe' ] : '';
    $vinculo = isset( $_POST[ 'vinculo' ] ) ? $_POST[ 'vinculo' ] : '';
    $regime_de_trabalho = isset( $_POST[ 'regime_de_trabalho' ] ) ? $_POST[ 'regime_de_trabalho' ] : '';
    $titulacao = isset( $_POST[ 'titulacao' ] ) ? $_POST[ 'titulacao' ] : '';
    $campus = isset( $_POST[ 'campus' ] ) ? $_POST[ 'campus' ] : '';
    $instituto = isset( $_POST[ 'instituto' ] ) ? $_POST[ 'instituto' ] : '';
    $data = isset( $_POST[ 'data_nascimento' ] ) ? $_POST[ 'data_nascimento' ] : '';
    $senha = isset( $_POST[ 'senha' ] ) ? $_POST[ 'senha' ] : '';
    // $ultimo_acesso = isset( $_POST[ 'ultimo_acesso' ] ) ? $_POST[ 'ultimo_acesso' ] : '';
}
$intervalo = 0;

$agora = new DateTime();
$agoraFormatado = $agora->format( 'Y-m-d H:i:s' );

$dateTime = new DateTime( $data );
$formattedDate = $dateTime->format( 'Y-m-d H:i:s' );

$dados = array(
    'nome_completo' => $nome,
    'cpf' => $cpf,
    'siape' => $siape,
    'email' => $email,
    'classe' => $classe,
    'vinculo_estatutario' => $vinculo,
    'regime' => $regime_de_trabalho,
    'titulacao' => $titulacao,
    'campus_id' => $campus,
    'instituto_id' => $instituto,
    // 'senha' => hash( 'sha256', $senha ),
    'senha' => $senha,
    'data_nascimento' => $formattedDate,
    'ultimo_acesso' => $agoraFormatado,
    'cppd' => '0',
);

$usuario = $classeDocente->recupera( [ 'cpf' => $cpf ] );

if ( $usuario ) {
    $msg = 'CPF já cadastrado!';
    $erro = true;

    $_SESSION[ 'msg' ] = $msg;
    $_SESSION[ 'erro' ] = $erro;

    echo "<script>setTimeout(function() {
        window.location.href = '/?rota=cadastro';
    }, " . ( $intervalo * 1000 ) . ');</script>';
    exit;
}

$usuario = $classeDocente->recupera( [ 'email' => $email ] );

if ( $usuario ) {
    $msg = 'Email já cadastrado!';
    $erro = true;

    $_SESSION[ 'msg' ] = $msg;
    $_SESSION[ 'erro' ] = $erro;

    echo "<script>setTimeout(function() {
        window.location.href = '/?rota=cadastro';
    }, " . ( $intervalo * 1000 ) . ');</script>';
    exit;
}

$docente = $classeDocente->insere( $dados );

$msg = 'Erro ao cadastrar docente!';
if ( $docente ) {
    $msg = 'Cadastro realizado com sucesso!';
    $erro = false;
    
    // $docente = $classeDocente->recupera( [ 'id' => $docente ] );
    if ( $helper->sendEmailConfirmacaoCadastro( $email, $nome ) ) {
        $msg = 'Cadastro realizado com sucesso!!';
    }
}

// $_SESSION[ 'msg' ] = $msg;
// $_SESSION[ 'erro' ] = $erro;

?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Document</title>
</head>

<body>
<p>
<h4 class = 'text-center'>< ?= $msg ?></h4>
</p>
<div class = 'text-center'>
<a href = '?rota=login'><button class = 'btn btn-success btn-lg mt-5'>Fazer login</button></a>
</div>
</body>
</html>