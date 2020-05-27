<?php

use Lib\Database\Connection;


class Opcoes {
    private $opcoes = array();
    private $votos;

    public function createOpcoes($id_enquete) {
        $conn = Connection::getConn();
        try{
            $sql = 'insert into opcao (opcao, id_enquete) values(:opcao, :id_enquete);';
            $stmt = $conn->prepare($sql);
            foreach ($this->opcoes as $opcao) {
                $stmt->execute([
                    ':opcao'=> $opcao,
                    ':id_enquete'=> $id_enquete
                ]);
            }
            return;
        }catch (\Exception $e){
            var_dump($e);
        }

    }

    public function listOpcoes($id) {
        $conn = Connection::getConn();
        try{
            $sql = 'select Op.id, opcao, votos, id_enquete, status_enquete
                    from opcao as Op 
                    inner join enquete as E
                    on Op.id_enquete = E.id
                    where id_enquete = :id';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            if($stmt->rowCount()) {
                return $stmt;
            }
        } catch(\Exception $e) {
            var_dump($e);
        }
    }

    public function countVotos($id) {
        $conn = Connection::getConn();
        try{
            $sql = 'select votos from opcao where id = :id';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $votos = $stmt->fetch();

            if($votos["votos"] !== null) {
                $votos = intval($votos["votos"]);
                return $votos;
            }
            return 0;
        } catch(\Exception $e) {
            var_dump($e);
        }
    }

    public function votar($voto, $id) {
        $conn = Connection::getConn();
        try{
            $sql = 'Update opcao set votos = :voto where id = :id';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ":voto"=> $voto,
                ":id"=> $id
            ]);
            var_dump($stmt);

        } catch(\Exception $e) {
            var_dump($e);
        }
    }

    public function delete($id) {
        $conn = Connection::getConn();
        try{
            $sql = 'delete from opcao where id_enquete = :id';
            $stmt = $conn->prepare($sql);
            $result =  $stmt->execute([
                ':id'=>$id
            ]);
        }catch (\Exception $e) {
            var_dump($e);
        }
    }

    public function formatIdToEditOptions(){
        $idEnquete = explode('/', $_GET['url']);
        $idEnquete = end($idEnquete);
        return intval($idEnquete);
    }

    public function getOpcoes() {
        return $this->opcoes;
    }

    public function setOpcoes($opcoes) {
        $this->opcoes = $opcoes;
    }

    public function getVotos(){
        return $this->votos;
    }

    public function setVotos($voto){
        $this->votos = $voto;
    }
}