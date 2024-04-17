<?php

require_once __DIR__ . '/../classes/class.Docente.php';
require_once __DIR__ . '/../Helpers/SendMailHelper.php';

$classeDocente = new Docente();
$dadosUser = $classeDocente->recupera(['id' => '23']);

// print_r($dadosUser);


// try {
    $destinatario = $dadosUser['email'];
    $assunto = "Confirmação de inscrição";

    // Construa o corpo do e-mail como uma página HTML
    $corpo = "
<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Confirmação de Cadastro</title>
</head>
<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>

    <table cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; border: 1px solid #ddd; padding: 20px;'>
        <tr>
            <td align='center'>
                <h2 style='color: #333333;'>Confirmação de Cadastro</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p style='color: #555555;'>Olá ," . $dadosUser['nome_completo'] . ",</p>
                <p style='color: #555555;'>Obrigado por se cadastrar em nosso site</p>
                <p style='color: #555555;'>Se você não se cadastrou em nosso site, pode ignorar este e-mail.</p>
            </td>
        </tr>
    </table>

</body>
</html>";

    // Headers para indicar que o conteúdo é HTML
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: asplansecul@gmail.com' . "\r\n";
    $headers .= 'Reply-To: felipeciap@outlook.com' . "\r\n";


    // print_r($destinatario);
    // print_r($assunto);
    // print_r($corpo);
    // print_r($headers);
    // die;
    // Enviar e-mail
    if (!mail($destinatario, $assunto, $corpo, $headers)) {
        echo false;
    }
    echo true;
// } catch (\Throwable $th) {
//     print_r($th);
//     die;
// }
