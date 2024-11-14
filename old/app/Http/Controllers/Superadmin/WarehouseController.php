<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouselist = Warehouse::all();
        return view('superadmin.warehouse.index', compact('warehouselist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:warehouses,name',
        ], [
            'name.unique' => 'Warehouse Name already exists.'
        ]);
        $news = new Warehouse();
        $news->name = $request->name;
        $news->save();
        return redirect()->route('warehouse.index')->with('successMsg','Warehouse Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the warehouse by ID
        $warehouse = Warehouse::findOrFail($id);

        // Retrieve all stock entries for the specified warehouse
        $stocks = StockIn::where('warehouseId', $id)->get();

        // Retrieve product IDs from the stock entries
        $productIds = $stocks->pluck('productId')->toArray();

        // Retrieve products based on the stock entries
        $product = Product::whereIn('id', $productIds)->get();

        // Return the view with warehouse and associated products
        return view('superadmin.warehouse.single', compact('warehouse', 'product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse =   Warehouse::find($id);
        return view('superadmin.warehouse.edit',compact('warehouse'));
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
        $this->validate($request, [
            'name' => 'required|unique:warehouses,name,' . $id,
        ], [
            'name.unique' => 'Warehouse Name already exists.'
        ]);

        $warehouse = Warehouse::find($id);


        $warehouse->name = $request->name;
        $warehouse->save();
        return redirect()->route('warehouse.index')->with('successMsg','Warehouse Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouselist = Warehouse::find($id);
        $warehouselist->delete();
        return redirect()->back()->with('dangerMsg','Warehouse Successfully Deleted');
    }
}
