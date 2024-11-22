<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\Debit;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
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

        // Validate incoming request
        $request->validate([
            'shop_id' => 'required|integer|exists:sr_shops,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        // Debug to check the submitted data
        // dd($request->all());

        // Create a new payment record
        Payment::create([
            'shop_id' => $request->input('shop_id'),
            'user_id' => $request->input('sr_id'),  // This should be sr_id, as your form submits sr_id
            'payment_date' => $request->input('payment_date'),
            'amount' => $request->input('amount'),
            'payment_type' => 'cash', // You can adjust the type or make it dynamic from the form
        ]);

        // Redirect back with success message
        return redirect()->back()->with('successMsg', 'Payment added successfully!');
    }
    public function debit_store(Request $request)
    {

        // Validate incoming request
        $request->validate([
            'shop_id' => 'required',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        // Debug to check the submitted data
        // dd($request->all());

        // Create a new payment record
        Debit::create([
            'shop_id' => $request->input('shop_id'),
            'payment_date' => $request->input('payment_date'),
            'amount' => $request->input('amount'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('successMsg', 'Payment added successfully!');
    }


    public function opening_ballance(Request $request)
    {

        // Validate incoming request
        $request->validate([
            'shop_id' => 'required|integer|exists:sr_shops,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        // Debug to check the submitted data
        // dd($request->all());

        // Create a new payment record
        Orders::create([
            'shop_id' => $request->input('shop_id'),
            'user_id' => $request->input('sr_id'),  // Use sr_id from the form submission
            'created_at' => Carbon::parse($request->input('payment_date'))->setTime(6, 34, 26),
            'updated_at' => Carbon::parse($request->input('payment_date'))->setTime(6, 34, 26),
            'total_amount' => $request->input('amount'),
            'final_total' => $request->input('amount'),
            'status' => 'Opening', // Adjust the status as needed or make it dynamic from the form
        ]);

        // Redirect back with success message
        return redirect()->back()->with('successMsg', 'Opening Ballance added successfully!');
    }

    public function credit_ballance(Request $request)
    {

        // Validate incoming request
        $request->validate([
            'shop_id' => 'required',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        // Debug to check the submitted data
        // dd($request->all());

        // Create a new payment record
        Credit::create([
            'shop_id' => $request->input('shop_id'),
            'created_at' => Carbon::parse($request->input('payment_date'))->setTime(6, 34, 26),
            'updated_at' => Carbon::parse($request->input('payment_date'))->setTime(6, 34, 26),
            'total_amount' => $request->input('amount'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('successMsg', 'Credit Ballance added successfully!');
    }
    public function company_payement_details($id)
    {
        return view('superadmin.payement.company_payement_details',compact('id'));
    }
    public function payement_details($id)
    {
       return view('superadmin.payement.details',compact('id'));
    }

    public function sub_payement_details($id)
    {
        return view('subadmin.payement.details',compact('id'));
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

    public function getTodayLeads()

{
    return 'ok';
    // $todayLeads = Lead::whereDate('created_at', Carbon::today())->get();

    // if ($todayLeads->isEmpty()) {
    //     return view('superadmin.leads.today_lead', ['message' => 'No leads found for today.']);
    // }

    // return view('superadmin.leads.today_lead', compact('todayLeads'));
}
}
