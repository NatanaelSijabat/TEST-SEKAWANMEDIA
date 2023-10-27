<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AllResource;
use App\Models\Locations;

class AllController extends BaseController
{
    public function index()
    {
        $data = Locations::with('kendaraan', 'employe')->latest()->get();

        return $this->sendResponse($data, 'Data All');
    }

    public function show($id)
    {
        $data = Locations::with('kendaraan', 'employe')->find($id);

        if (!$data) {
            return $this->sendError('Location not found.');
        }

        return $this->sendResponse($data, 'Data All');
    }
}
