<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('added_pages.produit.categorie.liste_cat', compact('categories'));
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
        $validatedData = $request->validate([
            'nomCat' => 'required|string|max:255',
        ]);

        // Check if a category with the same name exists
        $existingCategory = Categorie::where('nomCat', $validatedData['nomCat'])->first();

        if ($existingCategory) {
            // Category already exists, you can return a message
            return redirect()->route('produit.create')->with('error', 'Category already exists.');
        } else {
            // Category doesn't exist, create a new one
            Categorie::create([
                'nomCat' => $validatedData['nomCat'],
            ]);

            return redirect()->route('produit.create')->with('success', 'Categories cree avec success.')->with('input', $request->input());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Edit category
    public function edit(Categorie $category)
    {
        //
    }

    // Update category
    public function update(Request $request, Categorie $category)
    {
        $request->validate([
            'nomCat' => 'required|string|max:255',
        ]);

        $category->update([
            'nomCat' => $request->input('nomCat'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Categorie modifier');
    }

    // Delete category
    public function destroy(Categorie $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categorie supprimer');
    }
}
