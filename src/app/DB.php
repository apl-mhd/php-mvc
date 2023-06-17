<?php

namespace App;

use PDO;

class DB
{
    private PDO $pdo;

    public function __construct( array $config)
    {
        // $defaultOptions = [
        //     PDO::ATTR_EMULATE_PREPARES => false,
        //     PDO::ATTR_DEFAULT_FETCH_MODE
        // ];

        // try {
        //     $this->pdo = new PDO(
        //         $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
        //         $config['user'],
        //         $config['pass'],
        //         $config['options'] ?? $defaultOptions,
        //     );
        // } catch (\PDOException $e) {
        //     throw new \PDOException($e->getMessage(), $e->getCode());
        // }
    }
}