<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view("clients/clients", ["clients" => Client::all()]);
    }
    
    public function addClient()
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        return view("clients/addClient");
    }
    
    public function editClient(int $id)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        return view("clients/editClient", ["client"=> Client::find($id)]);
    }
    
    public function editClientPatch(Request $request, int $id)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        $validated = Client::validate($request);

        Client::editClient($validated, $id);
        return redirect()->route("clients");
    }
    
    public function addClientPost(Request $request)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        $validated = Client::validate($request);

        Client::addClient($validated);

        return redirect()->route("clients");
    }

    public function removeClient(int $id)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        Client::find($id)->delete();
        return redirect()->route("clients");
    }
}
