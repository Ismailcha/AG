<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::paginate(10);
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
    // Make sure to import the Categorie model

    public function store(Request $request)
    {
        $request->validate([
            'nomCat' => 'required|unique:categories',
        ]);

        $categorie = Categorie::create([
            'nomCat' => $request->nomCat, // Use 'nomCat' from the request
        ]);

        // Redirect to the desired route with a success message
        return redirect()->route('produit.create')->with('success', 'Category created successfully');
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
