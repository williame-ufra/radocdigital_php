<?php

require_once __DIR__ . '/../classes/class.Conexao.php';

class CalculoSemanal
{

    private Conexao $oConexao;

    public function __construct(string $sBanco = 'LOCAL')
    {
        $this->oConexao = new Conexao($sBanco);
    }


    function setConexao($oConexao)
    {
        $this->oConexao = $oConexao;
    }

    function getConexao()
    {
        return $this->oConexao;
    }

    function recupera($vsDados = array())
    {
        $oConexao = new Conexao();
        $vsDados = $this->oConexao->recupera("calculo_semanal", $vsDados);
        if ($vsDados)
            return $vsDados;

        return false;
    }

    function recuperaTodos($vsDados = array(), $sCampoOrdem = "")
    {
        $oConexao = new Conexao();
        $vvDados = $oConexao->recuperaTodos("calculo_semanal", $vsDados, $sCampoOrdem);
        return $vvDados;
    }

    function presente($vsDados)
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->presente("calculo_semanal", $vsDados);
        return $bResultado;
    }

    function insere($vsDados)
    {
        $oConexao = new Conexao();
        $nId = $oConexao->insere("calculo_semanal", $vsDados);
        return $nId;
    }

    function altera($vsDados, $vsTransacao = array())
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->altera("calculo_semanal", $vsDados);
        return $bResultado;
    }

    function exclui($vsDados, $vsTransacao = array())
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->exclui("calculo_semanal", $vsDados);
        return $bResultado;
    }
}
