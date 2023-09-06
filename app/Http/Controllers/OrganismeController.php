<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisme;
use App\Models\Produit; // Import the Organisme model
use Illuminate\Support\Facades\Log;

class OrganismeController extends Controller
{
    // List all organismes
    public function index()
    {
        $produits = Produit::all();
        $organismes = Organisme::all();
        return view('added_pages.organisme.index', compact('organismes', 'produits'));
    }

    // Show the create form
    public function create()
    {
        return view('');
    }

    // Store a new organisme
    public function store(Request $request)
    {
        try {
            // Validate the input
            $validatedData = $request->validate([
                'nom' => 'required',
                'type' => 'required', // Adjust this as needed based on your radio buttons
                'adress' => 'required',
                'email' => 'required|email',
                'telephone' => 'required',
                'ICE' => 'required',
                'Potent' => 'required',
                'RC' => 'required',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust this based on your file input
            ]);
            // Handle logo upload if provided
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('organisme_logos', 'public');
            }

            // Create a new Organisme record
            Organisme::create([
                'nom' => $validatedData['nom'],
                'type' => $validatedData['type'],
                'adress' => $validatedData['adress'],
                'email' => $validatedData['email'],
                'telephone' => $validatedData['telephone'],
                'ICE' => $validatedData['ICE'],
                'Potent' => $validatedData['Potent'],
                'RC' => $validatedData['RC'],
                'logo' => $logoPath,
            ]);

            return redirect()->route('organismes.index')->with('success', 'Organisme ajouté avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('organismes.index')->with('success', 'Une erreur s\'est produite lors de l\'ajout de l\'organisme.');
        }
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
