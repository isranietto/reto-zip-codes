<?php

namespace Tests\Feature;

use App\Code\Imports\ImportZipCodeByDocument;
use App\Models\ZipCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImportByDocumentTest extends TestCase
{
    use RefreshDatabase;

    /* @test*/
    function test_import_zip_code_by_document_save_data_by_prueba_xml()
    {
        $file =  new ZipImportXmlDouble('prueba.xml');
        $path = __DIR__. "/../../storage/app/";

        $file->setHowIsFileStaging($path);

        $import = new ImportZipCodeByDocument();
        $import->save($file);

        $this->assertEquals(2, ZipCode::count());

        $this->assertDatabaseHas('zip_codes', [
            'd_codigo' => '01000',
            'd_asenta' => 'San Ángel'
        ]);
    }
}
