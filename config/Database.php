<?php

namespace config;

use PDO;
use Exception;

class Database
{
    static function getConnection()
    {
        try {
            // Connexion à la base
            $pdo = new PDO(
                "mysql:host=database;dbname=zinzindb;charset=utf8",
                "root",
                "admin"
            );
            //echo "Connexion réussie ✅";

        } catch (Exception $e) {
            // Gestion d'erreur
            die("Erreur de connexion ❌ : " . $e->getMessage());
        };
    }
}