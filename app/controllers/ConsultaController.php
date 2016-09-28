<?php
use AppWsusu\Repositories\ConsultaRepo;
class ConsultaController extends Controller {
	public $consultaRepo;
	public function __construct(ConsultaRepo $consultaRepo){
		$this->consultaRepo = $consultaRepo;
	}
	public function index(){
		return $this->consultaRepo->index();
	}
	public function listar(){
		return $this->consultaRepo->listar();
	}	
}
