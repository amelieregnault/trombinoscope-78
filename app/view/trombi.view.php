<?php foreach ($students as $aStudent) : ?>
    <div class="carte">
        <a href="fiche.html">
            <?php
            if (isset($aStudent['photo'])) {
                $photo = 'groupe' . $aStudent['group'] . '/small/' . $aStudent['photo'];
            } else {
                $photo = 'defaut.png';
            }
            ?>
            <figure class="photo"><img src="public/images/<?= $photo ?>" alt="photo de <?= $aStudent['firstname'] ?> <?= $aStudent['lastname'] ?>">
            </figure>
            <div class="infos">
                <p class="nom"><?= $aStudent['firstname'] ?> <span><?= $aStudent['lastname'] ?></span></p>
                <p class="ddn"><?= $aStudent['birthdate'] ?></p>
                <p class="groupe">groupe <span><?= $aStudent['group'] ?></span></p>
            </div>
        </a>
    </div>
<?php endforeach ?>