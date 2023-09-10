<?php

namespace App\Http\Controllers;

use App\Models\OfferProduitIndividual;
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
        $offer = new Offer(); // Create an empty Offer model instance
        return view('offers.create', compact('produits', 'offer'));
    }

    // Store a newly created offer in the database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'offre_name' => 'required|string|max:255',
            'laboratoire' => 'required|string|max:255',
            'grossiste' => 'nullable|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'escompte' => 'required|numeric',
            'min_total' => 'required|numeric',
        ]);

        // Create the offer
        $offer = Offer::create($validatedData);

        // Collect data from the request
        $productIds = $request->input('produit_id');
        $quantities = $request->input('qty');
        $discounts = $request->input('discount');
        // Ensure $productIds is an array
        foreach ($productIds as $index => $productId) {
            OfferProduitIndividual::create([
                'offer_id' => $offer->id,
                'produit_id' => $productId,
                'quantity' => $quantities[$index],
                'discount' => $discounts[$index],
            ]);
        }
        return redirect()->route('offers.index')->with('success', 'Products added to the offer successfully.');
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
