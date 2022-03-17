<?php

class Usuario {
	private $id;
	private $nome;
    private $email; 
    private $senha;
	private $cpf;
	private $status_administrador;
    

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

?>