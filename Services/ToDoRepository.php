<?php

namespace Repository;

use \PDO;

class ToDoRepository{

    private $connection;

    public function __construct(PDO $connection = null){
        $this->connection = $connection;
        if ($this->connection === null){
            $this->connection = new PDO(
                'mysql:host=127.0.0.1;dbname=todo',
                'root',
                'root'
            );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }
    }

    public function find($id){
        $stmt = $this->connection->prepare(
            "SELECT * FROM todoitems WHERE id = :id"
        );
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ToDoItem');
        return $stmt->fetch();
    }

    public function findAll(){
        $stmt = $this->connection->prepare(
            "SELECT * FROM todoitems"
        );
        $stmt->execute();
        $stmt->setFetchMode(PFO::FETCH_CLASS, 'ToDoItem');
        return $stmt->fetchAll();
    }

    

    }



?>