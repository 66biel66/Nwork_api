<?php

namespace App\Dao;

interface IWorkshopDao {
    public function insert($workshop);
    public function update($workshop);
    public function delete($id);
    public function selectAll();
    public function selectById($id);
}