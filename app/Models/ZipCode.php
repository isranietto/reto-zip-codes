<?php

namespace App\Models;

use App\Models\Query\ZipCodeQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder;

class ZipCode extends Model
{
    use HasFactory;

    protected $fillable = [
        "d_codigo",
        "d_asenta",
        "d_tipo_asenta",
        "D_mnpio",
        "d_estado",
        "d_ciudad",
        "d_CP",
        "c_estado",
        "c_oficina",
        "c_CP",
        "c_tipo_asenta",
        "c_mnpio",
        "id_asenta_cpcons",
        "d_zona",
        "c_cve_ciudad",
    ];

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return Builder|ZipCodeQuery
     */
    public function newEloquentBuilder($query): Builder| ZipCodeQuery
    {
        return new ZipCodeQuery($query);
    }
}
