<div class="mainPage">
    <?php foreach($results as $game): ?>
        <div class="gameSection">
            <a href="<?= $game->link() ?>">
                <img class="gameBox" src="img/<?= $game->image_url ?>">
            </a>
            <!-- <img class="gameBox" src="img/<?= $game->image_url ?>"> -->
            <div class="infoBox">
                <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
                <ul>
                    <li>Release Date: </li>
                    <li>Genre: </li>
                    <li>Developers:</li>
                    <li>Publisher:</li>
                    <li>Rating: </li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>
