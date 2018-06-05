<?php
namespace App\Interfaces;

/**
 * 
 * @author Ronaldo Goncalves
 *
 */
interface MedicinesInterface
{

    /**
     * 
     * @param unknown $params
     */
    public function create($params);
    
    /**
     * 
     */
    public function get();
}
