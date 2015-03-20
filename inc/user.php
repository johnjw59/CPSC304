<?php
class User extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'user');
    }

    public function insert($review) { /* ... */ }
    public function save($review) { /* ... */ }
    public function byId($id) { /* ... */ }

    public function login($email, $pass) 
    { 
        $query = $this->prepare('SELECT user_id FROM user WHERE email=:email AND password=:pass');
        $query->execute(array('email' => $email, 'pass' => $pass));
        return $query->fetch(PDO::FETCH_CLASS);
    }
}
