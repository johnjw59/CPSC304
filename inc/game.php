<?php
class Games extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'game');
    }

    public function insert($game) { 
        /* ... */
    }

    public function save($game) { 
        /* ... */
    }

    public function byId($id) 
    { 
        $query = $this->db->prepare('SELECT * FROM game WHERE game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch(PDO::FETCH_CLASS);
    }
}
