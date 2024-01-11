<?php

namespace Libs\Database;
use PDOException;


class UsersTable
{
    private $db = null;
    public function __construct(MySQL $mysql)
    {
        $this->db = $mysql->connect();
    }
    public function insert($data){
        try{
            $statement = $this->db->prepare(
            "INSERT INTO users (name, email, phone, address, password, created_at)
            VALUES (:name, :email, :phone, :address, :password, NOW())"
            );
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $statement->execute($data);
            return $this->db->lastInsertId();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
            exit();
        }
    }
    public function getAll(){
        try{
            $query = $this->db->query(
            "SELECT users.*, roles.name AS role
            FROM users LEFT JOIN roles
            ON users.role_id = roles.id"
        );
            $row = $query->fetchAll();
            return $row;

        }catch(PDOException $e){
            return $e->getMessage();
            exit();
        }
    }
    public function updatePhoto($id, $photo){
        try{
            $update = $this->db->prepare("UPDATE users SET photo = :photo WHERE id = :id");
            $update->execute(['id' => $id, 'photo' => $photo]);

            return $update->rowCount();
            
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function findByEmailAndPassword($email, $password){
        try{
            $query = $this->db->prepare("SELECT * FROM users WHERE
            email = :email");
            $query->execute([
                 "email" => $email,
                 
            ]);
            $row = $query->fetch();
           if($row){
            if(password_verify($password, $row->password)){
                return $row;
            }
           }
           return false;
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function Delete($id){
        $statement = $this->db->prepare(
            "DELETE FROM users WHERE id = :id"
        );
        $statement->execute(['id' => $id]);
        return $statement->rowCount();
    }
    public function suspended($id){
        $statement = $this->db->prepare(
            "UPDATE users SET suspended = 1 WHERE id = :id"
        );
        $statement->execute(['id' => $id]);
        return $statement->rowCount();
    }
    public function unsuspended($id){
        $statement = $this->db->prepare(
            "UPDATE users SET suspended = 0 WHERE id = :id"
        );
        $statement->execute(['id' => $id]);
        return $statement->rowCount();
    }
    public function changeRole($id, $role_id){
        $statement = $this->db->prepare(
            "UPDATE users SET role_id = :role_id WHERE id = :id"
        );
        $statement->execute(['id' => $id, 'role_id' => $role_id]);
        return $statement->rowCount();
    }
    public function getRoles(){
        try{
            $query = $this->db->query(
            "SELECT *FROM roles"
        );
            $row = $query->fetchAll();
            return $row;

        }catch(PDOException $e){
            return $e->getMessage();
            exit();
        }
    }
}