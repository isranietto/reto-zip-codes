<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;

class ZipCodeCollection extends ResourceCollection
{
    public static $wrap = null;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $first = $this->collection[0];

        return [
            "zip_code" => $first['d_codigo'],
            "locality" => Str::ascii($first['d_ciudad']),
            "federal_entity" =>  [
                "key"  => (int) $first['c_estado'],
                "name" => Str::ascii($first['d_estado']),
                "code" =>  $first['c_CP']
            ],
            "settlements" => $this->settlementsStructure(),
            "municipality" => [
                "key" => (int) $first['c_mnpio'],
                "name" => Str::ascii($first['D_mnpio'])
            ]
        ];
    }

    private function settlementsStructure()
    {
         return $this->collection->map(function ($codes) {
            return [
                "key"=> (int) $codes['id_asenta_cpcons'],
                "name"=> Str::ascii($codes['d_asenta']),
                "zone_type"=> $codes['d_zona'],
                  "settlement_type"=> [
                      "name"=>  $codes['d_tipo_asenta']
                  ]
            ];
        });
    }

    private function stripAccents($str): string
    {
        return strtr(
            utf8_decode($str),
            utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'),
            'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'
        );
    }
}
