<?php

// destroi a sessão
session_destroy();

// redireciona para página inicial
$intervalo = 0;
// header('Location: index.php?rota=home');
echo "<script>setTimeout(function() {
    window.location.href = '/?rota=home';
}, " . ($intervalo * 1000) . ");</script>";
