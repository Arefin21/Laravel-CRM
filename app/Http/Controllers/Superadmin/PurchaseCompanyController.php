<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProduct;
use App\Models\Companystock;
use App\Models\Product;
use App\Models\Purchasecompany;
use App\Models\StockIn;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class PurchaseCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = Purchasecompany::all();
        return view('superadmin.purchase.index', compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.purchase.create');
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
            'name' => 'required|unique:purchasecompanies,name', // No need for $id in the store method
        ], [
            'name.unique' => 'Purchase Company Name already exists.'
        ]);

        $purchase = new Purchasecompany();
        $purchase->name = $request->name;
        $purchase->save();

        return redirect()->route('purchasecompany.index')->with('successMsg', 'Purchase Successfully Saved');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse = Purchasecompany::findOrFail($id);
        $stocks = Companystock::where('warehouseId', $id)->get();
        $productIds = $stocks->pluck('productId')->toArray();
        $product = CompanyProduct::whereIn('id', $productIds)->get();
        return view('superadmin.companyproduct.single', compact('warehouse', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase =   Purchasecompany::find($id);
        return view('superadmin.purchase.edit',compact('purchase'));
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
            'name' => 'required|unique:purchasecompanies,name,' . $id,
        ], [
            'name.unique' => 'Purchase Company Name already exists.'
        ]);
        $unit = Purchasecompany::find($id);
        $unit->name = $request->name;
        $unit->save();
        return redirect()->route('purchase.index')->with('successMsg','Purchase Company Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchaselist = Purchasecompany::find($id);
        $purchaselist->delete();
        return redirect()->back()->with('dangerMsg','Purchase Company Successfully Deleted');
    }
}
