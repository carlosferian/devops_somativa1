<?php

class Emprestimo {
	private $id_emprestimo;
    private $id_coisa;
    private $nome_amigo;
	private $email_amigo;
	private $data_emprestimo;
	private $data_devolucao; 

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

?>