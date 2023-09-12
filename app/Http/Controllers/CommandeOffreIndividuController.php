<?php

namespace App\Http\Controllers;

use App\Models\CommandeOffreIndividu;
use Illuminate\Http\Request;

class CommandeOffreIndividuController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Retrieve form data from the request
        $offerId = $request->input('id_offer');
        $productIds = $request->input('id_produit');
        $quantity = $request->input('quantity');
        $discount = $request->input('discount');
        $userId = auth()->user()->id;
        // Save the form data to your database or perform any other necessary actions
        // Example: You can use Eloquent to create a new record in your commandes table
        // Replace 'Commande' with your actual model name
        foreach ($productIds as $index => $productId) {
            CommandeOffreIndividu::create([
                'user_id' => $userId,
                'offer_id' => $offerId,
                'produit_id' => $productId,
                'quantite' => $quantity[$index],
                'discount' => $discount[$index],
            ]);
        }
        // Redirect back to the page or to a success page
        return redirect()->route('offers.index')->with('success', 'Votre commande est faite');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommandeOffreIndividu $commandeOffreIndividu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeOffreIndividu $commandeOffreIndividu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeOffreIndividu $commandeOffreIndividu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeOffreIndividu $commandeOffreIndividu)
    {
        //
    }
}
