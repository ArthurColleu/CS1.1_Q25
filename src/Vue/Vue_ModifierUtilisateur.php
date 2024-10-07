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
        <h1>Vous modifiez un enregistrement de ma table !</h1>
        <div  style='    width: 50%;    display: block;    margin: auto;'> 
            <form method='post'>
                <input type='hidden' name='case' value ='maTable'>
                <input type='hidden' name='action' value ='enregistrerModifier'>
                <input type='hidden' name='id' value ='".$this->data["id"]."'>
                <label for='nom'>nom</label>
                <input type='text' name='champ1' value='".$this->data["nom"]."'><br>
                <label for='prenom'>prenom</label>
                <input type='text' name='champ2' value='".$this->data["prenom"]."'><br>
                <label for='MotDePasse'>Mot de passe</label>
                <input type='text' name='MotDePasse' value='".$this->data["MotDePasse"]."'><br>
                <button type='submit' > Modifier</button>
            </form>
        </div>
        ";
        return $str ;
    }
}