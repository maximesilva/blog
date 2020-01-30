<?php
// Tes include
include 'config.php';
include 'functions.php';

// Appel ta fonction
if (isset($_GET['id'])) {
    $numart = $_GET['id'];
}
$disabled = null;
$article = articleView($bdd, $numart);
//debug($idarticle);
$commentaires = commentArticle($bdd, $numart);
//var_dump($commentaires);
if (!empty($commentaires)){
    $disabled = 'disabled';
}


?>
<a href="../blog"><input type="button" value="Acceuil"></a>

<h2><?php echo $article['titre'] ?></h2>
<p><?php echo $article['texte'] ?></p>
<p>Rédigé par <?php echo $article['pseudo'] ?></p>

<h3>Commentaire : </h3>
<?php foreach ($commentaires as $ligne): ?>
<p>Rédigé par <?= $ligne['pseudo'] ?> : </p>
<p><?= $ligne['article'] ?></p>
<?php endforeach;?>
<a href="articleDelete.php?id=<?php $numart ?>"><input type="button" value="Supprimer" <?php echo $disabled ?> </a>
