<?php
namespace AppWsusu\Repositories;
use AppWsusu\Repositories\BaseRepo;
class ConsultaRepo extends BaseRepo{
	function index(){
		return \View::make('wsusu.consumo'); 
	}
	function listar(){
		$this->getInputs();
		$this->existsInput('fechaini','');
		$this->existsInput('fechafin','');
		$this->existsInput('entidad','');
		$this->existsInput('numdoc','');
		//return dd($this->inputs);
		$sql = 'TEST.USP_CONSULTAS_LISTAR (:FECHAINI,:FECHAFIN,:ENTIDAD,:NUMDOC,:P_REFCURSOR)';
		$params = array( 
			array('parametro'=>':FECHAINI',	'valor'=>strtoupper($this->inputs['fechaini']),	'tipo_parametro'=>\PDO::PARAM_STR), 
			array('parametro'=>':FECHAFIN',	'valor'=>strtoupper($this->inputs['fechafin'])	,	'tipo_parametro'=>\PDO::PARAM_STR), 
			array('parametro'=>':ENTIDAD',	'valor'=>strtoupper($this->inputs['entidad']),	'tipo_parametro'=>\PDO::PARAM_STR), 
			array('parametro'=>':NUMDOC',	'valor'=>strtoupper($this->inputs['numdoc'])	,	'tipo_parametro'=>\PDO::PARAM_STR), 
			array('parametro'=>':P_REFCURSOR','tipo_parametro'=>\PDO::PARAM_STMT) 
		);
		return $this->getResultado($sql,$params);		
	}	
}