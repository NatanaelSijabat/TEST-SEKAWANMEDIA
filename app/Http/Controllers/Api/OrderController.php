<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderResource;
use App\Models\JenisKendaraan;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::select(
            "SELECT orders.id, kendaraans.name AS nama_kendaraan, locations.name AS lokasi,
            CONCAT(empKaryawan.firstname, ' ', empKaryawan.lastname) AS karyawan,
            CONCAT(empSupervisor.firstname, ' ', empSupervisor.lastname) AS supervisor,
            CONCAT(empManager.firstname, ' ', empManager.lastname) AS manager,
            staMa.name AS status_manager,
            staSup.name AS status_supervisor,
            orders.tanggal_pemakaian,
            orders.tanggal_pengembalian
     FROM orders
     JOIN kendaraans ON orders.kendaraans_id = kendaraans.id
     JOIN locations ON orders.locations_id = locations.id
     JOIN employees AS empKaryawan ON orders.karyawan_id = empKaryawan.id
     JOIN employees AS empSupervisor ON orders.supervisor_id = empSupervisor.id
     JOIN employees AS empManager ON orders.manager_id = empManager.id
     JOIN statuses AS staMa ON orders.status_manager = staMa.id
     JOIN statuses AS staSup ON orders.status_supervisor = staSup.id

     "
        );

        return $this->sendResponse($data, 'Data Orders');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
