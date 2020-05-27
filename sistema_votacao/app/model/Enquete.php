<?php

use Lib\Database\Connection;

class Enquete {
    private $id;
    private $titulo;
    private $data_inicio;
    private $data_fim;
    private $descricao;
    private $status;
    public function createEnquete() {
        $conn = Connection::getConn();
        try{
            $sql = 'insert into enquete (titulo, data_inicio, data_fim, descricao, status_enquete)
                    VALUES(:titulo, :data_inicio, :data_fim, :descricao, :status)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
               ':titulo'=> $this->titulo,
               ':data_inicio'=> $this->data_inicio,
               ':data_fim'=> $this->data_fim,
               ':descricao'=> $this->descricao,
               ':status'=> $this->status
            ]);
            $this->id = $conn->lastInsertId();

            return $this->id;

        }catch(\Exception $e){
            var_dump($e);
        }
    }

    public function listEnquetes() {
        $conn = Connection::getConn();
        try{
            $sql = 'select * from enquete';
            $result = $conn->query($sql);
            return $result;
        } catch(\Exception $e) {
            var_dump($e);
        }
    }

    public function delete($id) {
        $conn = Connection::getConn();
        try {
            $sql = 'delete from enquete where id = :id';
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ':id'=> $id
            ]);
        }catch (\Exception $e) {
            var_dump($e);
        }
        return false;

    }

    public function verifyStatus($dateIni, $dateFim)  {
        $currentDate = date('d-m-Y');
        $currentDate = strtotime($currentDate);
        $dateIni = strtotime($dateIni);
        $dateFim = strtotime($dateFim);

        if($dateIni > $currentDate) {
            return "Não iniciado";
        }

        else if($dateFim < $currentDate){
            return "Finalizado";
        }

        return "Em andamento";
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDataInicio() {
        return $this->data_inicio;
    }

    public function setDataInicio($data) {
        $this->data_inicio = $data;
    }

    public function getDataFim() {
        return $this->data_fim;
    }

    public function setDataFim($data) {
        $this->data_fim = $data;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}