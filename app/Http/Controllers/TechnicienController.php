<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    public function index()
    {
        $techniciens = Technicien::paginate(10);

        return view('added_pages.technicien.list_technicien', compact('techniciens'));
    }
    public function create()
    {
        return view('added_pages.technicien.add_technicien');
    }

    // Store a newly created technician in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required',
            'email' => 'required|email',
            'societe' => 'required',
            'specialite' => 'required',
            'tel' => 'required|numeric',
        ]);

        Technicien::create($validatedData);

        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien a été bien ajouté.');
    }
    public function edit($id)
    {
        $technicien = Technicien::findOrFail($id);

        return view('added_pages.technicien.modify_technicien', compact('technicien'));
    }

    // Update the specified technician in the database
    public function update(Request $request, $id)
    {
        $technicien = Technicien::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required',
            'email' => 'required|email',
            'societe' => 'required',
            'specialite' => 'required',
            'tel' => 'required|numeric',
        ]);

        $technicien->update($validatedData);

        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien a été bien modifier.');
    }

    // Remove the specified technician from the database
    public function destroy($id)
    {
        $technicien = Technicien::findOrFail($id);
        $technicien->delete();

        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien a été supprimer.');
    }
}
