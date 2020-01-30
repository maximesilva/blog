<?php
include 'config.php';
include 'functions.php';

if (isset($_GET['id'])) {
    $numart = $_GET['id'];
}
$recuparticle = articleView($bdd, $numart);
debug($_POST);
if (!empty($_POST)) {
    if (!empty($_POST['validation'])) {
        $validation = $_POST['validation'];
        if ($validation == 'OUI') {
            articleDelete($bdd, $numart);
        }
        if ($validation == 'NON'){
            header('Location: /blog/', TRUE, 302);
            exit;
        }
    }
}


?>
<a href="../blog"><input type="button" value="Acceuil"></a>

<p>Êtes vous sur de vouloir supprimer cette l'article <?php echo $recuparticle['titre'] ?></p>

<form action="" method="post">
    <div>
        <input type="radio" name="validation" id="inlineRadio1"
               value="OUI">
        <label for="inlineRadio1" >Oui</label>
    </div>
    <div>
        <input type="radio" name="validation" id="inlineRadio2"
               value="NON">
        <label for="inlineRadio2">Non</label>
    </div>
    <button type="submit">Valider</button>
</form>
