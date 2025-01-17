<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProduct;
use App\Models\Companystock;
use App\Models\Product;
use App\Models\StockIn;
use Illuminate\Http\Request;

class CompanyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = CompanyProduct::all();
        return view('superadmin.companyproduct.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.companyproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define the unique rule for name validation
        $uniqueRule = 'required|unique:company_products,name';

        // Check if the request is for an update (you might need a separate method for this)
        if ($request->has('productId')) {
            // Exclude the current product ID from the uniqueness check
            $uniqueRule .= ','.$request->productId;
        }

        // Perform validation
        $this->validate($request, [
            'name' => $uniqueRule,
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'unit' => 'required',
            'category' => 'required',
            'quantity' => 'required|array',
            'warehouseId' => 'required|array',
        ], [
            'name.unique' => 'The product name already exists. Please choose a different name.',
        ]);

        // Create a new product if validation passes
        $product = new CompanyProduct();
        $product->name = $request->name;
        $product->categoryId = $request->category;
        $product->price = $request->price;
        $product->unit = $request->unit;

        // Handle file upload for product photo
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads/companyproducts'), $fileName);
            $product->photo = $fileName;
        }

        $product->save();

        // Handle Warehouse and Stock entries
        foreach ($request->warehouseId as $index => $warehouseId) {
            $stockIn = new Companystock();
            $stockIn->productId = $product->id;
            $stockIn->warehouseId = $warehouseId;
            $stockIn->quantity = $request->quantity[$index];
            $stockIn->save();
        }

        // Redirect with a success message
        return redirect()->route('companyproduct.index')->with('successMsg', 'Product Successfully Saved');
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
        $product =   CompanyProduct::find($id);
        return view('superadmin.companyproduct.edit',compact('product'));
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
        // Validate the request inputs, including unique name validation
        $request->validate([
            'name' => 'required|string|max:255|unique:company_products,name,'.$id, // Check for uniqueness except for the current product
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'unit' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'warehouseId.*' => 'required|exists:purchasecompanies,id',
            'quantity.*' => 'required|numeric|min:0',
        ], [
            'name.unique' => 'The product name already exists. Please choose a different name.',
        ]);

        // Find the product by ID
        $product = CompanyProduct::findOrFail($id);

        // Update the product fields
        $product->name = $request->name;
        $product->categoryId = $request->category;
        $product->price = $request->price;
        $product->unit = $request->unit;

        // Handle photo upload if a new one is provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/companyproducts'), $photoName);

            // Delete the old photo if it exists
            if ($product->photo && file_exists(public_path('uploads/companyproducts/' . $product->photo))) {
                unlink(public_path('uploads/companyproducts/' . $product->photo));
            }

            // Save the new photo name
            $product->photo = $photoName;
        }

        // Save the updated product
        $product->save();

        // Loop through warehouses and update stock for each
        foreach ($request->warehouseId as $index => $warehouseId) {
            $quantity = $request->quantity[$index];

            // Check if stock exists for this warehouse and product, then update or create
            $stockIn = Companystock::firstOrNew([
                'productId' => $product->id,
                'warehouseId' => $warehouseId
            ]);

            // Update the stock quantity
            $stockIn->quantity = $quantity;
            $stockIn->save();
        }

        // Redirect with success message
        return redirect()->route('companyproduct.index')->with('successMsg', 'Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the product by ID
        $product = CompanyProduct::findOrFail($id);

        // Delete all stock entries in the stock_ins table where the productId matches the product
        Companystock::where('productId', $product->id)->delete();

        // Now delete the product itself
        $product->delete();

        // Redirect back with a success message
        return redirect()->back()->with('dangerMsg', 'Product and associated stock records successfully deleted.');
    }
}
