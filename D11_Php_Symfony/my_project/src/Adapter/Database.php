<?php

namespace App\Adapter;

use PDO;

class Database 
{
    private PDO $connexion;

    public function __construct(
        string $dsn,
        string $user,
        string $password,
    ) {
        $this->connexion = new PDO($dsn, $user, $password);
    }


}

?>