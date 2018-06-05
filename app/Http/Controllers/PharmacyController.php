<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PharmacyInterface;

/**
 *
 * @author Ronaldo Goncalves
 *        
 */
class PharmacyController extends Controller
{

    private $pharmacy;

    /**
     *
     * @param PharmacyInterface $pharmacy
     */
    public function __construct(PharmacyInterface $pharmacy)
    {
        $this->pharmacy = $pharmacy;
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse;
     */
    public function all(Request $request)
    {
        $params = json_decode($request->data);
        
        $pharmacys = $this->pharmacy->get($params);
        
        return response()->json($pharmacys);
    }

    /**
     *
     * @param Request $request
     */
    public function get(Request $request)
    {}

    /**
     *
     * @param Request $request
     */
    public function post(Request $request)
    {
        $this->validate($request, [
            'distance' => 'required',
            'pharmacyId' => 'required',
            'price' => 'required'
        ]);
        
        $params = new \stdClass();
        
        $params->distance = $request->distance;
        $params->pharmacyId = $request->pharmacyId;
        $params->price = $request->price;
        
        $result = $this->pharmacy->create($params);
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
