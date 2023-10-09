<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Item::query();

        // Filter by maximum price if provided
        if ($request->has('max_price')) {
            // Remove the "DH" prefix and convert to float for filtering
            $maxPrice = (float)str_replace(['DH', ','], '', $request->input('max_price'));
            $query->where('price', '<=', $maxPrice);
        }

        // Get paginated items
        $items = $query->paginate(10);

        return view('items.index', compact('items'));
    }


    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created item in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming data (including multiple images)
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'seller_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Multiple photo uploads
        ]);

        // Create the item in the database
        $item = Item::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'seller_name' => $request->input('seller_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'city' => $request->input('city'),
        ]);

        // Handle multiple photo uploads
        $photos = $request->file('photos');
        if ($photos) {
            $imagePaths = [];
            foreach ($photos as $photo) {
                $path = $photo->store('item_photos', 'public');
                $imagePaths[] = $path;
            }
            // Associate the images with the item
            $item->addImages($imagePaths);
        }

        // Redirect to the item's details page
        return redirect()->route('items.index');
    }


    /**
     * Display the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id); // Find the item by its ID
        return view('items.show', compact('item'));
    }

    // Additional methods for updating and deleting items can be added here as needed

}
