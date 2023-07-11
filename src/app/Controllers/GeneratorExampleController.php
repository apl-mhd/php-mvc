<?php

declare(strict_types = 1);

namespace App\Controllers;


class GeneratorExampleController
{
    public function __construct()
    {
     
        
    }

    public function index()
    {
        $numbers = $this->lazyRange(1, 10);

        // echo $numbers->current();

        // $numbers->next();

        // echo $numbers->current();

        foreach($numbers as $key => $value) {
            echo $key . ': ' . $numbers . '<br/>';
        }
        // echo '<pre>';
        // print_r($numbers);
        // echo '</pre>';
    }

    public function lazyRange(int $start, int $end): \Generator
    {   $numbers = [];
        for($i = $start; $i <= $end; $i++){
            yield $i;
        }  
    }
}