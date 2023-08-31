<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Estimates;
use App\Models\EstimatesAdd;
use App\Models\Expense;
use App\Models\Client;
use App\Models\Offre;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    public function searchArticles(Request $request)
    {
        $search = $request->input('search');

        // Perform the search query using the provided search term
        $produits = Produit::where('nom', 'LIKE', '%' . $search . '%')->get();

        // Return the search results as JSON
        return response()->json($produits);
    }
    public function index(Request $request)
    {
        $searchQuery = $request->query('search');
    
        if ($searchQuery) {
            $searchResults = Produit::where('name', 'like', '%' . $searchQuery . '%')->get();
        } else {
            $searchResults = [];
        }
    
        // $offres = Offre::all();
        $produits = Produit::all();
    
        return view('createestimate', compact('offres', 'produits', 'searchResults'));
    }
    public function create(Request $request)
{
    $searchQuery = $request->query('search');

    if ($searchQuery) {
        $searchResults = Produit::where('nom', 'like', '%' . $searchQuery . '%')->get();
    } else {
        $searchResults = [];
    }

    $produits = Produit::all();
    $clients = Client::all(); // Assuming you have an "Article" model

    return view('createestimate', compact('produits' , 'clients'));
}
    public function printTable()
    {
        $tableData = DB::table('estimates')->get();
        
        if ($tableData->isEmpty()) {
            echo "Table is empty.";
            return;
        }
        
        $headers = array_keys((array) $tableData->first());
        
        $table = [];
        foreach ($tableData as $row) {
            $table[] = (array) $row;
        }
        
        echo "<table>";
        
        // Print table headers
        echo "<tr>";
        foreach ($headers as $header){
            echo "<th>$header</th>";
        }
        echo "</tr>";
        
        // Print table rows
        foreach ($table as $row) {
            echo "<tr>";
            foreach ($row as $column) {
                echo "<td>$column</td>";
            }
            echo "</tr>";
        }
        
        echo "</table>";
    }
    /** page estimates */
    public function estimatesIndex()
    {
        $estimates     = DB::table('estimates')->get();
        $estimatesJoin = DB::table('estimates')
            ->join('estimates_adds', 'estimates.estimate_number', '=', 'estimates_adds.estimate_number')
            ->select('estimates.*', 'estimates_adds.*')
            ->get();
            $users = User::all();
            $estimates = DB::table('estimates')->paginate(10);
            $clients = Client::all();
            

        return view('sales.estimates',compact('estimates','estimatesJoin','clients'));
    }

    /** page create estimates */
    public function createEstimateIndex()
    {
        $produits = Produit::all();
        $users = User::all();
        $clients = Client::all();
        return view('sales.createestimate', compact('produits','users','clients'));
       

        
    }

    /** page edit estimates */
    public function editEstimateIndex($estimate_number)
    {
        $estimates          = DB::table('estimates') ->where('estimate_number',$estimate_number)->first();
        $estimatesJoin = DB::table('estimates')
            ->join('estimates_adds', 'estimates.estimate_number', '=', 'estimates_adds.estimate_number')
            ->select('estimates.*', 'estimates_adds.*')
            ->where('estimates_adds.estimate_number',$estimate_number)
            ->get();
        return view('sales.editestimate',compact('estimates','estimatesJoin'));
    }

    /** view page estimate */
    public function viewEstimateIndex($estimate_number)
    {
        $estimatesJoin = DB::table('estimates')
            ->join('estimates_adds', 'estimates.estimate_number', '=', 'estimates_adds.estimate_number')
            ->select('estimates.*', 'estimates_adds.*')
            ->where('estimates_adds.estimate_number',$estimate_number)
            ->get();
        return view('sales.estimateview',compact('estimatesJoin'));
    }

    /** save record create estimate */
    public function createEstimateSaveRecord(Request $request)
    {
        $request->validate([
            'client'   => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $estimates = new Estimates;
            $estimates->client = $request->client;
            $estimates->project= $request->project;
            $estimates->email  = $request->email;
            $estimates->tax    = $request->tax;
            $estimates->client_address = $request->client_address;
            $estimates->billing_address= $request->billing_address;
            $estimates->estimate_date = $request->estimate_date;
            $estimates->expiry_date   = $request->expiry_date;
            $estimates->total = $request->total;
            $estimates->tax_1 = $request->tax_1;
            $estimates->discount    = $request->discount;
            $estimates->grand_total = $request->grand_total;
            $estimates->other_information = $request->other_information;
            $estimates->save();

            $estimate_number = DB::table('estimates')->orderBy('estimate_number','DESC')->select('estimate_number')->first();
            $estimate_number = $estimate_number->estimate_number;

            foreach($request->item as $key => $items)
            {
                $estimatesAdd['item']            = $items;
                $estimatesAdd['estimate_number'] = $estimate_number;
                $estimatesAdd['description']     = $request->description[$key];
                $estimatesAdd['unit_cost']       = $request->unit_cost[$key];
                $estimatesAdd['qty']             = $request->qty[$key];
                $estimatesAdd['amount']          = $request->amount[$key];

                EstimatesAdd::create($estimatesAdd);
            }

            DB::commit();
            Toastr::success('Create new Estimates successfully :)','Success');
            return redirect()->route('form/estimates/page');
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Estimates fail :)','Error');
            return redirect()->back();
        }
    }

    /** update record estimate */
    public function EstimateUpdateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
           
            $update = [
                'id'                => $request->id,
                'client'            => $request->client,
                'project'           => $request->project,
                'email'             => $request->email,
                'tax'               => $request->tax,
                'client_address'    => $request->client_address,
                'billing_address'   => $request->billing_address,
                'estimate_date'     => $request->estimate_date,
                'expiry_date'       => $request->expiry_date,
                'total'             => $request->total,
                'tax_1'             => $request->tax_1,
                'discount'          => $request->discount,
                'grand_total'       => $request->grand_total,
                'other_information' => $request->other_information,
            ];
            Estimates::where('id',$request->id)->update($update);
            /** delete record */
            foreach ($request->estimates_adds as $key => $items) {
                DB::table('estimates_adds')->where('id', $request->estimates_adds[$key])->delete();
            }
            /** insert new record */
            foreach($request->item as $key => $item)
            {
                $estimatesAdd['estimate_number'] = $request->estimate_number;
                $estimatesAdd['item']            = $request->item[$key];
                $estimatesAdd['description']     = $request->description[$key];
                $estimatesAdd['unit_cost']       = $request->unit_cost[$key];
                $estimatesAdd['qty']             = $request->qty[$key];
                $estimatesAdd['amount']          = $request->amount[$key];

                EstimatesAdd::create($estimatesAdd);
            }
           
            DB::commit();
            Toastr::success('Updated Estimates successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Update Estimates fail :)','Error');
            return redirect()->back();
        } 
    }

    /** delete record estimate add */
    public function EstimateAddDeleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            EstimatesAdd::destroy($request->id);

            DB::commit();
            Toastr::success('Estimates deleted successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Estimates deleted fail :)','Error');
            return redirect()->back();
        }
    }
    
    /** delete record estimate */
    public function EstimateDeleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            /** delete record table estimates_adds */
            $estimate_number = DB::table('estimates_adds')->where('estimate_number',$request->estimate_number)->get();
            foreach ($estimate_number as $key => $id_estimate_number) {
                DB::table('estimates_adds')->where('id', $id_estimate_number->id)->delete();
            }

            /** delete record table estimates */
            Estimates::destroy($request->id);

            DB::commit();
            Toastr::success('Estimates deleted successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Estimates deleted fail :)','Error');
            return redirect()->back();
        }
    }

    /** view payments page */
    public function Payments()
    {
       return view('sales.payments');
    }

    /** expenses page index */
    public function Expenses()
    {
        /** get data show data on table page expenses */
        $data = DB::table('expenses')->get();
        return view('sales.expenses',compact('data'));
    }

    // save record
    public function saveRecord(Request $request)
    {
        $request->validate([
            'item_name'    => 'required|string|max:255',
            'purchase_from'=> 'required|string|max:255',
            'purchase_date'=> 'required|string|max:255',
            'purchased_by' => 'required|string|max:255',
            'amount'       => 'required|string|max:255',
            'paid_by'      => 'required|string|max:255',
            'status'       => 'required|string|max:255',
            'attachments'  => 'required',
        ]);

        DB::beginTransaction();
        try {

            $attachments = time().'.'.$request->attachments->extension();  
            $request->attachments->move(public_path('assets/images'), $attachments);

            $expense = new Expense;
            $expense->item_name  = $request->item_name;
            $expense->purchase_from = $request->purchase_from;
            $expense->purchase_date = $request->purchase_date;
            $expense->purchased_by  = $request->purchased_by;
            $expense->amount  = $request->amount;
            $expense->paid_by = $request->paid_by;
            $expense->status  = $request->status;
            $expense->attachments  = $attachments;
            $expense->save();
            
            DB::commit();
            Toastr::success('Create new Expense successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Expense fail :)','Error');
            return redirect()->back();
        }
    }

    // update
    public function updateRecord( Request $request)
    {
        DB::beginTransaction();
        try{
           
            $attachments = $request->hidden_attachments;
            $attachment  = $request->file('attachments');
            if($attachment != '')
            {
                unlink('assets/images/'.$attachments);
                $attachments = time().'.'.$attachment->getClientOriginalExtension();  
                $attachment->move(public_path('assets/images'), $attachments);
            } else {
                $attachments;
            }
            
            $update = [

                'id'           => $request->id,
                'item_name'    => $request->item_name,
                'purchase_from'=> $request->purchase_from,
                'purchase_date'=> $request->purchase_date,
                'purchased_by' => $request->purchased_by,
                'amount'       => $request->amount,
                'paid_by'      => $request->paid_by,
                'status'       => $request->status,
                'attachments'  => $attachments,
            ];

            Expense::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Expense updated successfully :)','Success');
            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Expense update fail :)','Error');
            return redirect()->back();
        }
    }

    // delete
    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try{

            Expense::destroy($request->id);
            unlink('assets/images/'.$request->attachments);
            DB::commit();
            Toastr::success('Expense deleted successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Expense deleted fail :)','Error');
            return redirect()->back();
        }
    }

    /** search record */
    public function searchRecord(Request $request)
    {
        $data = DB::table('expenses')->get();

        // search by item name
        if(!empty($request->item_name) && empty($request->from_date) && empty($request->to_data))
        {
            $data = Expense::where('item_name','LIKE','%'.$request->item_name.'%')->get();
        }

        // search by from_date to_data
        if(empty($request->item_name) && !empty($request->from_date) && !empty($request->to_date))
        {
            $data = Expense::whereBetween('purchase_date',[$request->from_date, $request->to_date])->get();
        }
        
        // search by item name and from_date to_data
        if(!empty($request->item_name) && !empty($request->from_date) && !empty($request->to_date))
        {
            $data = Expense::where('item_name','LIKE','%'.$request->item_name.'%')
                            ->whereBetween('purchase_date',[$request->from_date, $request->to_date])
                            ->get();
        }

        return view('sales.expenses',compact('data'));
    }
}
