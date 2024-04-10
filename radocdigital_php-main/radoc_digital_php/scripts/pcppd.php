<?php
require_once __DIR__ . '/../inc/navbar.php';
?>

<div class="container">

    <div class="row">
        <h2 class="text-center mt-5">Página CPPD</h2>
        <div class="col text-center">
            <button href="?rota=cadastro" type="submit" class="btn btn-success mt-5">Cadastrar professor<br>
        </div>

        <div class="col text-center">
            <button href="reabrir_radoc.php" type="submit" class="btn btn-success mt-5">Reabertura do radoc<br>
        </div>

        <div class="col text-center">
            <button href="imp_dec.php" type="submit" class="btn btn-success mt-5">Imprimir declaração<br>
        </div>

        <div class="col text-center">
            <button href="preencher_dec.php" type="submit" class="btn btn-success mt-5">Preencher declaração<br>
        </div>

    </div>

</div>