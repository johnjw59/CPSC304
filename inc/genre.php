<?php
class Genres extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'genre');
    }

    public function insert($game) { /* ... */ }
    public function save($game) { /* ... */ }

    public function byId($id) {
        $query = $this->prepare('SELECT g.* FROM `genre` g WHERE g.genre_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch();
    }

    public function byGame($id) {
        $query = $this->prepare('SELECT g.* FROM `genre` g NATURAL JOIN isgenre ig WHERE ig.game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetchAll();
    }
}
