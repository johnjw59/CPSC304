<div class="mainPage">
    <div class="adv-search">
        <h3>Advanced Search</h3>
        <table>
        <form action="index.php?page=search" method="post">
            <tr>
                <td>Title</td>
                <td>
                    <input type="text" name="query" value="<?= $query ?>">
                </td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>
                    <select name="genre">
                        <option value="0">Any</option>
                        <?php foreach($genres as $g): ?>
                            <option value="<?= $g->genre_id ?>" <?= $genre == $g->genre_id ? 'selected' : '' ?>><?= $g->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Platform</td>
                <td>
                    <select name="platform">
                        <option value="0">Any</option>
                        <?php foreach($platforms as $p): ?>
                            <option value="<?= $p->platform_id ?>" <?= $platform == $p->platform_id ? 'selected' : '' ?>><?= $p->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Creator</td>
                <td>
                    <select name="developer">
                        <option value="0">Any</option>
                        <?php foreach($developers as $d): ?>
                            <option value="<?= $d->creator_id ?>" <?= $developer == $d->creator_id ? 'selected' : '' ?>><?= $d->company_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" value="Search">
        </form>
    </div>
    <?php foreach($results as $game): ?>
        <div class="gameSection">
            <a href="<?= $game->link() ?>">
                <img class="gameBox" src="img/<?= $game->image_url ?>">
            </a>
            <!-- <img class="gameBox" src="img/<?= $game->image_url ?>"> -->
            <div class="infoBox">
                <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
                <ul>
                    <li>Release Date: <?= $game->release_date ?></li>
                    <li>Genre: <?= $game->genres ?></li> 
                    <li>Creators: <?= $game->creators ?></li> 
                    <li>Platforms: <?= $game->platforms ?></li>
                    <li>Rating: <?= $game->getRating() ?></li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>
