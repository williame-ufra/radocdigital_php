<?php

require_once __DIR__ . '/../classes/class.Conexao.php';

class Aula
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
        // $oConexao = new Conexao();
        $oConexao = new Conexao();
        $vsDados = $this->oConexao->recupera("aula", $vsDados);
        if ($vsDados)
            return $vsDados;

        return false;
    }

    function recuperaTodos($vsDados = array(), $sCampoOrdem = "")
    {
        // $oConexao = new Conexao();
        $oConexao = new Conexao();
        $vvDados = $oConexao->recuperaTodos("aula", $vsDados, $sCampoOrdem);
        return $vvDados;
    }

    function presente($vsDados)
    {
        // $oConexao = new Conexao();
        $oConexao = new Conexao();
        $bResultado = $oConexao->presente("aula", $vsDados);
        return $bResultado;
    }

    function insere($vsDados)
    {
        // $oConexao = new Conexao();
        // print_r($vsDados);die;
        $oConexao = new Conexao();
        $nId = $oConexao->insere("aula", $vsDados);
        return $nId;
    }

    function altera($vsDados, $vsTransacao = array())
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->altera("aula", $vsDados);
        return $bResultado;
    }

    function exclui($vsDados, $vsTransacao = array())
    {
        $oConexao = new Conexao();
        $bResultado = $oConexao->exclui("aula", $vsDados);
        return $bResultado;
    }
}
