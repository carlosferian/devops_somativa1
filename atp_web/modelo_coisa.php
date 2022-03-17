<?php

class Coisa {
	private $id_coisa;
	private $id_dono;
	private $nome_coisa;
	private $status_emprestimo;
	

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

?>