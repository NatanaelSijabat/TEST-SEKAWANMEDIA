<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class EmployeeController extends BaseController
{
    public function index()
    {
        $data = Employee::with('location:id,name', 'jabatan:id,name', 'atasan')->latest()->get();

        return $this->sendResponse(EmployeeResource::collection($data), 'Data User');
    }
}
