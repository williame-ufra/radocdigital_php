<?php
require_once __DIR__ . '/../classes/class.Docente.php';

$classeDocente = new Docente();



// Verifica se a requisição foi feita usando o método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os parâmetros do formulário
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $siape = isset($_POST['siape']) ? $_POST['siape'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $classe = isset($_POST['classe']) ? $_POST['classe'] : '';
    $vinculo = isset($_POST['vinculo']) ? $_POST['vinculo'] : '';
    $regime_de_trabalho = isset($_POST['regime_de_trabalho']) ? $_POST['regime_de_trabalho'] : '';
    $titulacao = isset($_POST['titulacao']) ? $_POST['titulacao'] : '';
    $campus = isset($_POST['campus']) ? $_POST['campus'] : '';
    $instituto = isset($_POST['instituto']) ? $_POST['instituto'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $ultimo_acesso = isset($_POST['ultimo_acesso']) ? $_POST['ultimo_acesso'] : '';
}

$dateTime = new DateTime($data);

$formattedDate = $dateTime->format('Y-m-d H:i:s');

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
    'senha' => hash('sha256', $senha),
    'ultimo_acesso' => $formattedDate
);

// print_r($ultimo_acesso);
// die;

$usuario = $classeDocente->recupera(['cpf' => $usuario]);

if ($usuario) {
    $msg = 'Usuário já cadastrado!';
    header('Location: /?rota=cadastro');
    exit;
}

$docente = $classeDocente->insere($dados);

$msg = 'Erro ao cadastrar docente!';
if ($docente) {
    $msg = 'Cadastro realizado com sucesso!';
}

// $bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

// $result = $bd->insert("INSERT INTO docente (nome_completo, cpf, siape, email, classe, vinculo_estatutario, regime, titulacao, campus_id, instituto_id, ultimo_acesso) VALUES (:nome_completo, :cpf, :siape, :email, :classe, :vinculo_estatutario, :regime, :titulacao, :campus_id, :instituto_id, :ultimo_acesso)", [
//     ':nome_completo' => $nome,
//     ':cpf' => $cpf,
//     ':siape' => $siape,
//     ':email' => $email,
//     ':classe' => $classe,
//     ':vinculo_estatutario' => $vinculo, // Assuming vinculo corresponds to estatutario
//     ':regime' => $regime_de_trabalho,
//     ':titulacao' => $titulacao,
//     ':campus_id' => $campus,
//     ':instituto_id' => $instituto,
//     ':ultimo_acesso' => $data // Assuming data corresponds to ultimo_acesso
// ]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>
    <h4 class="text-center"><?= $msg ?></h4>
    </p>
    <div class="text-center">
        <a href="?rota=login"><button class="btn btn-success btn-lg mt-5">Fazer login</button></a>
    </div>
</body>

</html>