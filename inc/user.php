<?php
class User extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'user');
    }

    public function insert($review) { /* ... */ }
    public function save($review) { /* ... */ }
    public function byId($id) {
        $query = $this->prepare('SELECT name 
                                 FROM user 
                                 WHERE user_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch(PDO::FETCH_CLASS);
    }

    public function login($email, $pass) { 
        $query = $this->prepare('SELECT user_id
                                 FROM user 
                                 WHERE email=:email AND password=:pass');
        $query->execute(array('email' => $email, 'pass' => $pass));
        return $query->fetch(PDO::FETCH_CLASS);
    }

    public function register($email, $name, $pass) {
        try {
            $query = $this->prepare('INSERT INTO user (name, email, password) 
                                     VALUES (:name, :email, :pass)');
            $query->execute(array('email' => $email, 'name' => $name, 'pass' => $pass));
        }
        catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return FALSE;
            }
            else {
                throw $e;
            }
        }
        $query = $this->prepare('SELECT LAST_INSERT_ID()');
        $query->execute();
        return $query->fetch(PDO::FETCH_NUM);
    }
}
