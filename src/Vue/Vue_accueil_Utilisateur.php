<?php

namespace App\Vue;

use App\Utilitaire\Vue_Composant;

class Vue_accueil_Utilisateur extends Vue_Composant
{
    private string $msgErreur;
    private array $listeDonnee;
    public function __construct($listeDonnee, string $msgErreur ="")
    {
        $this->listeDonnee=$listeDonnee;
        $this->msgErreur=$msgErreur;
    }

    function donneTexte(): string
    {
        $str= "
<h1>Vous affichez utiliateur !</h1>
<div  style='    width: 50%;    display: block;    margin: auto;'> 
    <table> 
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prénom</th>
            <th>MotDePasse</th>
        </tr>
    ";
        if($this->listeDonnee==null)
        {
            $str.="
            <tr><td colspan='3'>table vide</td> </tr>
            ";
        }
        foreach ($this->listeDonnee as $item) {
            $str.="
            <tr><td><a href='./index.php?case=utilisateur&action=modifier&id=$item[id]'  > $item[id]</a></td><td>$item[nom]</td><td>$item[prenom]</td><td>$item[MotDePasse]</td><td>
            <form>
                <input type='hidden' name='case' value ='utilisateur'>
                <input type='hidden' name='id' value ='$item[id]'>
                <button type='submit' name = 'action' value='supprimer'> Supprimer</button>
            </form>
</td> </tr>
            ";
        }
        $str.="</table>
<form method='post'>
    <input type='hidden' name='case' value ='utilisateur'>
    <button type='submit' name = 'action' value='ajouter'> Ajouter un enregistrement</button>
</div>
        $this->msgErreur
    ";
        return $str ;
    }
}