<?php

class Votante
{
    private $id;
    private $nome;
    private $idade;
    private $cpf;
    private $voto;
    private $msg;
    private $erro = [];

    public function __construct($nome, $cpf, $idade, $voto)
    {
        $this -> nome = $nome;
        $this -> cpf = $cpf;
        $this -> idade = $idade;
        $this -> voto = $voto;
    }

	public function getId()
    {
        return $this -> id;
    }
    public function setId($id){
        return $this -> id = $id;
    }

    public function getNome()
    {
        return $this -> nome;
    }
    public function setNome($nome){
        return $this -> nome = $nome;
    }
    
    public function getCpf()
    {
        return $this -> cpf;
    }
    public function setCpf($cpf){
        return $this -> cpf = $cpf;
    }

    public function getIdade()
    {
        return $this -> idade;
    }
    public function setIdade($idade){
        return $this -> idade = $idade;
    }

    public function getVoto()
    {
        return $this -> voto;
    }
    public function setVoto($voto){
        return $this -> voto = $voto;
    }
   
    public function getMsg()
    {
        return $this -> msg;
    }
    public function setMsg($msg){
        return $this -> msg = $msg;
    }
    public function getErro()
    { 
        return $this -> erro;
    }
    public function setErro($erro){
        return $this -> erro = $erro;
    }
    

    public function validarDados(){
        if (is_numeric($this -> nome)){
            $this->erro["erro_nome"] = "Nome Inválido!";
            $this->msg = "Nome Inválido!";

        }
        $this->cpf = str_replace(".","", $this->cpf);
        $this->cpf = str_replace("-","", $this->cpf);
        if(!is_numeric($this->cpf)){
            $this->erro["erro_cpf"] = "CPF Inválido!";
            $this->msg = "CPF Inválido!";
        }
        if($this->idade < 16 || $this-> idade > 100 || !is_numeric($this->idade)){
            $this->erro["erro_idade"] = "Idade Inválida!";
            $this->msg = "Idade Inválida!";
        }
        if (empty($this -> voto)){
            $this->erro["erro_voto"] = "Escolha um candidato!";
        }
        else if(empty($this->erro)){
            $this->msg = "Votação realizada!";
        }
    }
 }
