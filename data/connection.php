<?php 
    function connection(){

        $connection = new mysqli("localhost","root","","reportreturn",3306);
    
        //Verifica se existe um erro de conexão
        if($connection->connect_errno){
            echo "Erro de conexão, codigo: ".$connection->connect_errno;
        } 
    
        //retorna a connection
        return $connection;
    }
    
?>