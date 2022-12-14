<?php

require_once('app/Database/ConexaoDB.php');

class ControllerVotante
{
    public function createVotante(Votante $votante){
        try{
            $insertVotante = "INSERT INTO votante (nome, cpf, idade, voto) VALUES (:nome, :cpf, :idade, :voto)";
            $stmt = ConexaoDB::getConn()->prepare($insertVotante);
            $stmt->bindValue(':nome', $votante->getNome());
            $stmt->bindValue(':cpf', $votante->getCpf());
            $stmt->bindValue(':idade', $votante->getIdade());
            $stmt->bindValue(':voto', $votante->getVoto());
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readVotante(){
        
        try{
            $queryVotante = "SELECT * FROM votante";
            $stmt = ConexaoDB::getConn()->prepare($queryVotante);
            $stmt->execute();


            if($stmt->rowCount()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

    class Votos{
        public function resultadoZuck(){
                try{
                    $queryVoto = "SELECT count(voto) AS totalVotos FROM votante WHERE voto='222'";
                    $stmt = ConexaoDB::getConn()->prepare($queryVoto);
                    $stmt->execute();
                    if($stmt->rowCount()){
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $result["totalVotos"];
                    }
                }catch(PDOException $e){
            echo $e->getMessage();
        }
        }   
        public function resultadoGates(){
            try{
                $queryVoto = "SELECT COUNT(voto) AS totalVotos FROM votante WHERE voto='111'";
                $stmt = ConexaoDB::getConn()->prepare($queryVoto);
                $stmt->execute();
                if($stmt->rowCount()){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result["totalVotos"];
                }
            }catch(PDOException $e){
        echo $e->getMessage();
    }
    }

}

?>