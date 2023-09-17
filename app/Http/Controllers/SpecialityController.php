<?php

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

    return response()->json(['success' => true, 'speciality' => $speciality]);
}

}
