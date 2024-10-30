<?php

class MySQLConn{
    private $servidor;
    private $usuario;
    private $clave;
    private $basededatos;

    public function __construct($servidor_, $usuario_, $clave_, $basededatos_){
        $this->servidor = $servidor_;
        $this->usuario = $usuario_;
        $this->clave = $clave_;
        $this->basededatos = $basededatos_;
    }

    public function Conectar(){
        $conn = new PDO("mysql:host=".$this->servidor.";dbname=".$this->basededatos, 
                        $this->usuario, 
                        $this-> clave
                    );

        return $conn;
    }
}

?>