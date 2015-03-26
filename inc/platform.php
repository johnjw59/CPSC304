<?php
class Platforms extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'platform');
    }

    public function insert($game) { /* ... */ }
    public function save($game) { /* ... */ }

    public function byId($id) {
        $query = $this->prepare('SELECT p.* FROM `platform` p WHERE p.platform_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch();
    }

    public function gamePlatforms($game_id) {
        $query = $this->prepare('SELECT p.* FROM `platform` p NATURAL JOIN `onplatform` op WHERE op.game_id=:game_id');
        $query->execute(array('game_id' => $game_id));
        return $query->fetchAll();
    }

    public function getAll() {
        $query = $this->prepare('SELECT platform_id, name
                                 FROM platform');
        $query->execute();
        return $query->fetchAll();
    }

    public function addGamePlatform($game_id, $platform_id) {
        $query = $this->prepare('INSERT INTO onplatform
                                 VALUES (:gid, :pid)');
        $query->execute(array('gid' => $game_id, 'pid' => $platform_id));
    }
}
