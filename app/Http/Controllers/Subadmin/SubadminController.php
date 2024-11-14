<?php

namespace App\Http\Controllers\Subadmin;

use App\Exports\NonListExport;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Registration;
use App\Models\StockIn;
use App\Models\Warehouse;
use DB;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SubadminController extends Controller
{
    public function dashboard()
    {
        $totalSale = Orders::where('user_id', Auth::id())->sum('final_total');

        $totalCollection = Payment::where('user_id', Auth::id())->sum('amount');

        $totalDue = $totalSale - $totalCollection;
        $totalStock = Product::count();

        // Prepare data for the charts

        $dailySales = Orders::where('user_id', Auth::id())
            ->selectRaw('DATE(created_at) as date, SUM(final_total) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(7) // Last 7 days
            ->get();

        $dailyCollections = Payment::where('user_id', Auth::id())
            ->selectRaw('DATE(payment_date) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(7)
            ->get();


        return view('subadmin.dashboard', compact(
            'totalSale', 'totalCollection', 'totalDue', 'totalStock',
            'dailySales', 'dailyCollections'
        ));
    }
    public function srcategory()
    {
        return view('subadmin.order.srcategory');
    }
    public function cate_pro($id)
    {
        $product = Product::where('categoryId', $id)->orderBy('name', 'asc')->get();
        return view('subadmin.order.cat_pro',compact('product'));
    }
    public function cate_pro_single($id)
    {
        $product = Product::where('id', $id)->first();
        return view('subadmin.order.cate_pro_single',compact('product'));
    }
    public function viewCart()
    {
        return view('subadmin.order.sr-view-cart'); // Returns the cart view
    }
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('id');

        // Get the cart from session
        $cart = session()->get('cart');

        // If the cart is not empty and the product exists, remove it
        if ($cart && isset($cart[$productId])) {
            unset($cart[$productId]); // Remove the product from the cart

            // Save the updated cart back to the session
            session()->put('cart', $cart);

            return response()->json(['success' => true, 'message' => 'Product removed from cart successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Product not found in cart.']);
    }

    public function addToCart(Request $request)
    {
        // Get the data from the AJAX request
        $productId = $request->input('id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $quantity = $request->input('quantity');

        // Calculate the total price
        $total = $productPrice * $quantity;

        // Get the cart from session or create a new one if not exists
        $cart = session()->get('cart', []);

        // If the product already exists in the cart, update the quantity and total
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
            $cart[$productId]['total'] += $total; // Update total
        } else {
            // Add new product to cart
            $cart[$productId] = [
                "name" => $productName,
                "price" => $productPrice,
                "quantity" => $quantity,
                "total" => $total
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        // Return the updated cart and number of distinct products
        return response()->json([
            'success' => true,
            'message' => 'Added to cart successfully!',
            'cart' => $cart, // Include the updated cart
            'distinctCount' => count($cart) // Count of distinct products
        ]);
    }




    public function warhouselilst($id)
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
        return view('subadmin.warehouse.single', compact('warehouse', 'product'));
    }

}
