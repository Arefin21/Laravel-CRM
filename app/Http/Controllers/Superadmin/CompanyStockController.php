<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Companystock;
use App\Models\StockIn;
use Illuminate\Http\Request;

class CompanyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'warehouseId' => 'required|array',
            'warehouseId.*' => 'exists:purchasecompanies,id', // Validate each warehouse ID exists
            'quantity' => 'required|array',
            'quantity.*' => 'numeric|min:0', // Ensure each quantity is a number and not negative
        ]);

        // Iterate through the warehouse IDs and quantities
        foreach ($request->warehouseId as $index => $warehouseId) {
            // Check if StockIn record already exists for the given product and warehouse
            $stockIn = Companystock::where('productId', $request->productId)
                ->where('warehouseId', $warehouseId)
                ->first();

            if ($stockIn) {
                // If it exists, update the quantity
                $stockIn->quantity += $request->quantity[$index]; // Add the new quantity to the existing quantity
                $stockIn->save(); // Save the updated record
            } else {
                // If it doesn't exist, create a new record
                $stockIn = new Companystock();
                $stockIn->productId = $request->productId;
                $stockIn->warehouseId = $warehouseId;
                $stockIn->quantity = $request->quantity[$index];
                $stockIn->save();
            }
        }

        // Redirect or return response after saving
        return redirect()->back()->with('successMsg', 'Stock updated successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
