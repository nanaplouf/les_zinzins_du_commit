<?php

namespace App\Controllers;

use App\Utils\AbstractController;

//impoter la class le "use"
class CommitController extends AbstractController
{
    public function addCommit()
    {
        require_once(__DIR__ . "/../Views/addCommit.view.php");
    }
}