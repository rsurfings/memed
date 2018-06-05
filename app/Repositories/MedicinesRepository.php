<?php
namespace App\Repositories;

use App\Interfaces\MedicinesInterface;

class MedicinesRepository implements MedicinesInterface
{

    public function create($params)
    {
        $result = app('db')->table('medicines')->insert([
            'nome' => $params->nome
        ]);
        
        return $result;
    }

    public function get()
    {
        return [
            'Ácido zoledrônico 4mg',
            'Água para injeção 1mL',
            'Bromazepam 3mg'
        ];
    }
}