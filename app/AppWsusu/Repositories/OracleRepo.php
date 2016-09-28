<?php
namespace AppWsusu\Repositories;
class OracleRepo{
	private $pdo;
	private $stmt;
	private $arResult;
	private $sql;
	private $connection = 'oracle_sisad';
	public function setPdo(){
		$this->pdo = \DB::connection($this->connection)->getPdo();
	}
	public function setSql($sql){
		$this->sql = 'begin '.$sql.'; end;';
	}
	function setConexion($conexion){
		$this->connection = $conexion;
	}
	function getLista($sql,$paramLista = ':pTabResultado'){
		$this->setPdo();
		$this->setSql($sql);
		$this->stmt = $this->pdo->prepare($this->sql);
		$this->stmt->bindParam($paramLista, $lista, \PDO::PARAM_STMT);
		$this->stmt->execute();
       	oci_execute($lista, OCI_DEFAULT);
       	oci_fetch_all($lista, $this->arResult, 0, -1, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC );
       	oci_free_cursor($lista);
       	return $this->arResult;	
	}
	function getResultado($sql,$params = array(),$resultadoCursor = true,$debug = false){
		$this->setPdo();
		$this->setSql($sql);
		$this->stmt = $this->pdo->prepare($this->sql);
		foreach($params as $key => $p){
			if($p['tipo_parametro'] === \PDO::PARAM_STMT){
				$this->stmt->bindParam($p['parametro'], $lista, $p['tipo_parametro']);
			}
			else{
				$this->stmt->bindParam($p['parametro'], $p['valor'], $p['tipo_parametro']);
			}
		}
		$this->stmt->execute();
		//return print_r($this->stmt);
		if($resultadoCursor){
	       	oci_execute($lista, OCI_DEFAULT);
	       	oci_fetch_all($lista, $this->arResult, 0, -1, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC );
	       	oci_free_cursor($lista);			
		}
		return $this->arResult;
	}
/*	function uploadFileBD($nombreCampo,$numFile = -1){
			$this->setConexion('oracle_rgyt');
			$this->setPdo();
			$sequence = \DB::connection($this->connection)->getSequence();
			$idBlob = $sequence->nextValue('SQ_RUTA_ARCHIVO');
	        $this->nombreCampo = $nombreCampo;
			$this->numFile = $numFile;
            if($this->numFile == -1){
            	$name = \Input::file($this->nombreCampo)->getClientOriginalName();
            }else{
            	$name = \Input::file($this->nombreCampo)[$this->numFile]->getClientOriginalName();
            }		        
			$this->setSql("INSERT INTO RUTA_ARCHIVO (IDX_RUTA_ARCHIVO,NOM_ARCHIVO,DES_RUTA,ARC_PADRON) VALUES (".$idBlob.",'".$name."','',EMPTY_BLOB()) RETURNING ARC_PADRON INTO :blob");
	        $sql = $this->sql;
			\DB::connection($this->connection)->transaction(function($conn) use ($sql){
	                $pdo = $conn->getPdo();
	                $stmt = $pdo->prepare($sql);
	                $stmt->bindParam(':blob', $arFilesA, \PDO::PARAM_LOB);
	                
	                $stmt->execute();
	                if($this->numFile == -1){
	                	$arFilesA->save(file_get_contents(\Input::file($this->nombreCampo)->getRealPath()));
	                }else{
	                	$arFilesA->save(file_get_contents(\Input::file($this->nombreCampo)[$this->numFile]->getRealPath()));
	                }	            
            });
			return $idBlob;	
	        //return $arFilesA;		
	}*/
}