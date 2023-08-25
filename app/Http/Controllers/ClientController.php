<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClientData($clientId)
{
    // Fetch the client data from the database based on the provided client ID
    $client = Client::find($clientId);

    // Check if the client exists
    if (!$client) {
        return response()->json(['error' => 'Client not found'], 404);
    }

    // Return the client data as JSON response
    return response()->json($client);
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::paginate(5);

        return view('users.createclient', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'client_address' => 'required',
            'billing_address' => 'required',
        ]);
    
        $client = Client::create($validatedData);
        return back()->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        //
    }
}
