<?php
if (!isset($_POST['query'])) {
    echo 'no search query';
}
else {
    $query = '';
    if (isset($_POST['query']))
        $query = $_POST['query'];

    /* for advanced search form */
    $genres  = $db_genres->all();
    $platforms = $db_platforms->all();
    $developers = $db_creators->all();

    $genre     = 0;
    $platform  = 0;
    $developer = 0;
    $use_title = strlen($query > 0);

    if (isset($_POST['genre']) && is_numeric($_POST['genre'])) 
        $genre = intval($_POST['genre']);

    if (isset($_POST['platform']) && is_numeric($_POST['platform'])) 
        $platform = intval($_POST['platform']);

    if (isset($_POST['developer']) && is_numeric($_POST['developer'])) 
        $developer = intval($_POST['developer']);

    $results = $db_games->search($query, $genre, $platform, $developer);

    include(__DIR__ . '/results_template.php');
}
