<?php

include __DIR__ . "/header.html.php";
?>
    <div align="center">

        <a href="?colors=black" class="waves-effect waves-light btn black z-depth-5">Black</a>
        <a href="?colors=blue" class="waves-effect waves-light btn blue z-depth-5">Blue</a>
        <a href="?colors=green" class="waves-effect waves-light btn green z-depth-5">Green</a>
        <a href="?colors=red" class="waves-effect waves-light btn red z-depth-5">Red</a>
        <a href="?colors=white" class="waves-effect waves-light btn white black-text z-depth-5">White</a>
    </div>
<br>
    <div align="center">
        <h5> Page <?= $pageNext["page"] -1 ?></h5>

        <?php
        if($page == 1):?>
            <a class="disabled waves-effect waves-light btn deep-orange darken-4">First page</a>
        <?php
        else : ?>
            <a href="?<?= http_build_query($pagePrevious)?>" class="active waves-effect waves-light btn deep-orange darken-4">Previous</a>
        <?php endif; ?>
        <a href="?<?= http_build_query($pageNext)?>" class="active waves-effect waves-light btn brown accent-4 pulse">Next</a>

    </div>
    <br>
    <div class="container" align="center">
        <div class="row">
        <?php
        foreach ($cardList as $item) :?>

            <img class="col s2 m6 l2 materialboxed" src="<?= $item->getImage() ?>">

        <?php endforeach ?>
        </div>
    </div>
    <br>
    <div align="right">
        <a href="#top">
        <i class="medium material-icons">arrow_upward</i>
        </a>
    </div>
<?php
include __DIR__ . "/footer.html.php";
?>