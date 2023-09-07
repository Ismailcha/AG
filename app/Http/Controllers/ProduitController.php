<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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
        $produits = Produit::paginate(4);

        return view('added_pages.produit.liste_produit', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('added_pages.produit.add_produit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the input
            $validatedData = $request->validate([
                'nom' => 'required',
                'description' => 'required',
                'prixAchat' => 'required|numeric',
                'prixVente' => 'required|numeric',
                'laboratoire' => 'required',
                'grossiste' => '',
                'categorie_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            $imagePath = $request->file('image')->store('produit_images', 'public');

            // Create a new produit record
            Produit::create([
                'nom' => $validatedData['nom'],
                'description' => $validatedData['description'],
                'prixAchat' => $validatedData['prixAchat'],
                'prixVente' => $validatedData['prixVente'],
                'laboratoire' => $validatedData['laboratoire'],
                'grossiste' => $validatedData['grossiste'],
                'categorie_id' => $validatedData['categorie_id'],
                'image' => $imagePath,
            ]);

            return redirect()->route('produit.index')->with('success', 'Produit ajouté avec succès!')->withInput();
        } catch (\Exception $e) {
            return redirect()->route('produit.index')->with('success', 'Une erreur s\'est produite lors de l\'ajout du produit.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit = Produit::find($id);

        return response()->json(['produit' => $produit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);

        return view('added_pages.produit.modify_produit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::findOrFail($id); // Find the product by ID

        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prixAchat' => 'required|numeric',
            'prixVente' => 'required|numeric',
            'laboratoire' => 'required',
            'grossiste' => '',
            'categorie_id' => 'required',
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

        return redirect()->route('produit.index')->with('success', 'Produit modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        // Perform any additional validation or checks here before deleting

        $produit->delete();

        return redirect()->route('produit.index')->with('success', 'Product deleted successfully.');
    }
    public function search(Request $request)
{
    $query = $request->input('query');

    // Perform the search based on the 'nom' field
    $produits = Produit::where('nom', 'like', '%' . $query . '%')->get();

    return view('offers.create', compact('produits'));
}

}
