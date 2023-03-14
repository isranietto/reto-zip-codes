<?php

namespace App\Code\Imports;

use Exception;

class ZipImportContext
{
    protected $import_files = [
        'xml' => ZipImportXml::class
    ];

    /**
     * @throws Exception
     */
    public static function type(string $file)
    {
        $type = (new self)->getTypeByString($file);

        if (!array_key_exists($type, (new self)->import_files)) {
            throw new Exception("No se cuenta con la clase para importar el archivo typo $type");
        }

        $class = (new self)->import_files[$type];
        return new $class($file);
    }

    private function getTypeByString(string $file): string
    {
        $type =  explode('.', $file);
        return $type[1];
    }
}
