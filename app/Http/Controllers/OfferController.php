<?php

namespace App\Http\Controllers;

use App\Models\Offer; // Import the Offer model with the correct namespace
use Illuminate\Http\Request;
use App\Models\Produit;

class OfferController extends Controller
{
    // Display a list of offers
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    // Show the form for creating a new offer
    public function create()
    {
        $produits = Produit::all();
        return view('offers.create', compact('produits'));
    }

    // Store a newly created offer in the database
    public function store(Request $request)
    {
        // Validate the request data

        // Create the offer
        $offer = Offer::create($request->all());

        // Attach products to the offer (if selected)

        // Calculate discounted prices (if needed)

        // Redirect to the offer details page
    }

    // Show the details of an offer
    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.show', compact('offer'));
    }

    // Show the form for editing an offer
    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $produits = Produit::all();
        return view('offers.edit', compact('offer', 'produits'));
    }

    // Update the specified offer in the database
    public function update(Request $request, $id)
    {
        // Validate the request data

        // Update the offer

        // Attach/detach products to/from the offer (if selected)

        // Calculate discounted prices (if needed)

        // Redirect to the offer details page
    }

    // Remove a product from an offer
    public function removeProduct(Request $request, $offerId, $produitId)
    {
        // Remove the product from the offer (detach)

        // Recalculate discounted prices (if needed)

        // Redirect back to the offer edit page
    }

    // Delete an offer
    public function destroy($id)
    {
        // Delete the offer and related offer_produit rows (if needed)

        // Redirect to the list of offers
    }
}
