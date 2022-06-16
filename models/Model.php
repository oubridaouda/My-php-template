<?php

namespace Models;

use Database\DbConnection;
use PDO;

abstract class Model
{

    protected $db;
    protected $table;

    //Initilisation de l'instance de connexion
    public function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    //function pour faire une query select sur un model
    public function all(): array
    {
        $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY publishdate DESC");
        $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        return $query->fetchAll();
    }

    //Methode pour recuperer des produits par leurs id
    public function findById($id): Model
    {
        $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} WHERE product_id = {$id}");
        $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $query->execute([$id]);
        return $query->fetch();
    }

    //Methode pour recuperer les produits d'un utilisateur par leurs id
    public function findUserProductById($id): array
    {
        $query = $this->db->getPDO()->query("SELECT * FROM all_products p INNER JOIN {$this->table} u  ON u.id = p.id_of_user WHERE id = {$id}");
        $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function create(array $data, array $img)
    {

        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;
        $target_dir = "C:\laragon\www\Ecommerce\image/";
        $target_file = $target_dir . basename($img["image"]["name"]);

        //conttruction de la réquète avec la boucle en recuperant les $data par post
        foreach ($data as $key => $value) {
            $comma = $i == count($data) ? "" : ",";
            //initialiser toute les proprieter avec leur donnée correspondant
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        if (move_uploaded_file($img["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($img["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        //Requete d'insertion d'un produit
        return $this->query("INSERT INTO {$this->table} ($firstParenthesis,image, id_of_user) VALUES ('" . $data['title_product'] . "','" . $data['price'] . "','" . $data['description'] . "','" . $img["image"]["name"] . "','" . $_SESSION['auth'] . "')", $data);

    }

    //Methode de mis à jours de produit

    public function query(string $sql, array $param = null, bool $single = null)
    {

        if (strpos($sql, 'DELETE') == 0 || strpos($sql, 'UPDATE') == 0 || strpos($sql, 'CREATE') == 0) {
            $method = is_null($param) ? 'query' : 'prepare';

            $query = $this->db->getPDO()->$method($sql);
            $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $query->execute($param);
        }
    }

    //Methode de suppression de produit

    public function update(array $data)
    {
        $sqlRequestPart = "";
        $i = 1;

        //conttruction de la réquète avec la boucle en recuperant les $data par post
        foreach ($data as $key => $value) {
            $comma = $i == count($data) ? " " : ", ";
            //initialiser toute les proprieter avec leur donnée correspondant
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }


        return $this->query("UPDATE ($this->table) SET {$sqlRequestPart},update_date = UTC_TIMESTAMP  WHERE product_id = :product_id", $data);
    }

    //Methode query pour executer les requete sql

    public function destroy($id): bool
    {
        return $this->query("DELETE FROM all_products WHERE product_id = ?", [$id]);

    }

}