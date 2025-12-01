<?php

namespace App\Service;

use App\Dao\WorkshopDao;

class WorkshopService {
    private $Dao;
    public function __construct() {
        $this->Dao = new WorkshopDao();
    }
    public function listarWorkshops() {
        
        try {return $this->Dao->selectAll();}
        catch (\Exception $e) {
            throw new \Exception("Erro ao listar workshops: " . $e->getMessage());
        }
    }
    public function selectById($id) {
        try {
            $w = $this->Dao->selectById($id);
            if(!$w)
                throw new \Exception("Workshop não encontrado.");
                return $w; 
            }
            catch(\Exception $e)
            {
                    throw $e;
            }
        }
    public function criarWorkshop($data) {
        try {
            if(empty($data['title'])) throw new \Exception("Título é obrigatório.");
            $w = (object)[
                'title' => $data['title'],
                'description' => $data['description'] ??  null,
                'date' => $data['date'] ?? null,
                'capacity' => $data['capacity'] ?? null,
                'created_By' => $data['created_By'] ?? null
            ];
            return $this->Dao->insert($w);
            } catch (\Exception $e) {
            throw new \Exception("Erro ao criar workshop: " . $e->getMessage());
            }
    }
    public function atualizarWorkshop($id, $data) {
        try {
            if(empty($data['ID'])) throw new \Exception("ID é obrigatório.");
            $w = (object)[
                'id' => $id,
                'title' => $data['title'],
                'description' => $data['description'] ??  null,
                'date' => $data['date'] ?? null,
                'capacity' => $data['capacity'] ?? null,
                'created_By' => $data['created_By'] ?? null
            ];
            return $this->Dao->update($w);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar workshop: " . $e->getMessage());
        }
    }
    public function deletarWorkshop($id) {
        try {
            return $this->Dao->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao deletar workshop: " . $e->getMessage());
        }
    }

}

