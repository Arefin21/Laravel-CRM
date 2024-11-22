<?php

namespace App\Http\Controllers;


use App\Models\Lead;
use App\Models\User;
use App\Models\Orders;
use App\Models\StockIn;
use App\Models\OrderItem;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $order  = Orders::where('user_id',Auth::id())->get();
        return view('subadmin.order.all_order',compact('order'));
    }

    public function admin_index(){
        $order  = Orders::all();
        return view('superadmin.order.admin_order',compact('order'));
    }

    public function orderlist_byshop($shop){
        $order  = Orders::where('user_id',Auth::id())->where('shop_id',$shop)->get();
        return view('subadmin.order.all_order_shop',compact('order'));
    }
    public function orderlist_byshopadmin($id){
        //$order  = Orders::where('shop_id',$shop)->get();
        $adminlead = Lead::find($id);
        //$list = User::find($id);
        return view('superadmin.order.all_order_shop',compact('adminlead',));
    }


//    public function store(Request $request)
//    {
//        // Retrieve the cart from session
//        $cart = session()->get('cart', []);
//        if (empty($cart)) {
//            return redirect()->back()->with('error', 'No products in the cart.');
//        }
//
//        // Calculate the total amount
//        $totalAmount = 0;
//        foreach ($cart as $product) {
//            $totalAmount += $product['total'];
//        }
//
//        // Apply discount if provided
//        $discount = $request->input('discount', 0);
//        $finalTotal = $totalAmount - $discount;
//
//        // Create the order
//        $order = Orders::create([
//            'user_id' => Auth::id(),
//            'shop_id' => $request->input('ShopName'),
//            'total_amount' => $totalAmount,
//            'discount' => $discount,
//            'final_total' => $finalTotal,
//            'status' => 'pending', // Initial status
//        ]);
//
//        // Insert order items
//        foreach ($cart as $productId => $product) {
//            OrderItem::create([
//                'order_id' => $order->id,
//                'product_id' => $productId,
//                'quantity' => $product['quantity'],
//                'price' => $product['price'],
//                'total' => $product['total'],
//            ]);
//        }
//
//        // Clear the cart from session after submission
//        session()->forget('cart');
//
//        // Now here i want to do perform bellow logic like bellow
//        // I know user id is 'user_id' => Auth::id(),
//        //$user_id => Auth::id();
//        //$user_warehouse_id => Auth::id()->warehouse;
//        // Now from bellow as per your query
//
//        /*
//         foreach ($cart as $productId => $product) {
//            OrderItem::create([
//                'order_id' => $order->id,
//                'product_id' => $productId,
//                'quantity' => $product['quantity'],
//                'price' => $product['price'],
//                'total' => $product['total'],
//            ]);
//        }
//         */
//        //Now i want to delete quantity from
//        StockIn:: delete from here where ('warehouseId',Auth::id()->warehouse)->where('productId',from all product_id) and minus quantity from StockIn Model
//    where all raw matches
//
//
//
//
//        // Redirect to a success page or order summary
//        return redirect()->route('order.success', $order->id)->with('success', 'Order placed successfully!');
//    }

    public function store(Request $request)
    {
        // Retrieve the cart from session
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'No products in the cart.');
        }

        // Calculate the total amount
        $totalAmount = 0;
        foreach ($cart as $product) {
            $totalAmount += $product['total'];
        }

        // Apply discount if provided
        $discount = $request->input('discount', 0);
        $finalTotal = $totalAmount - $discount;

        // Create the order
        $order = Orders::create([
            'user_id' => Auth::id(),
            'shop_id' => $request->input('ShopName'),
            'total_amount' => $totalAmount,
            'discount' => $discount,
            'final_total' => $finalTotal,
            'status' => 'pending', // Initial status
        ]);

        // Insert order items
        foreach ($cart as $productId => $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'total' => $product['total'],
            ]);
        }

        // Now perform stock deduction logic
        $userWarehouseId = Auth::user()->warehouse; // Assuming warehouse is a column in the users table

        foreach ($cart as $productId => $product) {
            $stock = StockIn::where('warehouseId', $userWarehouseId)
                ->where('productId', $productId)
                ->first();

            if ($stock) {
                // Deduct the quantity ordered from stock
                $stock->quantity -= $product['quantity'];

                // If stock quantity goes below 0, set it to 0 or delete the record if needed
                if ($stock->quantity <= 0) {
                    $stock->delete();
                } else {
                    $stock->save();
                }
            }
        }

        // Clear the cart from session after submission
        session()->forget('cart');

        // Redirect to a success page or order summary
        return redirect()->route('order.success', $order->id)->with('success', 'Order placed successfully!');
    }


    // Optional method to display success page after order
    public function success($id)
    {
        // Fetch the order using a normal query
        $order = Orders::findOrFail($id);

        // Manually retrieve related items and their products
        $items = OrderItem::where('order_id', $order->id)->get();

        // Optionally, you can also load products for each item
        foreach ($items as $item) {
            $item->product = $item->product; // Fetch the related product
        }

        // Pass the order and its items to the view
        return view('subadmin.order.success', compact('order', 'items'));
    }



    public function admin_success($id)
    {
        // Fetch the order using a normal query
        $order = Orders::findOrFail($id);

        // Manually retrieve related items and their products
        $items = OrderItem::where('order_id', $order->id)->get();

        // Optionally, you can also load products for each item
        foreach ($items as $item) {
            $item->product = $item->product; // Fetch the related product
        }

        // Pass the order and its items to the view
        return view('superadmin.order.success', compact('order', 'items'));
    }

    public function admin_success_print($id)
    {
        // Fetch the order using a normal query
        $order = Orders::findOrFail($id);

        // Manually retrieve related items and their products
        $items = OrderItem::where('order_id', $order->id)->get();

        // Optionally, you can also load products for each item
        foreach ($items as $item) {
            $item->product = $item->product; // Fetch the related product
        }

        // Pass the order and its items to the view
        return view('superadmin.order.print', compact('order', 'items'));
    }

    public function subadmin_success_print($id)
    {
        // Fetch the order using a normal query
        $order = Orders::findOrFail($id);

        // Manually retrieve related items and their products
        $items = OrderItem::where('order_id', $order->id)->get();

        // Optionally, you can also load products for each item
        foreach ($items as $item) {
            $item->product = $item->product; // Fetch the related product
        }

        // Pass the order and its items to the view
        return view('subadmin.order.print', compact('order', 'items'));
    }

}
