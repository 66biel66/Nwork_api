<?php

namespace App\Dao;

use App\Generic\MysqlFactory;

class WorkshopDAO implements IWorkshopDao {

    private $conexao;

    public function __construct() {
        $this->conexao = MysqlFactory::criarConexao();
    }

    public function insert($workshop) {
        $stmt = $this->conexao->prepare("INSERT INTO workshops (title, description, date) VALUES (:title, :description, :date)");
        $stmt->bindParam(':title', $workshop->title);
        $stmt->bindParam(':description', $workshop->description);
        $stmt->bindParam(':date', $workshop->date);
        return $stmt->execute();
    }

    public function update($workshop) {
        $stmt = $this->conexao->prepare("UPDATE workshops SET title = :title, description = :description, date = :date WHERE id = :id");
        $stmt->bindParam(':title', $workshop->title);
        $stmt->bindParam(':description', $workshop->description);
        $stmt->bindParam(':date', $workshop->date);
        $stmt->bindParam(':id', $workshop->id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conexao->prepare("DELETE FROM workshops WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function selectAll() {
        $stmt = $this->conexao->query("SELECT * FROM workshops");
        return $stmt->fetchAll();
    }

    public function selectById($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM workshops WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}