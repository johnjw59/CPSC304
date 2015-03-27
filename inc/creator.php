<?php
    class Creators extends Repo {
        public function __construct($db) {
            parent::__construct($db, 'creator', 'Creator');
        }
    
        public function insert($game) { /* ... */ }
        public function save($game) { /* ... */ }
    
        public function byId($id) 
        { 
            $query = $this->prepare('SELECT * FROM creator WHERE creator_id=:id');
            $query->execute(array('id' => $id));
            return $query->fetch(PDO::FETCH_CLASS);
        }

        public function addCreator($name, $type, $description, $country, $year, $website, $image_url) {
            $query = $this->prepare('INSERT INTO creator (company_name, type, description, country, year_founded, website, image_url)
                                         VALUES (:name, :type, :description, :country, :year, :website, :image_url)');
            $query->execute(array('name' => $name, 'type' => $type, 'description' => $description, 'country' => $country, 'year' => $year, 'website' => $website, 'image_url' => $image_url));
    
            $creator_id = $this->prepare('SELECT LAST_INSERT_ID() FROM creator');
            $creator_id->execute();
            return $creator_id->fetch(PDO::FETCH_NUM);
        }
    
        public function recentlyAdded($limit) {
            $query = $this->prepare('SELECT creator_id, company_name, image_url FROM    creator ORDER BY date_added DESC LIMIT ' . $limit);
            $query->execute();
            return $query->fetchAll();
        }

        public function getGames($id){
            $query = $this->prepare('SELECT game.game_id, title, image_url  
                                     FROM madeby NATURAL JOIN game 
                                     WHERE creator_id=:id AND madeby.game_id = game.game_id');
            $query->execute(array('id' => $id));
            return $query->fetchAll();

        }

        public function getHighestRated($id) {
            $query = $this->prepare('SELECT game_id, title, MAX(rating)
                                     FROM review NATURAL JOIN madeby NATURAL JOIN game
                                     WHERE creator_id=:id');
            $query->execute(array('id' => $id));
            return $query->fetch(PDO::FETCH_CLASS);
        }

        public function getAvgRating($id) {
            $query = $this->prepare('SELECT AVG(rating)
                                     FROM review NATURAL JOIN madeby
                                     WHERE creator_id=:id');
            $query->execute(array('id' => $id));
            return $query->fetch(PDO::FETCH_NUM);
        }

        public function getPublishers(){
            $query = $this->prepare('SELECT creator_id, company_name  
                                     FROM creator 
                                     WHERE type="publisher" OR type="both"');
            $query->execute();
            return $query->fetchAll();
        }

        public function getDevelopers(){
            $query = $this->prepare('SELECT creator_id, company_name  
                                     FROM creator 
                                     WHERE type="developer" OR type="both"');
            $query->execute();
            return $query->fetchAll();
        }

        public function getAll() {
            $query = $this->prepare('SELECT creator_id, company_name
                                     FROM creator');
            $query->execute();
            return $query->fetchAll();
        }

        public function addMadeGame($game_id, $creator_id) {
            $query = $this->prepare('INSERT INTO madeby
                                     VALUES (:gid, :cid)');
            $query->execute(array('gid' => $game_id, 'cid' => $creator_id));
        }

        public function updateCreator($id, $name, $type, $description, $country, $year, $website, $image_url) {
            $query = $this->prepare('UPDATE creator
                                     SET company_name=:name, type=:type, description=:description, country=:country, year_founded=:year, website=:website, image_url=:image_url
                                     WHERE creator_id=:id');
            $query->execute(array('id' => $id, 'name' => $name, 'type' => $type, 'description' => $description, 'country' => $country, 'year' => $year, 'website' => $website, 'image_url' => $image_url));
        }

        public function deleteId($creator_id) {
            $query = $this->prepare('DELETE FROM creator
                                     WHERE creator_id=:id');
            $query->execute(array('id' => $creator_id));
            
            $query = $this->prepare('DELETE FROM madeby
                                     WHERE creator_id=:id');
            $query->execute(array('id' => $creator_id));
        }
    }
    
    class Creator extends DBObject {
        public function link() { return "?page=developer&id=" . $this->creator_id; }
        public function linkGame() { return "?page=game&id=" . $this->game_id; }
    }
