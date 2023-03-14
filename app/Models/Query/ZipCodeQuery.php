<?php

namespace App\Models\Query;

use Illuminate\Database\Eloquent\Builder;
class ZipCodeQuery extends Builder
{
    public function selectWithUpper()
    {
        return $this->select('*')
            ->selectRaw('UPPER(d_ciudad) AS d_ciudad')
            ->selectRaw('UPPER(d_estado) AS d_estado')
            ->selectRaw('UPPER(D_mnpio) AS D_mnpio')
            ->selectRaw('UPPER(d_asenta) AS d_asenta')
            ->selectRaw('UPPER(d_zona) AS d_zona');
    }
}
