<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all(); // Fetch all products from the database

        return view('added_pages.produit.liste_produit', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('added_pages.produit.add_produit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'categorie' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('produit_images', 'public');

        // Create a new produit record
        Produit::create([
            'nom' => $validatedData['nom'],
            'description' => $validatedData['description'],
            'prix' => $validatedData['prix'],
            'categorie' => $validatedData['categorie'],
            'image' => $imagePath,
        ]);
        try {
            DB::transaction(function () use ($validatedData, $request) {
                $imagePath = $request->file('image')->store('produit_images', 'public');

                Produit::create([
                    'nom' => $validatedData['nom'],
                    'description' => $validatedData['description'],
                    'prix' => $validatedData['prix'],
                    'categorie' => $validatedData['categorie'],
                    'image' => $imagePath,
                ]);
            });

            return redirect()->route('produits.create')->with('success', 'Produit ajouté avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('produits.create')->with('error', 'Une erreur est survenue lors de l\'ajout du produit.');
        }

        return redirect()->route('produits.create')->with('success', 'Produit ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit, $id)
    {
        $produit = Produit::findOrFail($id);

        return view('added_pages.produit.modify_produit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit, $id)
    {
        $produit = Produit::findOrFail($id); // Find the product by ID

        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'categorie' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Upload the new image
            $imagePath = $request->file('image')->store('produit_images', 'public');

            // Delete the old image if it exists
            if ($produit->image) {
                Storage::disk('public')->delete($produit->image);
            }

            // Update the image attribute of the product
            $produit->image = $imagePath;
        }

        $produit->update($validatedData);

        return redirect()->route('produits.liste')->with('success', 'Produit modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
