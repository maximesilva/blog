<?php
include 'config.php';
include 'functions.php';
$articles = articleIndex($bdd);


?>
<a href="category.php?name=loisirs"><input type="button" value="loisirs"></a>
<a href="category.php?name=jesaispas"><input type="button" value="jesaispas"></a><br/>
<a href="articleCreate.php"><input type="button" value="Nouvel article"></a>

<?php foreach ($articles as $ligne): ?>
    <h2><a href="article.php?id=<?= $ligne['id'] ?>"><?= $ligne['titre'] ?></a></h2>
    <a href="articleModify.php?id=<?= $ligne['id'] ?>"><input type="button" value="Modifier"></a>
    <p><?= $ligne['texte'] ?></p>
    <p>Rédigé par <?= $ligne['pseudo'] ?></p>
    <p>rédigé le <?= $ligne['fini_le'] ?></p>

<?php endforeach; ?>
