<?php
class Games extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'game', 'Game');
    }

    public function insert($game) { 
        /* ... */
    }

    public function save($game) { 
        /* ... */
    }

    public function byId($id) 
    { 
        $query = $this->prepare('SELECT * FROM game NATURAL JOIN genre NATURAL JOIN platform WHERE game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch(PDO::FETCH_CLASS);
    }
}

class Game extends DBObject
{
    public function link() { return "?page=game&id=" . $this->game_id; }
}
