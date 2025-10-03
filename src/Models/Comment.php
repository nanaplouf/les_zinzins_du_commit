<?php

namespace App\Models;

use PDO;
use Config\Database;

class Comment
{
    private ?int $id_comment;
    private ?string $text;
    private ?string $creation_date;
    private ?string $modification_date;
    private ?int $id_commit;
    private ?int $id_user;

    public function __construct(?int $id_comment, ?string $text, ?string $creation_date, ?string $modification_date, ?int $id_commit, ?int $id_user)
    {
        $this->id_comment = $id_comment;
        $this->text = $text;
        $this->creation_date = $creation_date;
        $this->modification_date = $modification_date;
        $this->id_commit = $id_commit;
        $this->id_user = $id_user;
    }

    public function addComment()
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO `comment` (`text`, `creation_date`, `id_commit`, `id_user`) 
                VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->text, $this->creation_date, $this->id_commit, $this->id_user]);
    }

    public function getCommentByCommit()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_comment`, `text`, `creation_date`, `modification_date`, `id_commit`, `id_user` 
        FROM `comment` WHERE `id_commit` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id_commit]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //On créer un tableau vide
        $comments = [];
        //Je boucle sur mon tableau de resultat pour créer un nouvel objet de chaque resultat
        foreach($result as $row){
            //Je créer un nouvel objet
            $comment = new Comment($row['id_comment'], $row['text'], $row['creation_date'], $row['modification_date'], $row['id_commit'], $row['id_user']);
            //Je l'insert dans mon tableau
            $comments[] = $comment;
        }
        return $comments;
    }

    public function getIdComment(): ?int
    {
        return $this->id_comment;
    }
    public function getText(): ?string
    {
        return $this->text;
    }
    public function getCreationDate(): ?string
    {
        return $this->creation_date;
    }
    public function getModificationDate(): ?string
    {
        return $this->modification_date;
    }
    public function getIdCommit(): ?int
    {
        return $this->id_commit;
    }
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdComment(?int $id_comment): void
    {
        $this->id_comment = $id_comment;
    }
    public function setText(?string $text): void
    {
        $this->text = $text;
    }
    public function setCreationDate(?string $creation_date): void
    {
        $this->creation_date = $creation_date;
    }
    public function setModificationDate(?string $modification_date): void
    {
        $this->modification_date = $modification_date;
    }
    public function setIdCommit(?int $id_commit): void
    {
        $this->id_commit = $id_commit;
    }
    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }



}