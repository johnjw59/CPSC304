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
        $query = $this->prepare('SELECT g.*, ' .
            '(SELECT AVG(r.rating) FROM review r WHERE r.game_id=g.game_id) AS rating, ' . 
            '(SELECT GROUP_CONCAT(" ", ge.name) FROM genre ge NATURAL JOIN isgenre ig WHERE ig.game_id=g.game_id) AS genres, ' . 
            '(SELECT GROUP_CONCAT(" ", c.company_name) FROM creator c NATURAL JOIN madeby mb WHERE mb.game_id=g.game_id) AS creators, ' . 
            '(SELECT GROUP_CONCAT(" ", pl.name) FROM platform pl NATURAL JOIN onplatform op WHERE op.game_id=g.game_id) AS platforms,' . 
            '(SELECT AVG(rating) FROM review r WHERE r.game_id=g.game_id ) AS rating,'.
            '(SELECT GROUP_CONCAT(" ", c.company_name) FROM creator c NATURAL JOIN madeby m WHERE m.game_id=g.game_id AND (c.type="both" OR c.type="publisher") AND c.creator_id=m.creator_id) AS publishers ' .
                                 'FROM game g
                                 WHERE game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch(PDO::FETCH_CLASS);
    }

    public function byPlatform($platform_id) {
    }

    public function byGenre($genre_id) {
    }

    public function byCreator($creator_id) {
        $query = $this->prepare('SELECT g.*, ' .
            '(SELECT AVG(r.rating) FROM review r WHERE r.game_id=g.game_id) AS rating, ' . 
            '(SELECT GROUP_CONCAT(" ", ge.name) FROM genre ge NATURAL JOIN isgenre ig WHERE ig.game_id=g.game_id) AS genres, ' . 
            '(SELECT GROUP_CONCAT(" ", c.company_name) FROM creator c NATURAL JOIN madeby mb WHERE mb.game_id=g.game_id) AS creators, ' . 
            '(SELECT GROUP_CONCAT(" ", pl.name) FROM platform pl NATURAL JOIN onplatform op WHERE op.game_id=g.game_id) AS platforms ' . 
            'FROM game g NATURAL JOIN madeby mb ' .
            'WHERE mb.creator_id=:id');
        $query->execute(array('id' => $creator_id));
        return $query->fetchAll();
    }

    public function gameCreators($id) {
        $query = $this->prepare('SELECT creator_id
                                 FROM game NATURAL JOIN madeby
                                 WHERE game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetchAll();
    }

    public function addGame($title, $image_url, $description, $release_date) {
        $query = $this->prepare('INSERT INTO game (title, image_url, description, release_date)
                                     VALUES (:title, :image_url, :description, :release_date)');
        $query->execute(array('title' => $title, 'image_url' => $image_url, 'description' => $description, 'release_date' => $release_date));

        $game_id = $this->prepare('SELECT LAST_INSERT_ID() FROM game');
        $game_id->execute();
        return $game_id->fetch(PDO::FETCH_NUM);
    }

    public function updateGame($id, $title, $image_url, $description, $release_date) {
        $query = $this->prepare('UPDATE game
                                 SET title=:title, image_url=:image_url, description=:description, release_date=:release_date 
                                 WHERE game_id=:id');
        $query->execute(array('id' => $id, 'title' => $title, 'image_url' => $image_url, 'description' => $description, 'release_date' => $release_date));
    }

    public function deleteId($game_id) {
        $query = $this->prepare('DELETE FROM game
                                 WHERE game_id=:id');
        $query->execute(array('id' => $game_id));
        
        $query = $this->prepare('DELETE FROM madeby
                                 WHERE game_id=:id');
        $query->execute(array('id' => $game_id));

        $query = $this->prepare('DELETE FROM onplatform
                                 WHERE game_id=:id');
        $query->execute(array('id' => $game_id));

        $query = $this->prepare('DELETE FROM favourite
                                 WHERE game_id=:id');
        $query->execute(array('id' => $game_id));

        $query = $this->prepare('DELETE FROM review
                                 WHERE game_id=:id');
        $query->execute(array('id' => $game_id));
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

    public function all() {
        $query  = $this->prepare(
            'SELECT g.*, ' . 
            '(SELECT AVG(r.rating) FROM review r WHERE r.game_id=g.game_id) AS rating, ' . 
            '(SELECT GROUP_CONCAT(" ", ge.name) FROM genre ge NATURAL JOIN isgenre ig WHERE ig.game_id=g.game_id) AS genres, ' . 
            '(SELECT GROUP_CONCAT(" ", c.company_name) FROM creator c NATURAL JOIN madeby mb WHERE mb.game_id=g.game_id) AS creators, ' . 
            '(SELECT GROUP_CONCAT(" ", pl.name) FROM platform pl NATURAL JOIN onplatform op WHERE op.game_id=g.game_id) AS platforms ' . 
            'FROM game g'); 
        $query->execute();
        return $query->fetchAll();
    }

    public function search($query, $genre = 0, $platform = 0, $developer = 0) 
    {
        /* title keywords */
        $keywords = preg_split('/\s+/', $query);
        for($i = 0; $i < count($keywords); $i++) {
            $keywords[$i] = "g.title LIKE '%{$keywords[$i]}%'";
        }
        $like = implode(' AND ', $keywords);

        $sql = 'SELECT DISTINCT g.game_id FROM game g NATURAL JOIN onplatform op NATURAL JOIN isgenre ig NATURAL JOIN madeby mb WHERE '. $like; 

        /* advanced search parameters */
        if ($genre > 0) $sql .= ' AND ig.genre_id=' . $genre;
        if ($platform > 0) $sql .= ' AND op.platform_id=' . $platform;
        if ($developer > 0) $sql .= ' AND mb.creator_id=' . $developer;

        $qry = $this->prepare($sql);
        $qry->execute();
        $gids = $qry->fetchAll();
        $ids = array();
        foreach($gids as $g) 
            array_push($ids, intval($g->game_id));

        /* no results */
        if (count($ids) == 0)
            return array();
       
        $qry2 = $this->prepare(
            'SELECT g.*, ' . 
            '(SELECT AVG(r.rating) FROM review r WHERE r.game_id=g.game_id) AS rating, ' . 
            '(SELECT GROUP_CONCAT(" ", ge.name) FROM genre ge NATURAL JOIN isgenre ig WHERE ig.game_id=g.game_id) AS genres, ' . 
            '(SELECT GROUP_CONCAT(" ", c.company_name) FROM creator c NATURAL JOIN madeby mb WHERE mb.game_id=g.game_id) AS creators, ' . 
            '(SELECT GROUP_CONCAT(" ", pl.name) FROM platform pl NATURAL JOIN onplatform op WHERE op.game_id=g.game_id) AS platforms ' . 
            'FROM game g WHERE g.game_id IN (' . implode($ids, ',') . ')');
        $qry2->execute();
        return $qry2->fetchAll();
    }
}

class Game extends DBObject
{
    public function link() { return "?page=game&id=" . $this->game_id; }
    public function getRating() { return round($this->rating, 1); }
}
