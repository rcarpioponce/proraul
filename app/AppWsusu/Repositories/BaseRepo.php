<?php
namespace AppWsusu\Repositories;
use AppWsusu\Repositories\OracleRepo;
class BaseRepo extends OracleRepo{
	public function __construct($connection = 'oracle'){
		parent::setConexion($connection);
		$this->regXpages 	= 15;
		$this->distancePage = 3;
		$this->inputs = array();
	}
	public function getInputs(){
		$this->inputs = \Input::all();
	}
	public function existsInput($key, $newValue = NULL){
		if(!isset($this->inputs[$key])){
			$this->inputs[$key] = $newValue;	
		} 
	}
	public function getPaginator(){
		$residuo = 0;
		if(($this->totalReg % $this->numXpages) > 0){
			$residuo = 1;
		}
		$paginaActual = isset($this->inputs['page']) ? intval($this->inputs['page']) : 1;
		$prev = $paginaActual - 1;
		$next = $paginaActual + 1;
		$totalPaginas = intval($this->totalReg / $this->numXpages) + $residuo;
		$paginaInicial = ($paginaActual - $this->distancePag) > 0  ? $paginaActual - 3 : 1;
		$paginaFin = ($paginaActual + $this->distancePag) <= $totalPaginas  ? $paginaActual + $this->distancePag : $totalPaginas;
		$this->paginador = array(
			'totaReg' 		=> 	$this->totalReg,
			'paginaActual'	=> 	$paginaActual,
			'prev' 			=> 	$prev,
			'next' 			=> 	$next,
			'paginaInicial'	=> 	$paginaInicial,
			'paginaFin' 	=> 	$paginaFin,
			'totalPaginas' 	=> 	$totalPaginas,
			'regxPagina'	=> 	$this->numXpages
		);
		return $this->paginador;		
	}		
}