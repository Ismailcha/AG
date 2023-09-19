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
        'nom' => 'required',
        'prenom' => 'required',
        'date_naissance' => 'required',
        'genre' => 'required',
        'ville' => 'required',
        'specialites' => 'required|array', // Validate as an array
        'disponibilite' => 'required',
        'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation for your file input
        'cv' => 'mimes:pdf,doc,docx|max:2048', // Adjust the validation for your file input
    ]);

    // Create the candidate
    $candidate = Candidate::create($validatedData);

    // Attach selected specialities to the candidate
    $candidate->specialities()->attach($request->input('specialites'));

    return redirect()->route('candidates.index')
        ->with('success', 'Candidat a été bien ajouté.');
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
