<?php

namespace Models;

class Exchanger extends Model
{
//nom de table lié au model
    protected $table = 'exchanger';

    public function getAllTopExchanger()
    {

        $query = $this->db->getPDO()->query("SELECT country,city,website,exchanger_alias,name,SUM(number_visit) AS number_visit,id FROM currency_pair c INNER JOIN exchanger_pair ep ON c.id_cp = ep.fk_c_pair INNER JOIN {$this->table} e ON ep.fk_exchanger = e.id GROUP BY website,name,exchanger_alias,id,country,city ORDER BY e.best DESC");
        $query->execute();
        return $query->fetchAll();

    }

    public function getAllExchanger(string $id = null)
    {

        if ($id != null) {
            $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} WHERE exchanger_alias = '" . $id . "'");
        } else {
            $query = $this->db->getPDO()->query("SELECT * FROM {$this->table}");
        }
        $query->execute();
        return $query->fetchAll();

    }
}