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
        $query = $this->prepare('SELECT * 
                                 FROM game 
                                 WHERE game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch(PDO::FETCH_CLASS);
    }

    public function byPlatform($platform_id) {
    }

    public function byGenre($genre_id) {
    }

    public function topRated($limit) {
        $query = $this->prepare('SELECT game_id, title, image_url, AVG(rating) 
                                 FROM review NATURAL JOIN game 
                                 GROUP BY game_id 
                                 ORDER BY AVG(rating) DESC 
                                 LIMIT ' . $limit);
        $query->execute();
        return $query->fetchAll();        
    }

    public function recentlyAdded($limit) {
        $query = $this->prepare('SELECT game_id, title, image_url 
                                 FROM game 
                                 ORDER BY date_added DESC 
                                 LIMIT ' . $limit);
        $query->execute();
        return $query->fetchAll();
    }
}

class Game extends DBObject
{
    public function link() { return "?page=game&id=" . $this->game_id; }

    public function getReviews() {
        $query = $this->prepare('SELECT review_id ,user_id, game_id, `text`, rating 
                                 FROM game NATURAL JOIN review 
                                 WHERE game_id=:id');
        $query->execute(array('id' => $this->game_id));
        return $query->fetchAll();
    }

    public function getRating() {
        $query = $this->prepare('SELECT AVG(rating) 
                                 FROM game NATURAL JOIN review 
                                 WHERE game_id=:id');
        $query->execute(array('id' => $this->game_id));
        return $query->fetch(PDO::FETCH_CLASS);
    }
}
