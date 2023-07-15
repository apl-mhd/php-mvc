<?php

declare(strict_types = 1);

namespace App\Models;

use App\Model;


class Ticket extends Model
{
    public function all(): \Generator{
        $stmt = $this->db->query(
            'SELECT id, title, content  FROM tickets'
        );

        // foreach($stmt as $ticket) {
        //     yield $ticket;
        // }

        return $this->fetchLazy($stmt);
    }


}