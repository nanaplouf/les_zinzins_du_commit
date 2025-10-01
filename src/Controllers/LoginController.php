<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\AbstractController;

class LoginController extends AbstractController
{
    public function index ()
    {
        if(isset($_POST['login'])){
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $this->totalCheck('email', $email);
            $this->totalCheck('password', $password);

            if(!$this->arrayError){
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $user = new User(null, null, $passwordHash, $email, null, null, null, null);

                $myUser = $user->getUserByEmail();
                if($myUser){
                    $this->debug($myUser);
                    $verifPassword = password_verify($passwordHash, $myUser->getPassword());

                    if($verifPassword){
                        
                        $_SESSION['user'] = [
                            'id' => uniqid(),
                            'email' => $myUser->getEmail(),
                            'pseudo' => $myUser->getPseudo(),
                            'id_role' => $myUser->getIdRole(),
                            'creation_date' => $myUser->getCreationDate(),
                            'description' => $myUser->getDescription(),
                            'picture' =>$myUser->getPicture(),
                            'id_user' => $myUser->getIdUser()
                        ];

                    }else{
                        $this->errorMessage('Ton adresse email ou mot de passe n\'est pas correcte');
                    }

                }else{
                    $this->errorMessage('Ton adresse email ou mot de passe n\'est pas correcte');
                }
            }
        }
        require_once(__DIR__ . '/../Views/login.view.php');
    }
}