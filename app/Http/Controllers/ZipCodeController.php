<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Http\Request;
use App\Http\Resources\ZipCodeCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ZipCodeController extends Controller
{
    public function show($zip_code): JsonResource
    {
        $zips = ZipCode::selectWithUpper()
            ->where('d_codigo', $zip_code)
            ->get();

        return ZipCodeCollection::make($zips);
    }
}
