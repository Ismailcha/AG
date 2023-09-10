<?php

namespace App\Http\Controllers;

use App\Models\OfferProduitIndividual;
use Illuminate\Http\Request;

class OfferProduitIndividualController extends Controller
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
        // Assuming you have the product-related fields in the form with the names you mentioned

        // Loop through the product-related input arrays (productName, productPrixAchat, qty, etc.)
        foreach ($request->input('produit_id') as $index => $produit_id) {
            $productData = [
                'offer_id' => $request->input('offer_id'),
                'produit_id' =>  $produit_id, // Replace with actual product ID
                'quantity' => $request->input('qty[]'),
                'discount' => $request->input('discount[]'),
            ];

            // Create a new record in the OfferProduitIndividual table
            OfferProduitIndividual::create($productData);
        }

        // Redirect to the offer details page or wherever you need to go
    }


    /**
     * Display the specified resource.
     */
    public function show(OfferProduitIndividual $OfferProduitIndividual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfferProduitIndividual $OfferProduitIndividual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OfferProduitIndividual $OfferProduitIndividual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfferProduitIndividual $OfferProduitIndividual)
    {
        //
    }
}
