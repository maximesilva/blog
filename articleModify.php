<?php
include 'config.php';
include 'functions.php';

debug($_POST);
if (isset($_GET['id'])) {
    $numart = $_GET['id'];
}
debug($_GET);
$titrearticle = '';
$message = '';
$pseudo = '';

if (!empty($_POST)) { // si le tableau n'est pas vide
    if (!empty($_POST['titre_article'])){
        $titrearticle = $_POST['titre_article'];
    }if (!empty($_POST['message'])){
        $message = $_POST['message'];
    }if (!empty($_POST['pseudo'])){
        $pseudo = $_POST['pseudo'];
    }
    articleModify($bdd, $titrearticle, $message, $pseudo, $numart);
}
$recuparticle = articleView($bdd, $numart);
?>

<a href="../blog"><input type="button" value="Acceuil"></a>
<form action="" method="post">
    <div>
        <div>
            <label for="inputtitrearticle">Titre de l'article :</label>
            <input type="text" id="inputtitrearticle" placeholder="" name="titre_article" value="<?php echo $recuparticle['titre']?>">
        </div>

        <div>
            <label for="exampleFormControlTextarea1">Contenu :</label>
            <textarea id="exampleFormControlTextarea1" rows="10" cols="33" name="message"
                      placeholder="Précisez"><?php echo $recuparticle['texte']?></textarea>
        </div>

        <div>
            <label for="inputpseudo">Nom de l'auteur :</label>
            <input type="text" id="inputpseudo" placeholder="" name="pseudo" value="<?php echo $recuparticle['auteur_id']?>">
        </div>

    </div>
    <button type="submit">Valider</button>
</form>


