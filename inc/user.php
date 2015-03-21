<?php
class User extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'user');
    }

    public function insert($review) { /* ... */ }
    public function save($review) { /* ... */ }
    public function byId($id) { /* ... */ }

    public function login($email, $pass) { 
        $query = $this->prepare('SELECT user_id FROM user WHERE email=:email AND password=:pass');
        $query->execute(array('email' => $email, 'pass' => $pass));
        return $query->fetch(PDO::FETCH_CLASS);
    }

    public function register($email, $name, $pass) {
        try {
            $query = $this->prepare('INSERT INTO user (name, email, password) VALUES (:name, :email, :pass)');
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

    public function getFavourites($uid) {
        $query = $this->prepare('SELECT game_id, title, image_url FROM favourite NATURAL JOIN game WHERE user_id=:uid');
        $query->execute(array('uid' => $uid));
        return $query->fetch(PDO::FETCH_CLASS);
    }

    public function addFavourite($uid, $gid) {
        try {
            $query = $this->prepare('INSERT INTO favourite VALUES (:uid, :gid)');
            $query->execute(array('uid' => $uid, 'gid' => $gid));
        }
        catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return FALSE;
            }
            else {
                throw $e;
            }
        }
        return TRUE;
    }
}
