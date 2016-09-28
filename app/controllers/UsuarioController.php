<?php
use AppWsusu\Repositories\UsuarioRepo;
class UsuarioController extends Controller {
	public $usuarioRepo;
	public function __construct(UsuarioRepo $usuarioRepo){
		$this->usuarioRepo = $usuarioRepo;
	}
	public function index(){
		return $this->usuarioRepo->index();
	}
	public function listar(){
		return $this->usuarioRepo->listar();
	}
	public function add(){
		return $this->usuarioRepo->add();
	}
	public function edit($id){
		return $this->usuarioRepo->edit($id);
	}	
}
