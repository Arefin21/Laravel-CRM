<?php

namespace App\Http\Controllers\Superadmin\IncomeExpense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.Expense.create');
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
            'title' => 'required',
            'daTe' => 'required|daTe',  // Add validation for date if required
            'amount' => 'required|numeric'  // Ensure amount is a numeric field
        ]);

        $income = new Expense();
        $income->title = $request->title;
        $income->daTe = $request->daTe;  // Use consistent naming
        $income->amount = $request->amount;
        $income->save();

        // Redirect to a valid route with a success message
        return redirect()->back()->with('successMsg', 'Expense Successfully Added');
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
        $unitlist = Expense::find($id);
        $unitlist->delete();
        return redirect()->back()->with('dangerMsg','Amount Successfully Deleted');
    }
}
