<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = $request->user()->clients;
        return response()->json([
            'clients' => $clients
        ]);
    }
}
