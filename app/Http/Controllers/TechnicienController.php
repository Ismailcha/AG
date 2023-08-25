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
            ->with('success', 'Technician added successfully.');
    }
}
