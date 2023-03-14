<?php

namespace Tests\Feature;

use App\Models\ZipCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ZipCodeTest extends TestCase
{
    use RefreshDatabase;

    /* @test */
    function test_get_data_by_zip_code()
    {
//        $this->withoutExceptionHandling();

        $zip =  ZipCode::factory()->create($this->simpleData());

        $response = $this->getJson('/api/zip-codes/'. $zip->d_codigo);

        $response->assertExactJson([
            "zip_code" => "01210",
            "locality" => "CIUDAD DE MEXICO",
            "federal_entity" =>  [
                "key"  => 9,
                "name" =>  "CIUDAD DE MEXICO",
                "code" =>  null
            ],
            "settlements" => [
                [
                    "key"=> 82,
                    "name"=> "SANTA FE",
                    "zone_type"=> "URBANO",
                    "settlement_type"=> [
                        "name"=>  "Pueblo"
                    ]
                ]
            ],
            "municipality" => [
                "key" => 10,
                "name" =>  "ALVARO OBREGON"
            ]
        ]);
    }

    private function simpleData()
    {
        return [
            'd_codigo' => '01210',
            'd_asenta' => 'Santa Fe',
            'd_tipo_asenta' =>  'Pueblo',
            'D_mnpio' => 'Álvaro Obregón',
            'd_estado' => 'Ciudad de México',
            'd_ciudad' => 'Ciudad de México',
            'd_CP' => '01401',
            'c_estado' => 9,
            'c_oficina' => '01401',
            'c_CP' => null ,
            'c_tipo_asenta' => 28,
            'c_mnpio' => 10,
            'id_asenta_cpcons' => 82,
            'd_zona' => 'Urbano' ,
            'c_cve_ciudad' => 1,
        ];
    }
}
