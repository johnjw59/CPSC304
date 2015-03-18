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
        $query = $this->prepare('SELECT review_id ,user.name, game.game_id, `text`,rating 
                                 FROM game,review,user 
                                 WHERE game.game_id=:id AND review.game_id = game.game_id AND review.user_id = user.user_id');
        $query->execute(array('id' => $id));
        return $query->fetchAll();
    }

    public function byUserId($user_id) {
        $query = $this->prepare('SELECT review_id ,user.name, game.game_id, `text`,rating 
                                 FROM review,user 
                                 WHERE user.user_id=:id AND review.user_id = user.user_id');
        $query->execute(array('id' => $user_id));
        return $query->fetchAll();
    }
}
