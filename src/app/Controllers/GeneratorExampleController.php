<?php

declare(strict_types = 1);

namespace App\Controllers;
use App\Models\Ticket;
use Generator;

class GeneratorExampleController
{
    public function __construct(private Ticket $ticketModel)
    {
     
        
    }

    public function index()
    {
        $tickets = $this->ticketModel->all();

        $tickets->rewind();
        foreach($tickets as $ticket){
            echo $ticket['id'] . ':' . substr($ticket['content'], 0, 15) . '<br/>';
        }
        
    }

   
}