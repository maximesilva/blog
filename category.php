<?php
include 'config.php';
include 'functions.php';

if (isset($_GET['name'])) {
    $nomcat = $_GET['name'];
}
$articles = categoryArticle($bdd, $nomcat);
debug($articles);

?>

<a href="../blog"><input type="button" value="Acceuil"></a>

<?php foreach ($articles as $ligne): ?>
    <h2><a href="article.php?id=<?= $ligne['id'] ?>"><?= $ligne['titre'] ?></a></h2>
    <a href="articleModify.php?id=<?= $ligne['id'] ?>"><input type="button" value="Modifier"></a>
    <p><?= $ligne['texte'] ?></p>
    <p>Rédigé par <?= $ligne['pseudo'] ?></p>
    <p>rédigé le <?= $ligne['fini_le'] ?></p>

<?php endforeach; ?>
