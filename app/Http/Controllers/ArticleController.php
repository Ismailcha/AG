<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
    
        // Perform the search query on the articles table using the $searchQuery
    
        // Example:
        $articles = Article::where('nom', 'LIKE', "%{$searchQuery}%")->get();
    
        return view('articles.search', compact('articles'));
    }
    
    public function index()
    {
        
        // Retrieve all articles from the database
        $articles = Article::paginate(5); // Paginate the articles with 10 items per page

        // Pass the articles to the view
        
        return view('articless.index', compact('articles'));
    }
    
    public function destroy($id)
{
    // Find the article by id_product
    $article = Article::where('id',$id)->first();

    // Check if the article exists
    if (!$article) {
        return redirect()->back()->with('error', 'Article not found.');
    }

    // Delete the article
    $article->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Article deleted successfully.');
}

    public function create()
    {
        return view('add');
    }
    
    public function createproduct(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'ppv' => 'required',
            'pph' => 'required',
            'Laboratoire' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $data = [
            'nom' => $request->input('nom'),
            'ppv' => $request->input('ppv'),
            'pph' => $request->input('pph'),
            'Laboratoire' => $request->input('Laboratoire'),
        ];

        // Handle the photo file
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            // Generate unique file name
            $photoName = time() . '_' . $photo->getClientOriginalName();

            // Move the file to the desired location
            $photo->move(public_path('images'), $photoName);

            // Assign the file name to the 'photo' field
            $data['photo'] = $photoName;
        }

        try {
            Article::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        
        return redirect()->route('articles.create')->with('success', 'Form submitted successfully!');
        
    }
    public function articleupdate(Request $request, Article $article)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nom' => 'required',
            'ppv' => 'required',
            'pph' => 'required',
            'min' => 'required',
            'remise' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add any relevant validation rules for the photo field
        ]);

        // Update the article with the validated data
        $article->nom = $validatedData['nom'];
        $article->ppv = $validatedData['ppv'];
        $article->pph = $validatedData['pph'];
        $article->min = $validatedData['min'];
        $article->remise = $validatedData['remise'];

        // Handle the photo upload if provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('public/images');
            $article->photo = basename($photoPath);
        }

        // Save the updated article
        $article->save();

        // Redirect to a success page or perform any other actions

        // Example: Redirect to the article show page
        return redirect()->route('articles.show', ['article' => $article]);
    }
    public function show($id)
    {
        $article = Article::find($id);

        return response()->json(['article' => $article]);
    }
    
}
