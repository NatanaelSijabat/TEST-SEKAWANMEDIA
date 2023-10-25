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
        $users = User::with('roles:id,name')->latest()->get();

        return $this->sendResponse(UserResource::collection($users), 'Data User');
    }
}
