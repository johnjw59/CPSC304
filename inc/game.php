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

    public function getFavourites($uid) {
        $query = $this->prepare('SELECT game_id, title, image_url 
                                 FROM favourite NATURAL JOIN game 
                                 WHERE user_id=:uid');
        $query->execute(array('uid' => $uid));
        return $query->fetchAll();
    }

    public function isFavourite($uid, $gid) {
        $query = $this->prepare('SELECT *
                                 FROM favourite
                                 WHERE user_id=:uid AND game_id=:gid');
        $query->execute(array('uid' => $uid, 'gid' => $gid));
        // if the query doesn't return anything, the game isn't a favourite
        $result = $query->fetchAll();
        if (empty($result)) {
            return false;
        }
        return true;
    }

    public function addFavourite($uid, $gid) {
        try {
            $query = $this->prepare('INSERT INTO favourite 
                                     VALUES (:uid, :gid)');
            $query->execute(array('uid' => $uid, 'gid' => $gid));
        }
        // if the entry already exists in the DB, it'll throw error 23000
        catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return true;
            }
            else {
                throw $e;
            }
        }
        return true;
    }

    public function removeFavourite($uid, $gid) {
        $query = $this->prepare('DELETE FROM favourite
                                 WHERE user_id=:uid AND game_id=:gid');
        $query->execute(array('uid' => $uid, 'gid' => $gid));
        return $query;
    }

    public function search($query) 
    {
        $keywords = preg_split('/\s+/', $query);
        for($i = 0; $i < count($keywords); $i++) {
            $keywords[$i] = "title LIKE '%{$keywords[$i]}%'";
        }
        $like = implode(' AND ', $keywords);
        $sql = 'SELECT * FROM game WHERE '. $like;

        $qry = $this->prepare($sql);
        $qry->execute();
        return $qry->fetchAll();
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
