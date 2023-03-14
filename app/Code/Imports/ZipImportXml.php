<?php

namespace App\Code\Imports;

class ZipImportXml implements ZipImportInterface
{
    protected string $file_staging = __DIR__. '/../../Imports/';

    public function __construct(protected string $file)
    {}

    public function handlerToArray(): array
    {
        $xml_data = simplexml_load_file($this->getHowIsFileStaging() . $this->file) or die("Failed to load");
        @unlink($xml_data);

        $json = json_encode($xml_data);
        return json_decode($json, true);
    }

    public function setHowIsFileStaging(string $how)
    {
        $this->file_staging = $how;
    }

    public function getHowIsFileStaging(): string
    {
        return $this->file_staging;
    }
}
