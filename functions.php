<?php

function debug($var)
{
    highlight_string("<?php\n" . var_export($var, true) . ";\n?>");
}

function articleIndex(PDO $bdd): array
{
    $reponse = $bdd->query('SELECT articles.*, auteurs.pseudo
FROM articles 
INNER JOIN auteurs ON auteur_id=auteurs.id
ORDER BY fini_le DESC LIMIT 10');

    $donnees = $reponse->fetchAll();
    return $donnees;
}

function articleView(PDO $bdd, int $numart): array
{
    $resultat = $bdd->query('
SELECT articles.*, auteurs.pseudo
FROM articles
INNER JOIN auteurs ON auteur_id=auteurs.id
WHERE articles.id =' . $numart);

    $donnees = $resultat->fetch();
    return $donnees;
}

function commentArticle(PDO $bdd, int $numart): array
{
    $resultat = $bdd->query('
SELECT commentaires.*, auteurs.pseudo
FROM commentaires
INNER JOIN auteurs ON auteur_id=auteurs.id
WHERE commentaires.articles_id =' . $numart);

    $donnees = $resultat->fetchAll();
    return $donnees;
}

function articleCreate(PDO $bdd, string $champtitre, string $champtexte, int $champpseudo): bool
{
    $resultat = $bdd->prepare('INSERT INTO articles (titre, texte, creer_le, fini_le, auteur_id)
VALUES (:titre, :texte, NOW(), NOW(), :auteur_id)');
    $state = $resultat->execute(array(
        'titre' => $champtitre,
        'texte' => $champtexte,
        'auteur_id' => $champpseudo
    ));
    debug($state);
    return $resultat;
}

function articleModify(PDO $bdd, string $champtitre, string $champtexte, int $champpseudo, int $idarticle)
{

    $resultat = $bdd->prepare('
UPDATE articles 
SET titre = :titre, texte = :texte, creer_le = NOW(), fini_le = NOW(), auteur_id = :auteur_id 
WHERE articles.id = ' . $idarticle);
    $state = $resultat->execute(array(
        'titre' => $champtitre,
        'texte' => $champtexte,
        'auteur_id' => $champpseudo
    ));
    debug($state);
    return $resultat;
}

function articleDelete(PDO $bdd, int $numart)
{
    $resultat = $bdd->query('
DELETE
FROM articles
WHERE articles.id =' . $numart);

    return $resultat;
}

function categoryArticle(PDO $bdd, string $nomcat)
{

    $resultat = $bdd->query('
SELECT articles.*, auteurs.pseudo, categories.article
FROM articles
INNER JOIN auteurs ON auteur_id=auteurs.id
INNER JOIN articles_has_categorie ON articles.id=articles_has_categorie.article_id
INNER JOIN categories ON categories.id=articles_has_categorie.categorie_id
WHERE categories.article = "' . $nomcat . '"');

    $donnees = $resultat->fetchAll();
    return $donnees;
}