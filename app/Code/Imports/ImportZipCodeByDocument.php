<?php

namespace App\Code\Imports;

use App\Models\ZipCode;
use Illuminate\Support\Facades\DB;

class ImportZipCodeByDocument
{
    public function save(ZipImportInterface $interface)
    {
        $rows =  $interface->handlerToArray();

        DB::transaction(function () use ($rows) {

            ZipCode::query()->delete();

            foreach (array_chunk($rows, 1000) as $key => $chunks) {
                foreach ($chunks as $data) {
                    foreach ($data as $row) {
                        $row['c_CP'] = !empty($row['c_CP']) ? $row['c_CP'] : null;
                        $row['d_ciudad'] = !empty($row['d_ciudad']) ? $row['d_ciudad'] : '';
                        $row['c_cve_ciudad'] = !empty($row['c_cve_ciudad']) ? $row['c_cve_ciudad'] : '';

                        ZipCode::create($row);

                    }
                }
            }
        });
    }
}
