<?php

namespace App\Vue;

use App\Utilitaire\Vue_Composant;

class Vue_ModifierUtilisateur extends Vue_Composant
{

    /**
     * @param mixed $data
     */
    public function __construct(mixed $data)
    {
        $this->data = $data;
    }

    function donneTexte(): string
    {
        $str= "
        <h1>Vous modifiez un enregistrement de la table utilisateur !</h1>
        <div  style='    width: 50%;    display: block;    margin: auto;'> 
            <form method='post'>
                <input type='hidden' name='case' value ='utilisateur'>
                <input type='hidden' name='id' value ='".$this->data["id"]."'>
                <label for='nom'>nom</label>
                <input type='text' name='nom' value='".$this->data["nom"]."'><br>
                <label for='prenom'>prenom</label>
                <input type='text' name='prenom' value='".$this->data["prenom"]."'><br>
                <label for='MotDePasse'>Mot de passe</label>
                <input type='text' name='motDePasse' value='".$this->data["MotDePasse"]."'><br>
                <input type='hidden' name='action' value ='enregistrerModifierUtilisateur'>
                <button type='submit' value='enregistrerAjouterUtilisateur' > Modifier</button>
            </form>
        </div>
        ";
        return $str ;
    }
}