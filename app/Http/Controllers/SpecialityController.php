<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speciality; // Adjust the namespace as per your application's structure

class SpecialityController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:specialities',
        ]);

        $speciality = Speciality::create([
            'name' => $request->name,
        ]);

        // Redirect to a specific route (e.g., the index page for specialities) with a success message
        return redirect()->route('candidates.create')->with('success', 'Specialiter a etait bien cree');
    }
}
