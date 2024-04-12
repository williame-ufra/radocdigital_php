<?php

require_once __DIR__ . '/../classes/class.Conexao.php';

class Docente
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
        $oConexao = $this->getConexao();
        $vsDados = $this->oConexao->recupera("docente", $vsDados);
        if ($vsDados)
            return $vsDados;

        return false;
    }

    function recuperaTodos($vsDados = array(), $sCampoOrdem = "")
    {
        $oConexao = $this->getConexao();
        $vvDados = $oConexao->recuperaTodos("docente", $vsDados, $sCampoOrdem);
        return $vvDados;
    }

    function presente($vsDados)
    {
        $oConexao = $this->getConexao();
        $bResultado = $oConexao->presente("docente", $vsDados);
        return $bResultado;
    }

    function insere($vsDados)
    {
        $oConexao = $this->getConexao();
        $nId = $oConexao->insere("docente", $vsDados);
        return $nId;
    }

    function altera($vsDados, $vsTransacao = array())
    {
        $oConexao = $this->getConexao();
        $bResultado = $oConexao->altera("docente", $vsDados);
        return $bResultado;
    }

    function exclui($vsDados, $vsTransacao = array())
    {
        $oConexao = $this->getConexao();
        $bResultado = $oConexao->exclui("docente", $vsDados);
        return $bResultado;
    }
}
