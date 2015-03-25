<?php
class Reviews extends Repo
{
    public function __construct($db) {
        parent::__construct($db, 'review');
    }

    public function insert($review) { /* ... */ }
    public function save($review) { /* ... */ }

    public function byId($id) 
    { 
        $query = $this->prepare('SELECT * FROM review WHERE review_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetch();
    }

    public function gameReviews($id){
        $query = $this->prepare('SELECT review_id , user_id, game_id, name, `text`, rating 
                                 FROM review NATURAL JOIN user NATURAL JOIN game 
                                 WHERE game_id=:id');
        $query->execute(array('id' => $id));
        return $query->fetchAll();
    }

    public function byUserId($user_id) {
        $query = $this->prepare('SELECT review_id, game_id, title, `text`, rating 
                                 FROM review NATURAL JOIN game
                                 WHERE user_id=:id AND `text` IS NOT NULL
                                 ORDER BY review_id DESC');
        $query->execute(array('id' => $user_id));
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function addReview($user_id,$game_id,$text,$rating){
        $query = $this->prepare('INSERT INTO review
                                 SET game_id=:game_id, user_id=:user_id,text=:t,rating=:rating');
        $query->execute(array('game_id'=>$game_id,'user_id'=>$user_id,'t'=>$text,'rating'=>$rating));
    }
}
