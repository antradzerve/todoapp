<?php

namespace Repository;

include_once __DIR__ . '/../Model/toDoModel.php';

use LogicException;
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
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ToDoItem');
        return $stmt->fetchAll();
    }

    public function save($toDoItem){
        if (isset($toDoItem->id)){
            return $this->update($toDoItem);
        }

        $stmt = $this->connection->prepare(
            'INSERT INTO todoitems (id, task) VALUES (:id, :task)'
        );
        $stmt->bindParam(':id', $toDoItem->id);
        $stmt->bindParam(':task', $toDoItem->task);
        $stmt->execute();
        $id = $this->connection->lastInsertId();
        $toDoItem->id = $id;
        return true;
    }

    public function update($toDoItem){
        if (!isset($toDoItem->id)){
            throw new LogicException(
                'Sumtin went wong'
            );
        }

        $stmt = $this->connection->prepare(
           'UPDATE todoitems SET task = :task WHERE id = :id'
        );
        $stmt->bindParam(':id', $toDoItem->id);
        $stmt->bindParam(':task', $toDoItem->task);
        return $stmt->execute();
    }

    public function delete($toDoItem){
        if (!isset($toDoItem->id)){
            throw new LogicException(
                'Sumtin went wong'
            );
        }

        $stmt = $this->connection->prepare(
           'DELETE FROM todoitems WHERE id = :id'
        );
        $stmt->bindParam(':id', $toDoItem->id);

        return $stmt->execute();
    }

    }



?>