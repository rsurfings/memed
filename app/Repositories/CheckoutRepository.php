<?php
namespace App\Repositories;

use App\Interfaces\CheckoutInterface;

class CheckoutRepository implements CheckoutInterface
{

    /**
     * 
     * {@inheritDoc}
     * @see \App\Interfaces\CheckoutInterface::create()
     */
    public function create($params)
    {
        $result = app('db')->table('checkout')->insert([
            'buyed' => json_encode($params),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        
        return $result;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \App\Interfaces\CheckoutInterface::get()
     */
    public function get()
    {
        $checkout = app('db')->table('checkout')->paginate();
        
        return $checkout;
    }
}