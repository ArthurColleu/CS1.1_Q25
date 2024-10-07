<?php

namespace App\Modele;

use App\Utilitaire\Singleton_ConnexionPDO;
use PDO;

class Modele_utilisateur
{
    /**
     * @return mixed : le tableau des enregistrements dans la table "table"(something went wrong...)
     */
    static function  Utilisateur_Select()
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
select *
    from `utilisateur`
    order by id');
        $reponse = $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
        $tableauReponse = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
        return $tableauReponse;
    }

    public static function utilisateur_Insert( mixed $nom, mixed $prenom, mixed $MotDePasse)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        insert into `utilisateur` (nom, prenom, MotDePasse) values (:nom, :prenom, :MotDePasse)');
        $reponse = $requetePreparee->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "MotDePasse" => $MotDePasse,
        ));
        return $reponse;
    }

    public static function utilisateur_Delete(mixed $id)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        delete from `utilisateur` where id=:id');
        $reponse = $requetePreparee->execute(array(
            "id" => $id
        ));
        return $reponse;
    }

    public static function utilisateur_SelectById(mixed $id)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        select * from `utilisateur` where id=:id');
        $reponse = $requetePreparee->execute(array(
            "id" => $id
        ));
        $tableauReponse = $requetePreparee->fetch(PDO::FETCH_ASSOC);
        return $tableauReponse;
    }

    public static function utilisateur_Update(mixed $id, mixed $nom, mixed $prenom, mixed $MotDePasse)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        update `utilisateur` set nom=:nom, prenom=:prenom , MotDePasse=:MotDePasse  where id=:id');
        $reponse = $requetePreparee->execute(array(
            "id" => $id,
            "nom" => $nom,
            "prenom" => $prenom,
            "MotDePasse" => $MotDePasse
        ));
        return $reponse;
    }

}