<?php

require_once __DIR__ . '/../includes/constantes.php';

class Conexao {
    private $pConexao;
    private $pConsulta;
    private $sErro;
    private $sServidor;

    public function __construct(string $sServidor = 'LOCAL') {
        // $this->setServidor($sServidor);
        // print_r('LOCAL');die;
        switch ($sServidor) {
            case 'LOCAL':
                $this->conectaBD(BANCO_LOCAL_URL, BANCO_LOCAL_ROOT, BANCO_LOCAL_PASS, BANCO_LOCAL_NOME);
                break;
            case 'ONLINE':
                $this->conectaBD(BANCO_ONLINE_URL, BANCO_ONLINE_ROOT, BANCO_ONLINE_PASS, BANCO_ONLINE_NOME);
                break;
            default:
                die("Não foi possível conectar ao servidor: $sServidor");
                break;
        }
    }

    private function conectaBD(string $sHost, string $sUser, string $sSenha, string $sBanco) {
        $this->pConexao = mysqli_connect($sHost, $sUser, $sSenha) or die("Erro de conexão");
        mysqli_select_db($this->pConexao, $sBanco);
    }

    public function execute(string $sSql) {
        $this->pConsulta = mysqli_query($this->getConexao(), $sSql);
        if (!$this->getConsulta()) {
            $this->sErro = "Ocorreu o seguinte erro na consulta: " . mysqli_error($this->getConexao());
        }
    }

	function insere($sTabela, $vsDados) {
		$this->execute("describe $sTabela");
		$vsDadosFinal = [];
		while ($vsReg = $this->fetchArray()) {
			if ($vsReg["Extra"] !== "auto_increment") {
				$vsDadosFinal[$vsReg["Field"]] = $this->escapeString($vsDados[$vsReg["Field"]]);
			}
		}
		
		$vsCampoDefault = array_keys($vsDadosFinal);
		$vsSql["campos"] = implode(",", $vsCampoDefault);
		$vsSql["dados"] = implode("','", $vsDadosFinal);
		
		$sSql = "insert into $sTabela (" . $vsSql["campos"] . ") values ('" . $vsSql["dados"] . "')";
		// print_r($sSql);die;
		$this->execute($sSql);
		$nId = $this->getLastId();
	
		if ($nId) {
			return $nId;
		}
	
		return $this->getConsulta();
	}

    function getLastId(){
		return mysqli_insert_id($this->getConexao());
	}

    function recupera($sTabela,$vsDados=array()) {
		if(count($vsDados)) {
            $sSqlWhere = '';
            $sAnd = '';
			foreach($vsDados as $sNomeCampo => $sCampoChave) {

				$sSqlWhere .= "$sAnd $sNomeCampo = '$sCampoChave' ";	
				$sAnd = "and";
			}
		}
		
		$sSql = "select * from $sTabela where $sSqlWhere ";		
		// echo $sSql."<br>";die;
		$this->execute($sSql);
		$vsDados = $this->fetchArray();
		
		if ($vsDados)
			return $vsDados;

		return false;
	}

    public function recordCount(): int {
        return (int) mysqli_num_rows($this->getConsulta());
    }

    public function fetchObject() {
        return mysqli_fetch_object($this->getConsulta());
    }

    public function fetchArray() {
        return mysqli_fetch_assoc($this->getConsulta());
    }

    public function close() {
        mysqli_close($this->getConexao());
    }

    private function getConexao() {
        return $this->pConexao;
    }

    private function getConsulta() {
        return $this->pConsulta;
    }

    public function getErro() {
        return $this->sErro;
    }

    private function setServidor($sServidor) {
        $this->sServidor = $sServidor;
    }

    public function getServidor() {
        return $this->sServidor;
    }

    public function escapeString(string $sAtributo) {
        return mysqli_escape_string($this->pConexao, $sAtributo);
    }

    public function unescapeString(string $sEscapedString) {
        if (preg_match("/.*\\'.*/", $sEscapedString)) {
            $sEscapedString = str_replace("'", "''", $sEscapedString);
        }
        return $sEscapedString;
    }

    function recuperaTodos($sTabela,$vsDados=array(),$sCampoOrdem="") {
		$sSqlWhere = "  ";
		if(count($vsDados)) {
            $sAnd = '';
			foreach($vsDados as $sNomeCampo => $sCampoChave) {
				$sSqlWhere .= "$sAnd $sNomeCampo = '$sCampoChave' ";
				$sAnd = "and";
			}
		}

		$sSql = "select * from $sTabela $sSqlWhere";
		$sSql .= ($sCampoOrdem) ? " order by $sCampoOrdem" : "";
		// print_r($sSql);die;
		$this->execute($sSql);

		while($vsDados = $this->fetchArray())
			$vvDados[] = $vsDados;

		if(count($vvDados))
			return $vvDados;

		return array();
	}

    function presente($sTabela,$vsDados) {
		if(count($vsDados)) {
            $sAnd = '';
            $sSqlWhere = '';
			foreach($vsDados as $sNomeCampo => $sCampoChave) {
				$sSqlWhere .= "$sAnd $sNomeCampo = '$sCampoChave' ";	
				$sAnd = "and";
			}
		}
		
		$sSql = "select * from $sTabela where $sSqlWhere ";		
		$this->execute($sSql);
		
		if($this->getConsulta())
			return ($this->recordCount() > 0);	
			
		return false;	
	}

	function altera($sTabela, $vsDados) {
		$vsDadosFinal = [];
		$vsCampoChave = [];
	
		$this->execute("DESCRIBE $sTabela");
	
		while ($vsReg = $this->fetchArray()) {
			if ($vsReg["Key"] != "PRI" && isset($vsDados[$vsReg["Field"]])) {
				$vsDadosFinal[$vsReg["Field"]] = 
				$this->escapeString($vsDados[$vsReg["Field"]]);
			} elseif (isset($vsDados[$vsReg["Field"]])) {
				$vsCampoChave[$vsReg["Field"]] = $this->escapeString($vsDados[$vsReg["Field"]]);
			}
		}
	
		$sSqlSet = '';
		foreach ($vsDadosFinal as $sNomeCampo => $sDados) {
			$sSqlSet .= ", $sNomeCampo = '$sDados'";
		}
		$sSqlSet = ltrim($sSqlSet, ',');
	
		$sSqlWhere = '';
		foreach ($vsCampoChave as $sNomeCampo => $sCampoChave) {
			$sSqlWhere .= " AND $sNomeCampo = '$sCampoChave'";
		}
		$sSqlWhere = ltrim($sSqlWhere, ' AND');
	
		$sSql = "UPDATE $sTabela SET $sSqlSet WHERE $sSqlWhere";
		// print_r($sSql);die;
		$this->execute($sSql);
	
		return $this->getConsulta();
	}

    function exclui($sTabela,$vsDados) {
		if(count($vsDados)) {
            $sAnd = ',';
            $sSqlWhere = '';
			foreach($vsDados as $sNomeCampo => $sCampoChave) {
				$sSqlWhere .= "$sAnd $sNomeCampo = '$sCampoChave' ";	
				$sAnd = "and";
			}
		}

		$sSql = "delete from $sTabela where $sSqlWhere ";     
		$this->execute($sSql);
		
		return $this->getConsulta();
	}
}