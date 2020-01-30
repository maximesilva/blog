<?php
include 'config.php';
include 'functions.php';
debug($_POST);

$titrearticle = '';
$message = '';
$pseudo = '';

if (!empty($_POST)) { // si le tableau n'est pas vide
    if (!empty($_POST['titre_article'])) {
        $titrearticle = $_POST['titre_article'];
    }
    if (!empty($_POST['message'])) {
        $message = $_POST['message'];
    }
    if (!empty($_POST['pseudo'])) {
        $pseudo = $_POST['pseudo'];
    }
    $creation = articleCreate($bdd, $titrearticle, $message, $pseudo);
    if ($creation) {
        echo 'ca marche';
    }else {
        echo 'faux';
    }
}

?>

<a href="../blog"><input type="button" value="Acceuil"></a>
<form action="" method="post">
    <div>
        <div>
            <label for="inputtitrearticle">Titre de l'article :</label>
            <input type="text" id="inputtitrearticle" placeholder="" name="titre_article">
        </div>

        <div>
            <label for="exampleFormControlTextarea1">Contenu :</label>
            <textarea id="exampleFormControlTextarea1" rows="10" cols="33" name="message"
                      placeholder="Précisez"></textarea>
        </div>

        <div>
            <label for="inputpseudo">Nom de l'auteur :</label>
            <input type="text" id="inputpseudo" placeholder="" name="pseudo">
        </div>

    </div>
    <button type="submit">Créer</button>
</form>

