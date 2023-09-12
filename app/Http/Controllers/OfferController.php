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
        // Retrieve all offers with their associated products
        $offers = Offer::with('produits')->get();

        // Calculate the total prixVente for each offer and apply the escompte percentage
        $offers->each(function ($offer) {
            $totalPrixVente = $offer->produits->sum(function ($produit) {
                return $produit->pivot->quantity * $produit->prixVente;
            });

            // Apply the escompte percentage
            $totalPrixVenteWithEscompte = $totalPrixVente - ($totalPrixVente * ($offer->escompte / 100));

            $offer->totalPrixVenteWithEscompte = $totalPrixVenteWithEscompte;
        });

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
        $productIds = $request->input('produit_id');
        if (empty($productIds)) {
            return redirect()->route('offers.create')->with('success', 'L\'offre ne peut pas être enregistrée car aucun produit n\'a été ajouté.');
        }
        // Get the authenticated user's ID
        $userId = auth()->user()->id;

        // Create the offer with user_id
        $offer = Offer::create([
            'user_id' => $userId,
            'offre_name' => $validatedData['offre_name'],
            'laboratoire' => $validatedData['laboratoire'],
            'grossiste' => $validatedData['grossiste'],
            'date_start' => $validatedData['date_start'],
            'date_end' => $validatedData['date_end'],
            'escompte' => $validatedData['escompte'],
            'min_total' => $validatedData['min_total'],
        ]);
        // Collect data from the request

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

        return redirect()->route('offers.index')->with('success', 'Offre cree avec success');
    }




    // Show the details of an offer
    public function show($id)
    {
        $offer = Offer::with('produits')->findOrFail($id);
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
