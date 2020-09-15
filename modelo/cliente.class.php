<?php
class Cliente{
  //atributos do da classe
  private $idCliente;
  private $nome;
  private $emailCliente;
  private $cpfCliente;
  private $cidade;
  private $estado;
  private $telefone;

  //metodos construtores
  public function __construct(){}
  public function __destruct(){}

  //entrada de dados
  public function __get($a){
    return $this->$a;
  }
  //saida de dados
  public function __set($a,$b){
    $this->$a=$b;
  }

  public function __toString(){
    nl2br("idCliente:$this->idCliente
           Nome: $this->nome
           CPF: $this->cpf_cliente
           Cidade: $this->cidade
           Estado: $this->estado
           Telefone: $this->telefone");
  }
}
