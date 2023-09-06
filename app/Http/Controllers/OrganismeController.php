<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisme;
use App\Models\Produit; // Import the Organisme model

class OrganismeController extends Controller
{
    // List all organismes
    public function index()
    {
        $produits = Produit::all();
        $organismes = Organisme::all();
        return view('added_pages.organisme.index', compact('organismes' , 'produits'));
    }

    // Show the create form
    public function create()
    {
        return view('');
    }

    // Store a new organisme
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|in:1,2',
            'adress' => 'required|string|max:255',
            'email' => 'required|email|unique:organismes,email',
            'telephone' => 'required|string|max:20',
            'ICE' => 'required|string|max:20',
            'Potent' => 'required|string|max:255',
            'RC' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // If you want to validate the logo as an image
        ]);

        // Handle logo upload (if provided)
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('organisme_logos', 'public');
            $validatedData['logo'] = $logoPath;
        }

        // Create a new Organisme record
        Organisme::create($validatedData);

        // Redirect to a success page or the index page
        return redirect()->route('organismes.index')->with('success', 'Organisme created successfully');
    
    }

    // Show an organisme
    public function show(Organisme $organisme)
    {
        return view('organismes.show', compact('organisme'));
    }

    // Show the edit form
    public function edit(Organisme $organisme)
    {
        return view('organismes.edit', compact('organisme'));
    }

    // Update an organisme
    public function update(Request $request, Organisme $organisme)
    {
        // Validation and updating logic
    }

    // Delete an organisme
    public function destroy(Organisme $organisme)
    {
        // Deletion logic
    }
    public function showOrganisme($id)
{
    $organisme = Organisme::findOrFail($id);
    return view('organisme_modal', compact('organisme'));
}

}
