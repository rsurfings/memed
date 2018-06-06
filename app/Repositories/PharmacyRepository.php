<?php
namespace App\Repositories;

use App\Interfaces\PharmacyInterface;

/**
 * 
 * @author Ronaldo Goncalves
 *
 */
class PharmacyRepository implements PharmacyInterface
{

    /**
     * 
     * {@inheritDoc}
     * @see \App\Interfaces\PharmacyInterface::create()
     */
    public function create($params)
    {
        $result = app('db')->table('pharmacy')->insert([
            'pharmacyId' => $params->pharmacyId,
            'distance' => $params->distance,
            'price' => $params->price
        ]);
        
        return $result;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \App\Interfaces\PharmacyInterface::get()
     */
    public function get($params)
    {
        $lat = $params->lat;
        $lon = $params->lon;
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", "https://wydfdauvw5.execute-api.sa-east-1.amazonaws.com/desafio/farmacias");
        
        $stream = $response->getBody();
        $contents = json_decode($stream->getContents());
        $data = $contents->data;
        
        $farmacy = [];
        foreach ($data as $key => $value) {
            
            $distance = $this->haversine($lat, $lon, $value->attributes->lat, $value->attributes->lon);
            
            $info = $this->getInfo($value->links->self);
            $totalprice = $info['totalprice'];
            
            $index = $distance . $totalprice;
            $farmacys[$index] = [
                'id' => $value->id,
                'nome' => $value->attributes->nome,
                'distance' => $distance,
                'totalprice' => $totalprice,
                'info' => $info['data']
            ];
        }
        return min($farmacys);
    }

    /**
     * 
     * @param unknown $link
     * @return string[]
     */
    public function getInfo($link)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", $link);
        
        $stream = $response->getBody();
        $contents = json_decode($stream->getContents());
        $data = $contents->data;
        
        $info = [];
        $totalprice = 0;
        foreach ($data->attributes->medicamentos as $key => $value) {
            if ($value->nome != "Betaserc 16mg") {
                $value->preco = number_format($value->preco, 2);
                $totalprice += $value->preco;
                $info['data'][] = $value;
            }
        }
        
        $info['totalprice'] = number_format($totalprice, 2);
        return $info;
    }
    /**
    * @fonte https://pt.wikipedia.org/wiki/F%C3%B3rmula_de_Haversine
    */		
    public function haversine($p1LA, $p1LO, $p2LA, $p2LO)
    {
        $r = 6371.0;
        
        $p1LA = $p1LA * pi() / 180.0;
        $p1LO = $p1LO * pi() / 180.0;
        $p2LA = $p2LA * pi() / 180.0;
        $p2LO = $p2LO * pi() / 180.0;
        
        $dLat = $p2LA - $p1LA;
        $dLong = $p2LO - $p1LO;
        
        $a = sin($dLat / 2) * sin($dLat / 2) + cos($p1LA) * cos($p2LA) * sin($dLong / 2) * sin($dLong / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        
        return round($r * $c * 1000); // resultado em metros.
    }
}
