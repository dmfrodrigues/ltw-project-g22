<?php
$photos = $pet->getPictures();
?>
<article id="pet-album">
    <header>
        <a href='<?= PROTOCOL_SERVER_URL ?>/pet.php?id=<?= $pet->getId() ?>'><?= $pet->getName() ?></a><span>'s Album</span>
    </header>
    <section>
        <?php for ($i = 0; $i < count($photos); $i++) { ?>
            <img src="<?= $photos[$i] ?>" alt="photo <?= $i ?> of <?= $pet->getName() ?>" />
        <?php } ?>
    </section>
</article>