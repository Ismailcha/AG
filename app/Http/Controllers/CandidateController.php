<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Speciality;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::paginate(10); // Adjust the pagination as needed
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        $specialities = Speciality::all();
        return view('candidates.create', compact('specialities'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'date_de_naissance' => 'required|date',
        'gender' => 'required|in:male,female', // Ensure the gender is one of the specified values
        'ville' => 'required',
        'specialites' => 'required|array', // Assuming specialities is an array of selected IDs
        'disponibilite' => 'required|in:1,2', // Ensure the disponibilite is one of the specified values
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif',
        'resume' => 'required|mimes:pdf,docx',
    ]);

    // Handle file uploads for avatar and cv
    $avatarPath = $request->file('avatar')->store('avatars', 'public'); // Store avatar in 'storage/app/avatars' folder
    $cvPath = $request->file('resume')->store('cv'); // Store CV in 'storage/app/cv' folder

    // Create a new candidate
    $candidate = new Candidate();
    $candidate->nom = $request->input('nom');
    $candidate->prenom = $request->input('prenom');
    $candidate->date_de_naissance = $request->input('date_de_naissance');
    $candidate->gender = $request->input('gender');
    $candidate->ville = $request->input('ville');
    $candidate->disponibility = $request->input('disponibilite');
    $candidate->avatar = $avatarPath; // Save the path to the stored avatar image
    $candidate->resume_path = $cvPath; // Save the path to the stored CV file
    $candidate->save();

    // Attach selected specialities to the candidate
    $specialityIds = $request->input('specialites');
    $candidate->specialities()->attach($specialityIds);

    // Redirect to a success page or return a response as needed
    return redirect()->route('candidates.index')->with('success', 'Candidate added successfully.');
}




    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidates.show', compact('candidate'));
    }

    public function downloadResume($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            abort(404);
        }

        $path = storage_path('app/public/' . $candidate->resume);

        return response()->download($path, 'resume.pdf'); 
    }

    // You can implement the edit and update methods if needed.

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);

        // Delete associated files from storage
        Storage::delete([
            'public/' . $candidate->avatar,
            'public/' . $candidate->resume,
        ]);

        $candidate->delete();

        return redirect()->route('candidates.index')
            ->with('success', 'Candidate has been deleted.');
    }
}
