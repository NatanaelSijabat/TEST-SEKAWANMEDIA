<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    public function index()
    {
        $data = User::with('employee:id,firstname,lastname,type_users_id,locations_id,employees_id', 'role:id,name', 'locations')->latest()->get();

        return $data;
    }
}
// return $this->sendResponse(UserResource::collection($data), 'Data User');
