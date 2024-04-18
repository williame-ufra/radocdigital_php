<?php

require_once __DIR__ . '/../classes/class.Docente.php';
require_once __DIR__ . '/../Helpers/SendMailHelper.php';

$classeDocente = new Docente();
$dadosUser = $classeDocente->recupera(['id' => '23']);


$sendMailHelper = new SendMailHelper();

$result = $sendMailHelper->sendEmailConfirmacaoCadastro($dadosUser['email'], $dadosUser['nome_completo'] );

print_r($result);die;

