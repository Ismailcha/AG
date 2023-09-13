<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CommandeOffreIndividu;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Perform any additional checks or validation before deleting the user
        $user->delete();

        // Optionally, you can redirect the user to a specific page after deletion
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|int', // Assuming the role field is an integer
            // Add any other validation rules as per your requirements
        ]);

        // Update the user
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:1,2,3,4',
            // Add any other validation rules as per your requirements
        ]);

        // Create the user
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
            // Add any other fields you want to store in the user record
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    public function create()
    {
        return view('users.create');
    }
    public function userCommandes()
    {
        $commandes = CommandeOffreIndividu::where('user_id', auth()->user()->id)
            ->with('offer', 'produit') // Load relationships if you have defined them
            ->get();

        // Group commandes by offer
        $groupedCommandes = $commandes->groupBy('offer_id');

        return view('offers.user_commandes', compact('groupedCommandes'));
    }
}
