<?php

namespace Models;

class Message extends Model
{
//nom de table lié au model
    protected $table = 'message';

    public function getAllMessage(int $firstElement = 0, int $limit = 10)
    {

        $query = $this->db->getPDO()->query("SELECT * FROM cool ORDER BY create_at DESC LIMIT {$firstElement},{$limit}");
        $query->execute();
        return $query->fetchAll();

    }

    public function countMessage(int $page = 1, int $limit = 10): array
    {
        $pagination = [];
        $query = $this->db->getPDO()->query("SELECT COUNT(*) FROM {$this->table}");
        $query->execute();
        $result = $query->fetchAll();
        //Le nombre de page
        foreach ($result[0] as $value) {
            $pagination['number_of_page'] = $value / $limit;
        };
        //La page courante
        $res = ($page - 1) * $limit;
        $pagination['current_page'] = $res;
//        var_dump($pagination['number_of_page']);
//        exit;

        return $pagination;
    }

    public function messageRead(int $id = 1, array $data=[])
    {
        return $this->query("UPDATE {$this->table} SET read_message = 1 WHERE id_message =  {$id} ", []);
    }
}