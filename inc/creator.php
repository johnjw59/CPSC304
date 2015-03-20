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
    }
    
    class Creator extends DBObject {
        public function link() { return "?page=developer&id=" . $this->creator_id; }
    }
