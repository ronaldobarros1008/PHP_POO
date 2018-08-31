<?php

/**
 * Description of CrudUser
 *
 * @author ronaldo.silva
 */
require_once 'DB.php';

abstract class CrudUser extends DB {
    
    protected $tabela;
    public $nome;
    public $email;
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }
    
    
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    
}
