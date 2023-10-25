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
        $data = User::with('role:id,name', 'type:id,name', 'atasan:id,name')->latest()->get();

        // return $this->sendResponse(UserResource::collection($data), 'Data User');
        return $data;
    }
}
