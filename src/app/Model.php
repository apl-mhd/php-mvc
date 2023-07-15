<?php
namespace App;
use App\DB;
use App\App;

abstract class Model
{
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }

    public function fetchLazy(\PDOStatement $stmt): \Generator
    {
        foreach($stmt as $record) {
            yield $record;
        }
    }
}