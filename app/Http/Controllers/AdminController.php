<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function users()
    {
        if(!Auth::user()->isAdmin())
            return redirect()->route("index");

        return view("admin/users", ["users" => User::all()]);
    }

    public function setAdmin(int $id)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        $user = User::find($id);

        if(User::where("isAdmin", 1)->count() == 1 && $user->isAdmin())
            return view("admin/users", ["users" => User::all(), "error" => "Nelze smazat posledního administrátora"]);

        $user = User::find($id);
        $user->isAdmin = !$user->isAdmin;
        $user->save();

        return redirect()->route("userList");
    }
}
