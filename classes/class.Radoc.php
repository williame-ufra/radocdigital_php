<?php

require_once __DIR__ . '/../classes/class.Conexao.php';

class Radoc
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
        $vsDados = $this->oConexao->recupera("radoc", $vsDados);
        if ($vsDados)
            return $vsDados;

        return false;
    }

    function recuperaTodos($vsDados = array(), $sCampoOrdem = "")
    {
        $oConexao = new Conexao();
        $vvDados = $oConexao->recuperaTodos("radoc", $vsDados, $sCampoOrdem);
        return $vvDados;
    }

    function presente($vsDados)
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->presente("radoc", $vsDados);
        return $bResultado;
    }

    function insere($vsDados)
    {
        $oConexao = new Conexao();
        $nId = $oConexao->insere("radoc", $vsDados);
        return $nId;
    }

    function altera($vsDados, $vsTransacao = array())
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->altera("radoc", $vsDados);
        return $bResultado;
    }

    function exclui($vsDados, $vsTransacao = array())
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->exclui("radoc", $vsDados);
        return $bResultado;
    }
}
