<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\KendaraanResource;
use App\Models\Kendaraan;

class KendaraanController extends BaseController
{
    public function index()
    {
        $kendaraans = Kendaraan::with('jenis:id,name', 'type:id,name')->latest()->get();

        return $this->sendResponse(KendaraanResource::collection($kendaraans), 'Data Kendaraan');
    }
}
