<?php
class Database
{
    public function sqlQuery(string $sqlQuery, \PDO $connexion, array $params = [])
    {
        $stmt = $connexion->prepare($sqlQuery);
        $stmt->execute($params);
        return $stmt;
    }
}
