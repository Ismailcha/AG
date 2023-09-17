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
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'genre' => 'required|in:Male,Female',
            'ville' => 'required',
            'specialities' => 'required|array',
            'specialities.*' => 'exists:specialities,id',
            'disponibilite' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $resumePath = $request->file('resume')->store('resumes', 'public');

        $candidate = new Candidate([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'date_naissance' => $request->input('date_naissance'),
            'genre' => $request->input('genre'),
            'ville' => $request->input('ville'),
            'disponibilite' => $request->input('disponibilite'),
            'avatar' => $avatarPath,
            'resume' => $resumePath,
        ]);

        $candidate->save();

        // Attach selected specialities to the candidate
        $candidate->specialities()->attach($request->input('specialities'));

        return redirect()->route('candidates.index')
            ->with('success', 'Candidate has been registered successfully.');
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

        return response()->download($path, 'resume.pdf'); // Adjust the filename as needed.
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
