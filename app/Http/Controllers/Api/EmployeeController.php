<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('jabatan');

        $query = Employee::with('location:id,name', 'jabatan:id,name', 'atasan')
            ->whereHas('jabatan', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->latest()
            ->get();


        return $this->sendResponse(EmployeeResource::collection($query), 'Data User');
    }
}
