<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CheckoutInterface;

/**
 *
 * @author Ronaldo Goncalves
 *        
 */
class CheckoutController extends Controller
{

    private $checkout;

    /**
     *
     * @param checkoutInterface $checkout
     */
    public function __construct(CheckoutInterface $checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse;
     */
    public function all(Request $request)
    {
        $checkouts = $this->checkout->get();
        
        return response()->json($checkouts);
    }

    /**
     *
     * @param Request $request
     */
    public function get(Request $request)
    {
        
    }

    /**
     *
     * @param Request $request
     */
    public function post(Request $request)
    {
        $params = new \stdClass();
        $params->id = $request->id;
        $params->nome = $request->nome;
        $params->distance = $request->distance;
        $params->totalprice = $request->totalprice;
        $params->info = $request->info;
        
        $result = $this->checkout->create($params);
        
        return response()->json($result);
    }

    /**
     *
     * @param Request $request
     */
    public function put(Request $request)
    {}

    /**
     *
     * @param Request $request
     */
    public function delete(Request $request)
    {}
}
