<?php
namespace AppWsusu\Repositories;
use AppWsusu\Repositories\BaseRepo;
class UsuarioRepo extends BaseRepo{
	function index(){
		return \View::make('wsusu.listausuario'); 
	}
	function listar(){
		$this->getInputs();
		$this->existsInput('codacceso','');
		$this->existsInput('nivel','');
		$this->existsInput('entidad','');
		//return dd($this->inputs);
		$sql = 'TEST.USP_USUARIO_WEB_LISTAR (:CODIGO,:NIVEL,:ENTIDAD,:P_REFCURSOR)';
		$params = array( 
			array('parametro'=>':CODIGO',	'valor'=>strtoupper($this->inputs['codacceso']),	'tipo_parametro'=>\PDO::PARAM_STR), 
			array('parametro'=>':NIVEL',	'valor'=>strtoupper($this->inputs['nivel'])	,	'tipo_parametro'=>\PDO::PARAM_STR), 
			array('parametro'=>':ENTIDAD',	'valor'=>strtoupper($this->inputs['entidad']),	'tipo_parametro'=>\PDO::PARAM_STR), 
			array('parametro'=>':P_REFCURSOR','tipo_parametro'=>\PDO::PARAM_STMT) 
		);
		return $this->getResultado($sql,$params);		
	}
	function add(){
		$this->getInputs();
		$sql = 'TEST.USP_USUARIO_WEB_AGREGAR (:DES_LOG,:DES_PAS,:DES_ENT,:MAX_MIN,:MAX_HOR,:MAX_DIA,:MAX_MES,:NIVEL_CONSULTA,:IDX_USUA_CREA,:ID_PERSONA,:FEC_USUA_CREA,:DES_TERM_CREA,:BIT_ESTADO,:DES_ENT_LARGA,:DES_ENLACE,:RUT_CONVENIO,:FEC_CONVENIO,:P_REFCURSOR)';

		$params = array(
			array('parametro'=>':DES_LOG',			'valor'=>$this->inputs['DES_LOG'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_PAS',			'valor'=>$this->inputs['DES_PAS'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_ENT',			'valor'=>$this->inputs['DES_ENT'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':MAX_MIN',			'valor'=>$this->inputs['MAX_MIN'],	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':MAX_HOR',			'valor'=>$this->inputs['MAX_HOR'],	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':MAX_DIA',			'valor'=>$this->inputs['MAX_DIA'],	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':MAX_MES',			'valor'=>$this->inputs['MAX_MES'],	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':NIVEL_CONSULTA',	'valor'=>$this->inputs['NIVEL_CONSULTA'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':IDX_USUA_CREA',	'valor'=>1,	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':ID_PERSONA',		'valor'=>1,	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':FEC_USUA_CREA',	'valor'=>date('Y-m-d'),	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_TERM_CREA',	'valor'=>'::1',	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':BIT_ESTADO',		'valor'=>'1',	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_ENT_LARGA',	'valor'=>$this->inputs['DES_ENT_LARGA'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_ENLACE',		'valor'=>$this->inputs['DES_ENLACE'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':RUT_CONVENIO',		'valor'=>'',	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':FEC_CONVENIO',		'valor'=>$this->inputs['FEC_CONVENIO'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':P_REFCURSOR','tipo_parametro'=>\PDO::PARAM_STMT) 
		);
		return $this->getResultado($sql,$params);

	}
	function edit($id){
		$this->getInputs();
		$sql = 'TEST.USP_USUARIO_WEB_EDITAR (:ID_USUA_WEB,
		:DES_LOG,
		:DES_PAS,
		:DES_ENT,
		:MAX_MIN,
		:MAX_HOR,
		:MAX_DIA
		,:MAX_MES
		,:NIVEL_CONSULTA
		,:IDX_USUA_MOD
		,:ID_PERSONA
		,:FEC_USUA_MOD
		,:DES_TERM_MOD
		,:BIT_ESTADO
		,:DES_ENT_LARGA
		,:DES_ENLACE
		,:RUT_CONVENIO
		,:FEC_CONVENIO
		,:P_REFCURSOR)';

		$params = array(
			array('parametro'=>':ID_USUA_WEB',		'valor'=>$id,							'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':DES_LOG',			'valor'=>$this->inputs['DES_LOG'],		'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_PAS',			'valor'=>$this->inputs['DES_PAS'],		'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_ENT',			'valor'=>$this->inputs['DES_ENT'],		'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':MAX_MIN',			'valor'=>$this->inputs['MAX_MIN'],		'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':MAX_HOR',			'valor'=>$this->inputs['MAX_HOR'],		'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':MAX_DIA',			'valor'=>$this->inputs['MAX_DIA'],		'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':MAX_MES',			'valor'=>$this->inputs['MAX_MES'],		'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':NIVEL_CONSULTA',	'valor'=>$this->inputs['NIVEL_CONSULTA'],'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':IDX_USUA_MOD',		'valor'=>1,	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':ID_PERSONA',		'valor'=>1,	'tipo_parametro'=>\PDO::PARAM_INT),
			array('parametro'=>':FEC_USUA_MOD',		'valor'=>date('y-m-d'),	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_TERM_MOD',		'valor'=>'::1',	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':BIT_ESTADO',		'valor'=>$this->inputs['BIT_ESTADO'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_ENT_LARGA',	'valor'=>$this->inputs['DES_ENT_LARGA'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':DES_ENLACE',		'valor'=>$this->inputs['DES_ENLACE'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':RUT_CONVENIO',		'valor'=>'',	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':FEC_CONVENIO',		'valor'=>$this->inputs['FEC_CONVENIO'],	'tipo_parametro'=>\PDO::PARAM_STR),
			array('parametro'=>':P_REFCURSOR','tipo_parametro'=>\PDO::PARAM_STMT) 
		);

		//return $params;
		return $this->getResultado($sql,$params);
	}
}