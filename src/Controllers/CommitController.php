<?php

namespace App\Controllers;

use App\Models\Commit;
use App\Utils\AbstractController;

//impoter la class le "use"
class CommitController extends AbstractController
{
    public function addCommit()
    {
        if(isset($_SESSION['user'])) {
            if(isset($_POST['addCommit'])){
                $text = htmlspecialchars($_POST['commit']);
                $this->totalCheck('commit', $text);

                if(empty($this->arrayError)){
                    $today = date("Y-m-d");
                    $commit = new Commit(null, $text, $today, null, null, null, null, null, null, $_SESSION['user']['id_user']);
                    $commit->addCommit();
                    $this->redirectToRoute('/', 200);
                }
            }
            require_once(__DIR__ . "/../Views/addCommit.view.php");
        }else{
            $this->redirectToRoute('/');
        }
    }
}