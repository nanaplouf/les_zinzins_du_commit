<?php

namespace App\Controllers;

use App\Utils\AbstractController;

class CommentController extends AbstractController
{
    public function editComment()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id'] );
            
            //J'appel la nouvelle méthode si le commentaire existe et que je suis le créateur de celui ci alors j'affiche la vue avec le formulaire
            require_once(__DIR__ . "/../Views/editComment.view.php");
            //Sinon redirige vers '/'
            
            //Dans la vue afficher le commentaire qui doit être modifier
            
            //Si la personne clique sur le submit alors vérifier les erreurs puis créer une méthode update pour envoyer la modification
        }else{
            $this->RedirectToRoute('/', 302);
        }
        
    }
}