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

        public function addMadeGame($game_id, $creator_id) {
            $query = $this->prepare('INSERT INTO madeby
                                     VALUES (:gid, :cid)');
            $query->execute(array('gid' => $game_id, 'cid' => $creator_id));
        }
    }
    
    class Creator extends DBObject {
        public function link() { return "?page=developer&id=" . $this->creator_id; }
        public function linkGame() { return "?page=game&id=" . $this->game_id; }
    }
