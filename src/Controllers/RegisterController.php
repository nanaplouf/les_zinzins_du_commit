<?php 

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\User;

class RegisterController extends AbstractController
{
    public function index ()
    {
        //Si mon client click sur submit
        if(isset($_POST['register'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $description = htmlspecialchars($_POST['description']);

            $this->totalCheck("pseudo", $pseudo);
            $this->totalCheck("email", $email);
            $this->totalCheck("password", $password);
            $this->checkFormat('description', $description);

            //var_dump($this->arrayError);
            if(empty($this->arrayError)){
                $today = date('Y-m-d');
                $user = new User(null, $pseudo, $password, $email, null, $description, $today, 2);
                $user->saveUser();

            }

            
        }
        require_once(__DIR__ . "/../Views/register.view.php");
    }
}