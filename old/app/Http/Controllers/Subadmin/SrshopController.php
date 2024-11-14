<?php

namespace App\Http\Controllers\Subadmin;

use App\Http\Controllers\Controller;
use App\Models\SrShop;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SrshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        // Fetch all shops where the logged-in user is the SR (Sales Representative)
        $srshop = SrShop::where('srId', $userId)->get();
        return view('subadmin.shop.index', compact('srshop'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::user()->id;  // or auth()->id();
        $warehouseId = Auth::user()->warehouse;  // or auth()->id();
        return view('subadmin.shop.create', compact('userId','warehouseId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'name' => 'required',
            'ownerName' => 'required',
            'Mobile' => 'required',
            'Address' => 'required',
            'srId' => 'required', // This is from the hidden field
            'warehouseId' => 'required', // This is from the hidden field
        ]);

        // Create a new SrShop instance and save the data
        $shop = new SrShop();
        $shop->shopName = $request->name;
        $shop->ownerName = $request->ownerName; // If your database column is `owner_name`
        $shop->mobile = $request->Mobile;
        $shop->Adress = $request->Address;
        $shop->srId = $request->srId; // Hidden field for the user ID
        $shop->warehouseId = $request->warehouseId; // Hidden field for the warehouse ID
        $shop->save();

        // Redirect back to the index route with success message
        return redirect()->route('shop.index')->with('successMsg', 'Shop Successfully Added');
    }

    function storeOrder(){

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
        $shop =   SrShop::find($id);
        $userId = Auth::user()->id;  // or auth()->id();
        $warehouseId = Auth::user()->warehouse;  // or auth()->id();
        return view('subadmin.shop.edit',compact('shop','userId','warehouseId'));
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
        // Validate the request
        $this->validate($request, [
            'name' => 'required',
            'ownerName' => 'required',
            'Mobile' => 'required',
            'Address' => 'required',
            'srId' => 'required', // This is from the hidden field
            'warehouseId' => 'required', // This is from the hidden field
        ]);

        // Create a new SrShop instance and save the data
        $shop = new SrShop();
        $shop->shopName = $request->name;
        $shop->ownerName = $request->ownerName; // If your database column is `owner_name`
        $shop->mobile = $request->Mobile;
        $shop->Adress = $request->Address;
        $shop->srId = $request->srId; // Hidden field for the user ID
        $shop->warehouseId = $request->warehouseId; // Hidden field for the warehouse ID
        $shop->save();

        // Redirect back to the index route with success message
        return redirect()->route('shop.index')->with('successMsg', 'Shop Successfully Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = SrShop::find($id); // Find the shop by its ID

        // Check if the shop exists and if the logged-in user has permission to delete it
        if ($shop && $shop->srId == Auth::user()->id) {
            $shop->delete(); // Delete the shop
            return redirect()->back()->with('successMsg', 'Shop Successfully Deleted');
        }

        // If the shop doesn't exist or the user doesn't have permission, return a failure message
        return redirect()->back()->with('dangerMsg', 'You are not authorized to delete this shop or the shop does not exist.');
    }

}
