<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CommandeOffreIndividu;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CommandeOffreIndividuController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $commandes = CommandeOffreIndividu::where('user_id', auth()->user()->id)
            ->with('offer', 'produit')
            ->get();

        // Group commandes by offer and date
        $groupedCommandes = $commandes->groupBy(['offer_id', function ($item) {
            return $item->created_at->toDateString(); // Group by date only
        }]);

        // Manually paginate the grouped collection
        $perPage = 10; // Number of items per page
        $currentPage = request()->get('page', 1);

        $totalItems = count($groupedCommandes);
        $pagedData = array_slice($groupedCommandes->all(), ($currentPage - 1) * $perPage, $perPage);

        $groupedCommandes = new LengthAwarePaginator($pagedData, $totalItems, $perPage, $currentPage, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);

        // Pass the paginated data to the view
        return view('offers.user_commandes', [
            'groupedCommandes' => $groupedCommandes,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Retrieve form data from the request
        $offerId = $request->input('id_offer');
        $productIds = $request->input('id_produit');
        $quantity = $request->input('quantity');
        $discount = $request->input('discount');
        $userId = auth()->user()->id;
        // Save the form data to your database or perform any other necessary actions
        // Example: You can use Eloquent to create a new record in your commandes table
        // Replace 'Commande' with your actual model name
        foreach ($productIds as $index => $productId) {
            CommandeOffreIndividu::create([
                'user_id' => $userId,
                'offer_id' => $offerId,
                'produit_id' => $productId,
                'quantite' => $quantity[$index],
                'discount' => $discount[$index],
            ]);
        }
        // Redirect back to the page or to a success page
        return redirect()->route('offers.index')->with('success', 'Votre commande est faite');
    }

    /**
     * Display the specified resource.
     */
    public function show($offerId)
    {
        // Retrieve CommandeOffreIndividu records for the specified offer_id
        $commandes = CommandeOffreIndividu::where('offer_id', $offerId)
            ->with('offer', 'produit')
            ->get();

        // You can handle the case where no commandes are found for the offer_id as needed

        return view('offers.commande_detail', compact('commandes'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeOffreIndividu $commandeOffreIndividu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeOffreIndividu $commandeOffreIndividu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeOffreIndividu $commandeOffreIndividu)
    {
        //
    }
    public function filter(Request $request)
    {
        $query = CommandeOffreIndividu::query()->with('offer', 'produit');
        // Apply the offer name search filter if the input is not empty
        if ($request->filled('search-offer-name')) {
            $query->whereHas('offer', function ($offerQuery) use ($request) {
                $offerQuery->where('offre_name', 'like', '%' . $request->input('search-offer-name') . '%');
            });
        }

        // Apply the created_at date filter if the input is not empty
        if ($request->filled('filter-created-at')) {
            $query->whereDate('created_at', '=', $request->input('filter-created-at'));
        }

        // Fetch the filtered and grouped commandes
        $filteredCommandes = $query->get();

        // You can return the filtered commandes as JSON or a view, depending on your needs
        return response()->json(['filteredCommandes' => $filteredCommandes]);

        // Alternatively, if you want to return a Blade view with the filtered data:
        // return view('your.view', compact('filteredOffers'));
    }
}
