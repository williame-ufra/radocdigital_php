<?php
// Verifica se a requisição foi feita usando o método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os parâmetros do formulário
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $siape = isset($_POST['siape']) ? $_POST['siape'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $classe = isset($_POST['classe']) ? $_POST['classe'] : '';
    $vinculo = isset($_POST['vinculo']) ? $_POST['vinculo'] : '';
    $regime_de_trabalho = isset($_POST['rtrabalho']) ? $_POST['rtrabalho'] : '';
    $titulacao = isset($_POST['titulacao']) ? $_POST['titulacao'] : '';
    $campus = isset($_POST['campus']) ? $_POST['campus'] : '';
    $instituto = isset($_POST['instituto']) ? $_POST['instituto'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
}

$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$result = $bd->insert("INSERT INTO docente (nome, cpf, siape, email, classe, vinculo, regime_de_trabalho, titulacao, campus_id, instituto_id, data) VALUES (:nome, :cpf, :siape, :email, :classe, :vinculo, :regime_de_trabalho, :titulacao, :campus_id, :instituto_id, :data)", [
    ':nome' => $nome,
    ':cpf' => $cpf,
    ':siape' => $siape,
    ':email' => $email,
    ':classe' => $classe,
    ':vinculo' => $vinculo,
    ':regime_de_trabalho' => $regime_de_trabalho,
    ':titulacao' => $titulacao,
    ':campus_id' => $campus,
    ':instituto_id' => $instituto,
    ':data' => $data
]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>cadastro atualizado!</p>
</body>
</html>