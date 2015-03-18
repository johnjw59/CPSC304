<?php
class Games extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'game', 'Game');
    }

    public function insert($game) { /* ... */ }
    public function save($game) { /* ... */ }

    public function byId($id) 
    { 
        $query = $this->prepare('SELECT * FROM game WHERE game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch(PDO::FETCH_CLASS);
    }

    public function byPlatform($platform_id) {
    }

    public function byGenre($genre_id) {
    }
}

class Game extends DBObject
{
    public function link() { return "?page=game&id=" . $this->game_id; }

    public function getReviews() {
        $query = $this->prepare('SELECT review_id ,user_id, game.game_id, `text`,rating 
                                 FROM game,review 
                                 WHERE game.game_id=:id AND review.game_id == game.game_id ');
        $query->execute(array('id' => $this->game_id));
        return $query->fetchAll();
    }
}
