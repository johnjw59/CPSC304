<?php
if (!isset($_POST['query'])) {

}
else {
    $query = $_POST['query'];

    $results = $db_games->search($query);
    include(__DIR__ . '/results_template.php');
}
