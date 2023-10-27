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
        // $perPage = 10;

        $data = DB::table('orders')
            ->select(
                "orders.id",
                "kendaraans.name AS nama_kendaraan",
                "locations.name AS lokasi",
                "empKaryawan.id as IdKaryawan",
                DB::raw(
                    "CONCAT(empKaryawan.firstname, ' ', empKaryawan.lastname) AS karyawan",
                ),
                "empSupervisor.id AS IdSupervisor",
                DB::raw("CONCAT(empSupervisor.firstname, ' ', empSupervisor.lastname) AS supervisor"),
                "empManager.id AS IdManager",
                DB::raw("CONCAT(empManager.firstname, ' ', empManager.lastname) AS manager"),
                "staMa.name AS status_manager",
                "staSup.name AS status_supervisor",
                "orders.tanggal_pemakaian",
                "orders.tanggal_pengembalian"
            )
            ->join('kendaraans', 'orders.kendaraans_id', '=', 'kendaraans.id')
            ->join('locations', 'orders.locations_id', '=', 'locations.id')
            ->join('employees AS empKaryawan', 'orders.karyawan_id', '=', 'empKaryawan.id')
            ->join('employees AS empSupervisor', 'orders.supervisor_id', '=', 'empSupervisor.id')
            ->join('employees AS empManager', 'orders.manager_id', '=', 'empManager.id')
            ->join('statuses AS staMa', 'orders.status_manager', '=', 'staMa.id')
            ->join('statuses AS staSup', 'orders.status_supervisor', '=', 'staSup.id')->orderBy('orders.id', 'desc')->get();
        // ->paginate($perPage);

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
        $order = new Orders;
        $order->kendaraans_id = $request->kendaraans_id;
        $order->locations_id = $request->locations_id;
        $order->locations_id = $request->locations_id;
        $order->karyawan_id = $request->karyawan_id;
        $order->supervisor_id = $request->supervisor_id;
        $order->manager_id = $request->manager_id;
        $order->tanggal_pemakaian = $request->tanggal_pemakaian;
        $order->tanggal_pengembalian = $request->tanggal_pengembalian;

        $order->save();

        return response()->json([
            'success' => true,
            'data' => $order
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Orders::find($id);
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
        $status_manager = $request->status_manager;
        $status_supervisor = $request->status_supervisor;

        $order = Orders::find($id);
        if ($status_manager) {
            $order->status_manager = $status_manager;
            $order->save();
        } else
        if ($status_supervisor) {
            $order->status_supervisor = $status_supervisor;
            $order->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Di update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
