<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role_users_id == 1 && auth()->user()->type_users_id != 1) {
            return redirect('/dashboard');
        } else if (auth()->user()->role_users_id == 2 && auth()->user()->type_users_id != 1) {
            return  redirect('/UserDashboard');
        } else {
            return auth()->logout();
        }
    }
}
