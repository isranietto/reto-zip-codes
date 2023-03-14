<?php

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use App\Code\Imports\ZipImportContext;

class ImportByDocumentTest extends TestCase
{
    /** @test **/
    function it_test_zip_context_correctly()
    {
        $zip_context =  ZipImportContext::type('file.xml');

        $this->assertInstanceOf('App\Code\Imports\ZipImportXml', $zip_context);
    }
}


