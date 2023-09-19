<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommandeOffreIndividu;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = CommandeOffreIndividu::with('offer', 'produit', 'user')
            ->get();

        // Group commandes by offer and date
        $groupedCommandes = $commandes->groupBy(['offer_id', function ($item) {
            return $item->created_at->toDateString(); // Group by date only
        }]);

        return view('offers.commande_admin', compact('groupedCommandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
