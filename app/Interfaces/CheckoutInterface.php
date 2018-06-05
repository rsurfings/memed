<?php
namespace App\Interfaces;

/**
 *
 * @author Ronaldo Goncalves
 *        
 */
interface CheckoutInterface
{

    /**
     *
     * @param unknown $params
     */
    public function create($params);

    /**
     */
    public function get();
}
