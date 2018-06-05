<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MedicinesInterface;

/**
 *
 * @author Ronaldo Goncalves
 *        
 */
class MedicinesController extends Controller
{

    private $medicines;

    /**
     *
     * @param MedicinesInterface $medicines
     */
    public function __construct(MedicinesInterface $medicines)
    {
        $this->medicines = $medicines;
    }

    /**
     *
     * @return \Illuminate\Http\JsonResponse;
     */
    public function all()
    {
        $medicines = $this->medicines->get();
        
        return response()->json($medicines);
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
            'nome' => 'required'
        ]);
        
        $params = new \stdClass();
        
        $params->nome = $request->nome;
        
        $result = $this->medicines->create($params);
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
