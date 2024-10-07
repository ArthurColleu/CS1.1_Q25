<?php
$Vue->setMenu(new \App\Vue\Vue_Menu_Utilisateur());
switch ($action) {
    case "defaut":
        $data = \App\Modele\Modele_utilisateur::Utilisateur_Select();
        $Vue->addToCorps(new \App\Vue\Vue_Accueil_Utilisateur($data));
        break;
    case "ajouter":
        $Vue->addToCorps(new \App\Vue\Vue_Ajouter_Utilisateur());
        break;
    case "enregistrerAjouterUtilisateur":
        $data = \App\Modele\Modele_utilisateur::Utilisateur_Insert($_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["MotDePasse"]);

        $data = \App\Modele\Modele_utilisateur::Utilisateur_Select();
        $Vue->addToCorps(new \App\Vue\Vue_Accueil_Utilisateur($data));
        break;
    case "supprimer":
        $data = \App\Modele\Modele_utilisateur::Utilisateur_Delete($_REQUEST["id"]);
        $data = \App\Modele\Modele_utilisateur::Utilisateur_Select();
        $Vue->addToCorps(new \App\Vue\Vue_Accueil_Utilisateur($data));
        break;
    case "modifier":
        $data = \App\Modele\Modele_utilisateur::Utilisateur_SelectById($_REQUEST["id"]);
        $Vue->addToCorps(new \App\Vue\Vue_ModifierUtilisateur($data));
        break;
    case "enregistrerModifier":
        \App\Modele\Modele_utilisateur::Utilisateur_Update($_REQUEST["id"], $_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["motDePasse"]);
        $data = \App\Modele\Modele_utilisateur::Utilisateur_Select();
        $Vue->addToCorps(new \App\Vue\Vue_Accueil_Utilisateur($data));

        break;

}